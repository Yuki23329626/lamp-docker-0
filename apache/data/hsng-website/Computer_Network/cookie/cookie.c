#include <stdio.h>
#include <fcntl.h>  
#ifndef NO_STDLIB_H
#include <stdlib.h>
#else
char *getenv();
#endif
#include "my_util.c"
#define MAX_ENTRIES 1000

typedef struct {
    char *name;
    char *val;
} entry;

char *makeword(char *line, char stop);
char *fmakeword(FILE *f, char stop, int *len);
char x2c(char *what);
char *strmakeword(char *str, char stop, int *cl, int *index);


int show_tmp_file (FILE *fptr,int query_num);
int total_query=0;

void unescape_url(char *url);
void plustospace(char *str);

void putline(FILE *f,char *l) 
{
  int x;
  for(x=0;l[x];x++) fputc(l[x],f);
  fputc('\n',f);
}


main(int argc, char *argv[]) {
    
  entry entries[MAX_ENTRIES];
  register int x;
  int cl; 
  int i;
  FILE *newFileHandle; 
  char *str, *query_string;
  int str_len, str_index;

  printf("Content-type: text/html%c%c",10,10);
  printf("<html>");
  printf("<center><h1>Cookie 練習</h1></center><br>");
  if(strcmp(getenv("REQUEST_METHOD"),"POST")) { /*Using the GET method*/
    if((str=getenv("QUERY_STRING")) == NULL) {
      printf("The Qeury string doesn't have anything\n");
      exit(1);
    }    
    cl=str_len=strlen(str);
    query_string=(char *)malloc(sizeof(char)*(str_len+1)); 
    strcpy(query_string, str);
    fflush(stdout);
    str_index = 0;
    for(x=0;cl && str_len;x++,str_len--) {
      entries[x].val = strmakeword(query_string,'&',&cl, &str_index);
      plustospace(entries[x].val);
      unescape_url(entries[x].val);
      entries[x].name = makeword(entries[x].val,'=');
    }    
  } else {

    cl = atoi(getenv("CONTENT_LENGTH"));
    if(strcmp(getenv("CONTENT_TYPE"),"application/x-www-form-urlencoded")) {
      printf("This script can only be used to decode form results. \n");
      exit(1); 
    }
      
    for(x=0;cl && (!feof(stdin));x++) {
      entries[x].val = fmakeword(stdin,'&',&cl);
      plustospace(entries[x].val);
      unescape_url(entries[x].val);
      entries[x].name = makeword(entries[x].val,'=');
    }    

    printf("<a href=\"cookie/cookie.c\">看此CGI程式的source code.</a><br>");
    printf("server收到的cookie內容為: %s<br>\n",getenv("HTTP_COOKIE"));
    
  }
printf("server收到form的值為:<br>\n");
  for (i=0; i < x; i++)
    printf("%s = %s <br>",entries[i].name, entries[i].val);
  printf("</html>");
  fflush(stdout);
 
}






