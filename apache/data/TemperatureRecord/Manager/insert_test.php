<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/TemperatureRecord/Foundation/HelpUtil.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/TemperatureRecord/Foundation/HttpReq.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/TemperatureRecord/Foundation/Database.php';

// get post body
$inputJSON = file_get_contents('php://input');
$input= json_decode( $inputJSON );

if( isset($input) ) {
    $id = $input->id;
    $temp = $input->temp;
    $building = $input->building;
    $date = $input->date;
    $time = $input->time;

    //Connect DB

    $database = new Database();
    $conn = $database->getConnection();
    if(!isset($conn)){
        sendResponse(500, 'Server database is down');
        return;
    }
    error_log("test1");

    /*
    $username = DatabaseConfig::$account;
    $password = DatabaseConfig::$password;
    $host = DatabaseConfig::$host;
    $db_name = DatabaseConfig::$db_name;
    $conn = mysqli_connect($host, $username, $password, $db_name);
    mysqli_query($conn,"SET NAMES 'UTF8'");*/

    //query to check whether exist
    //$query = "SELECT `id` FROM `temperature` WHERE `date`='$date' AND `id`='$id'";
    //$result = mysqli_query($conn,$query) or die ('MySQL query 1 error');

    $query = "SELECT id FROM temperature WHERE `date`=:date AND `id`=:id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":date",$date);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //$rowNum = $result->num_rows;
    error_log("test2");
    if($result != ""){
        $message = array(
            "status" => "400",
            "comment" => "insert error, today already record the temperature."
        );
        error_log("test3");
    }
    else{
        //query database
        $query = "INSERT INTO temperature (`id`, `temperature`, `building`, `date`, `time`) VALUES (:id, :temp, :building, :date, :time);";
        //$result = mysqli_query($conn,$query) or die ('MySQL query 2 error');

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":date",$date);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":temp",$temp);
        $stmt->bindParam(":building",$building);
        $stmt->bindParam(":time",$time);

        if($stmt->execute()){
            $message = array(
                "status" => "200",
                "comment"  => "insert successful.",
                "id" => $id,
                "temp" => $temp,
                "building" => $building,
                "date" => $date,
                "time" => $time
            );
        }
        else{
            $message = array(
                "status" => "400-1",
                "comment" => "insert error, please check the error log."
            );
        }
    }
    error_log("test4");
    //mysqli_close($conn);
    $message = json_encode($message);
    echo $message;
}
else{
    sendResponse(400,'Failed to get parameters');
}
