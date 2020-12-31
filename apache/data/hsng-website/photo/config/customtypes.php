<?php

/* Adds support for additional file types to DAlbum */

// localization strings (may be added to standard distribution later
if (!isset($lang['cCustomClickToOpen']))
{
    $lang['cCustomClickToOpen']='Click to open &quot;#title#&quot;';
    $lang['cCustomOpenBtn']='Open file (#size#)';
    $lang['cCustomOpenBtnTitle']='Open file "&quot;title&quot;" in current window';
}

// Custom file types in format: type, MIME type, icon and thumbnail
$g_arrCustomTypes=array
(
    "avi"=> array("video", "video/avi",      "/_icons/video.png", "/_icons/th_video.png"),
    "mpeg"=>array("video", "video/mpeg",     "/_icons/video.png", "/_icons/th_video.png"),
    "mpg"=> array("video", "video/mpeg",     "/_icons/video.png", "/_icons/th_video.png"),
    "wmv"=> array("video", "video/x-ms-wmv", "/_icons/video.png", "/_icons/th_video.png"),
    "asf"=> array("video", "video/x-ms-asf", "/_icons/video.png", "/_icons/th_video.png"),

    "mp3"=> array("audio", "audio/mpeg",     "/_icons/sound.png", "/_icons/th_sound.png"),
    "wav"=> array("audio", "audio/x-wav",    "/_icons/sound.png", "/_icons/th_sound.png"),
    "wma"=> array("audio", "audio/x-ms-wma", "/_icons/sound.png", "/_icons/th_sound.png"),

    "mov"=> array("video", "video/quicktime","/_icons/video.png", "/_icons/th_video.png"),
    "qt"=>  array("video", "video/quicktime","/_icons/video.png", "/_icons/th_video.png"),

    "pdf"=> array("file",  "application/pdf","/_icons/pdf.png",   "/_icons/th_pdf.png"),
);

class CCustomTypeImage extends CImage
{
    // Returns custom type information for the given extension of an empty array
    function &GetCustomInfo()
    {
        global $g_arrCustomTypes;

        $ext=strtolower(getext($this->m_sFullFilename));

        if (!empty($ext) && array_key_exists($ext,$g_arrCustomTypes))
            return $g_arrCustomTypes[$ext];

        return array();
    }

    // true if the file is custom time and false if not
    function IsCustomType()
    {
        $a=$this->GetCustomInfo();
        return !empty($a);
    }


    // skip authorization check for our _icons files, otherwise the check will not
    // pass as there is no _icons album
    function SkipAccessCheck()
    {
        // return _icons files without access check
        if ($this->m_sFullFilename=="/_icons/" . basename(strval($this->m_sFullFilename)))
            return true;
        return false;
    }

    // Custom fields (Width/Height for videos)
    function &GetCustomFieldNames()
    {
        $f=parent::GetCustomFieldNames();

        $a=$this->GetCustomInfo();
        if (!empty($a))
        {
            // Video files have Width/Height parameters
            if ($a[0]=="video")
            {
                $f[]="Width";
                $f[]="Height";
            }
        }
        return $f;
    }


    function IsImageFilename()
    {
        if ($this->IsCustomType())
            return true;
        return parent::IsImageFilename();
    }

    function GetImageMimeType()
    {
        $a=$this->GetCustomInfo();
        if (!empty($a))
            return $a[1];
        return parent::GetImageMimeType();
    }

    function CreateThumbnail(   $bResizeIfNotExist=true,
                                $bAlways=false,
                                $bCheckExistenceOnly=false)
    {
        if ($this->IsCustomType())
        {
            $sFile=absfname($this->GetResizedFilename());

            // Get main file size
            $im = @getimagesize($sFile); /* Attempt to open */

            if (empty($im))
                return "Unable to get image size of original image [!!$sFile]";

            $this->m_nResX=$im[0];
            $this->m_nResY=$im[1];

            // Consider custom type huge image which cannot be displayed in browser window
            $this->m_nY=1000000;
            $this->m_nX=1000000;
            $this->m_bResize=true;

            return $this->UpdateThumbnailSize($bResizeIfNotExist,$bAlways,$bCheckExistenceOnly);
        }
        return parent::CreateThumbnail($bResizeIfNotExist,$bAlways,$bCheckExistenceOnly);


    }

