#include "StudDef.h"
sem_t seatChange, tas, students;

int main()
{
	pthread_t ta, student[MAX_STUD];

	int i;

	//Semephores, students and TAs cannot be incremented 
	sem_init(&seatChange,0,1);
	sem_init(&students,0,0);
	sem_init(&tas,0,0); 

	printf("TA hours have started\n");
	
	pthread_create(&ta, NULL, (void *)taThread, (void*) &i);
	sleep(1);

	//Creates each student and has it run the student thread
	for(i=0;i<MAX_STUD;i++) 
	{   
		//Generates a random number 
		int r=rand();
		int value = (r % 3) + 1;
       	pthread_create(&student[i],NULL,(void *)studentThread,(void*)&i);
       	sleep(value);      
    }  

	for(i=0;i<MAX_STUD;i++)     
        pthread_join(student[i],NULL);
	//When the program is done it exits
    printf("All students delt with!\n");
    return(0);
} 




