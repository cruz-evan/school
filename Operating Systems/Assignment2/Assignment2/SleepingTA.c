#include "StudDef.h"

//Handles the TA thread
void taThread(void *arg)
{
	int currStudent;
	//An infinite loop
	while(1)
	{
		//Try to get a student, if none available, sleep
		sem_wait(&tas);
		if(nextStudent==0)
			printf("TA is asleep\n");
		//Modify the number of seats and prepare to assist Student
		sem_wait(&seatChange);
			nextStudent = (++nextStudent) % MAX_CHAIRS;
			currStudent = seatArray[nextStudent];
			seatArray[nextStudent] = pthread_self();
		//Frees lock
		sem_post(&seatChange);
		//Helps Student for a random amount of time
		sem_post(&students);
		int r=rand();
		int value = (r % 6) + 1;
		printf("Student %d is getting TA help for %d seconds. Students Waiting = %d \n", currStudent, value, MAX_CHAIRS-freeSeats-1);
		sleep(value);
	}
}

//Handles the student threads
void studentThread(void *arg)
{
	int Ta, serve;
	//Generates a random number for the programming time for each student
	int r=rand();
	int value = (r % 3) + 1;
	sleep(value);
	//Locks the section so that the chair amount is not unexpectadly altered
	sem_wait(&seatChange);
	count++;
	printf("\tStudent %d programming for %d seconds. \n", count, value);
	//If there is any number of free seats it will enter this loop
	if(freeSeats > 0) 
    {
		//reduces seat amount by one
        --freeSeats;           
		seats = (++seats) % MAX_CHAIRS;
		printf("\t\tStudent-%d Sits. Waiting Students = %d.\n", count, MAX_CHAIRS-freeSeats);  
        seatArray[seats] = count;
		serve=1;
		//Tell TA student is ready                 
        sem_post(&tas);
		//allows for seats to be altered again
        sem_post(&seatChange);  
		//Students wait for TA               
        sem_wait(&students);
		//Frees a seat and locks it so it isn't unexpectadly altered              
        sem_wait(&seatChange);                  
			Ta = seatArray[seats];    
			freeSeats++;             
        sem_post(&seatChange);                        
          
    } 
	//If there are no free seats Student goes back to program 
	else 
    {
		sem_post(&seatChange); 
        printf("\t\t\tStudent-%d sees no seat and programs.\n",count);
		serve=0;	
    }
	//If the user has a seat then the student has been helped and the thread will end
	if(serve ==1)
    	pthread_exit(0);
	//If the thread is not serverd, it enters a very similar 
	//method which allows the student to keep programming and waiting for a seat to open
	else
		loopStudent(count);
}

//Student keeps waiting until seats open
void loopStudent(int student)
{
	int seat, Ta, serve;
	//Generates a random number for the programming time for each student (sleep time)
	int r=rand();
	int value = (r % 3) + 1;
	sleep(value);
	//Locks the section so that the chair amount is not unexpectadly altered
	sem_wait(&seatChange);
	printf("\tStudent %d programming for %d seconds\n", student, value);
	//If there is any number of free seats it will enter this loop
	if(freeSeats > 0) 
    {
		//reduces seat amount by one
        --freeSeats;           
		seats = (++seats) % MAX_CHAIRS;
		printf("\t\tStudent-%d Sits. Waiting Students = %d.\n", student, MAX_CHAIRS-freeSeats);
        seatArray[seats] = student;
		serve=1;
		//Tell TA that student is ready                 
        sem_post(&tas);
		//allows for seats to be altered again
        sem_post(&seatChange); 
		//Student waits for TA               
        sem_wait(&students);
		//Frees a seat and locks it so it isn't unexpectadly altered              
        sem_wait(&seatChange);                  
			Ta = seatArray[seats];    
			freeSeats++;             
        sem_post(&seatChange);                        
          
    } 
	//If there are no free seats Student goes back to program 
	else 
    {
		sem_post(&seatChange); 
		printf("\t\t\tStudent-%d sees no seat and programs.\n",student);
		serve=0;	
    }
	//If the student got helped by the TA the thread ends
	if(serve ==1)
		pthread_exit(0);
	//If not the thread loops back to this function
	else
		loopStudent(student);
}