    function UpdateThumbnailSize(   $bResizeIfNotExist=true,
                                    $bAlways=false,
                                    $bCheckExistenceOnly=false )
    {
        if ($this->IsCustomType())
        {
            // Thumbnails for custom types already exist. There is no need
            // to recreate them in any case.
            $bAlways=false;
            $bResizeIfNotExist=false;
        }

        return parent::UpdateThumbnailSize($bResizeIfNotExist,$bAlways,$bCheckExistenceOnly);
    }

    function BeforeDisplay()
    {
        // We also need to disable all fancy buttons on showimg.php
        if (defined('DALBUM_SHOWIMG_PAGE') && $this->IsCustomType())
        {
            global  $g_bShowEXIFDetailsButton,$g_bShowOriginalImageButton,
                    $g_sBrowserFitMethod,$g_bShowRotateButton, $g_bShowUpdateButton;

            $g_bShowEXIFDetailsButton=false;
            $g_bShowRotateButton=false;
            $g_bShowOriginalImageButton=false;
            $g_sBrowserFitMethod="noresize";
            $g_bShowUpdateButton=false;
        }
    }

    // Get thumbnail/resized image filename
    function GetThumbnailFilename()
    {
        $a=$this->GetCustomInfo();
        if (!empty($a))
            return $a[3];
        return parent::GetThumbnailFilename();
    }

    // Get thumbnail/resized image filename
    function GetResizedFilename()
    {
        $a=$this->GetCustomInfo();
        if (!empty($a))
            return $a[2];
        return parent::GetResizedFilename();
    }

    function ParseDetails(&$ini_array,$bAllDetails)
    {
        parent::ParseDetails($ini_array,$bAllDetails);

        // Resize is forced for custom types
        if ($this->IsCustomType())
            $this->m_bResize=true;
    }
}

function cCustom_DisplayCustomType(&$image)
{
    if (!$image->IsCustomType())
        return false;

    $ext=strtolower(getext($image->m_sFullFilename));
    $mime=$image->GetImageMimeType();

    // Get custom width/height fields which may be set for videos
    $widthField=$image->GetCustomField("Width");
    $heightField=$image->GetCustomField("Height");
    $widthheight="";

    if ($widthField && $heightField)
        $widthheight="WIDTH=\"$widthField\" HEIGHT=\"$heightField\"";

    // Get absolute URL of the current custom object
    $url=secureURL($image->m_sFullFilename);
    if (substr($url,0,7)!="http://")
    {
        $urlPrefix="http://".$_SERVER['HTTP_HOST'];

        if (substr($url,0,1)=='/')
            $url=$urlPrefix.$url;
        else
        {
            $urlPrefix.=dirname_ex($_SERVER['PHP_SELF']);
            if (substr($urlPrefix,-1)=='/')
                $url=$urlPrefix.$url;
            else
                $url=$urlPrefix."/".$url;
        }
    }


    global $lang;
    switch ($ext)
    {
        case "avi":
        case "mpg":
        case "mpeg":
        case "wmv":
        case "asf":
        case "mp3":
        case "wma":
        case "wav":
            cCustom_WriteMediaPlayerControl($url,$mime,$widthheight);
            break;
        case "mov":
        case "qt":
            cCustom_WriteQuickTimePlayerControl($url,$mime,$widthheight);
            break;
        default:
            // Other files - display image and that's it
            global $_template;
            $src=$_template['ImageSrc'];
            $alt=strtr($lang['cCustomClickToOpen'],array("#title#"=>$image->GetTitle()));
            $wh="";
            if (isset($_template['WidthHeight']))
                $wh=$_template['WidthHeight'];
            print <<< END
            <a href="$url" title="">
            <img id="Image"
                src="$src"
                title="$alt"
                $wh
                alt="">
            </a>
END;
            break;
    }
    print "<BR><BR><CENTER><span class='navigationBar' id='custOpenNavBar'>";

    $size="??";
    if (file_exists(absfname($image->m_sFullFilename)))
        $size=@filesize_as_str(absfname($image->m_sFullFilename));

    print getButton('cCustomOpen',$url,
                    strtr($lang['cCustomOpenBtn'],array("#title#"=>$image->GetTitle(),"#size#"=>$size)),
                    strtr($lang['cCustomOpenBtnTitle'],array("#title#"=>$image->GetTitle(),"#size#"=>$size)),
                    0);
    print "</span></CENTER>";
    return true;
}

