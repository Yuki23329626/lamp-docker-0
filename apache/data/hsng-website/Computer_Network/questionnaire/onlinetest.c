
#include <stdio.h>
#include <fcntl.h>  
#ifndef NO_STDLIB_H
#include <stdlib.h>
#else
char *getenv();
#endif
#include "util.c"

#define NUM_OF_query 20

#define MAX_ENTRIES 1000
#define RECORD_FILE "/home/www/data/questionnaire/files/ans."
#define nmemb 5;
#define MAX_ITEM 100

typedef struct {
    char *name;
    char *val;
} entry;

typedef struct student_ student_type;

char question[10][4]={
	"1",
	"2",
	"3",
	"4",
	"5",
	"6",
	"7",
	"8",
	"9",
	"10"
};
char answer[10][3]={
	"a",
	"c",
	"c",
	"c",
	"b",
	"b",
	"c",
	"b",
	"c",
	"c"
};
int question_num=10;
int correct =0;
int answer_count=0;
int answer_array[20];
int i,j; 
char *makeword(char *line, char stop);
char *fmakeword(FILE *f, char stop, int *len);
char x2c(char *what);

int show_tmp_file (FILE *fptr,int query_num);

void unescape_url(char *url);
void plustospace(char *str);

char EXEC_string[160];
void putline(FILE *f,char *l) 
{
  int x;
  for(x=0;l[x];x++) fputc(l[x],f);
  fputc('\n',f);
}



main(int argc, char *argv[]) {
    
    entry entries[MAX_ENTRIES];
    register int x,m=0;
    int cl;
    FILE *newFileHandle,*fptr;
    char open_file[100];
    char tmp_char[20]; 
    char *ptr;
    printf("Content-type: text/html%c%c",10,10);

    if(strcmp(getenv("REQUEST_METHOD"),"POST")) {
        printf("This script should be referenced with a METHOD of POST.\n");
        printf("If you don't understand this, see this ");
        printf("<A HREF=\"http://www.ncsa.uiuc.edu/SDG/Software/Mosaic/Docs/fill-out-forms/overview.html\">forms overview</A>.%c",10);
        exit(1);
    }
    if(strcmp(getenv("CONTENT_TYPE"),"application/x-www-form-urlencoded")) {
        printf("This script can only be used to decode form results. \n");
        exit(1);
    }
    cl = atoi(getenv("CONTENT_LENGTH"));

    for(x=0;cl && (!feof(stdin));x++) {
        entries[x].val = fmakeword(stdin,'&',&cl);
        plustospace(entries[x].val);
        unescape_url(entries[x].val);
        entries[x].name = makeword(entries[x].val,'=');
    }
  printf("<html>\n");
    for(i=0;i<question_num;i++)
      answer_array[i]=1;
   
    /* begin to count */
    for(i=0;i<x; i++) {
       for(j=0;j<question_num;j++){
         if(strcmp(entries[i].name, question[j])==0) {
            answer_array[j]=0; 
            break;
         }
       }       
      
       if(strcmp(entries[i].val, answer[j])==0) {/*correct*/
          printf("第%s題回答正確<br>\n",question[j]);
          correct ++;	   
       }   
       else {
         printf("第%s題回答錯誤, 正確答案為 %s<br>\n",question[j],answer[j]);
         fflush(stdout);
       }
    }    
    if(question_num-x >0)
       printf("<p>共有%d題未作答:<br>\n", question_num - x);
    for(i=0;i<question_num; i++) {
      if (answer_array[i]) {
        printf(" 第 %s 題未作答<br>\n",question[i]);
      }
    }  
    if(correct == 10)
      printf("<h1>恭喜你</h1>\n");
    printf("<p><center><h2>共得到 %d 分</h2></center></p>",correct*10);

    printf("</html>");
    fflush(stdout);
}