// Write media player control (tries to detect if MediaPlayer7+ is installed)
function cCustom_WriteMediaPlayerControl($url,$mime,$widthheight)
{
    $msplayer7 =<<< END
<object id="MediaPlayer"
CLASSID="CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6"

END;

    $msplayer6 =<<< END
<object id="MediaPlayer"
CLASSID="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95"
CODEBASE="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,5,715"
END;

    $common =<<< END
$widthheight
standby="Loading Microsoft Windows Media Player components..."
type="application/x-oleobject">

<param name="url" value="$url">
<param name="Filename" value="$url">
<param name="stretchToFit" value="true">
<param name="AutoStart" value="false">
<param name="ShowControls" value="true">
    <EMBED
        type="application/x-mplayer2"
        $widthheight
        SRC="$url"
        AUTOSTART="0"
        SHOWCONTROLS="1"
    >
    </EMBED>
</object>

END;

    $msplayer7.=$common;
    $msplayer6.=$common;

    $msplayer7c=js_escape(strtr($msplayer7,array("\n"=>" ","\r"=>" ")));
    $msplayer6c=js_escape(strtr($msplayer6,array("\n"=>" ","\r"=>" ")));

    // Write detection Javascript
    print <<< END
<script type="text/javascript">
//<!--
    var WMP7;
    var agt=navigator.userAgent.toLowerCase();
    var is_ie   = (agt.indexOf("msie") != -1);
    if ( is_ie )
    {
        WMP7 = new ActiveXObject('WMPlayer.OCX');
    }

    // Windows Media Player 7 Code
    if ( WMP7 )
        document.write('$msplayer7c');
    else
        document.write('$msplayer6c');
//-->
</script>
<noscript>
    $msplayer6
</noscript>

END;
}

// Write QuickTime media player control
function cCustom_WriteQuickTimePlayerControl($url,$mime,$widthheight)
{
     print <<< END
<object CLASSID="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B"
    $widthheight
    id="MediaPlayer"
    CODEBASE="http://www.apple.com/qtactivex/qtplugin.cab#version=6,0,2,0">
    <param NAME="controller" VALUE="TRUE">
    <param NAME="type" VALUE="$mime">
    <param NAME="autoplay" VALUE="false">
    <param NAME="scale" VALUE="aspect">
    <param NAME="target" VALUE="myself">
    <param NAME="src" VALUE="$url">
    <param NAME="pluginspage" VALUE="http://www.apple.com/quicktime/download/indext.html">

    <embed
        id="MediaPlayer"
        $widthheight
        CONTROLLER="TRUE"
        TARGET="myself"
        SRC="$url"
        TYPE="video/quicktime"
        BGCOLOR="#000000" BORDER="0"
        SCALE="aspect"
        AUTOPLAY="false"
        PLUGINSPAGE="http://www.apple.com/quicktime/download/indext.html">
    </embed>
</object>

END;
}

?>