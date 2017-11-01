#define MAX_CHAIRS 3                             
#define MAX_STUD 10        
#include <stdio.h>                     
#include <pthread.h>         
#include <semaphore.h>  
#include <stdlib.h>     
        
//Semephores
sem_t tas;                 
sem_t students;                   
sem_t seatChange; 

//Thread functions
void taThread(void *tmp);         
void studentThread(void *tmp);

//Amount of initial free seats                     
static int freeSeats = MAX_CHAIRS;
//Students thread array, set to the defined max amount of students
int studs[MAX_STUD];   
//A function that loops the threads until the seat semephore is unlocked
void studentProgram(void *tmp); 
//Seat array that hold what student is sitting in which chair
int seatArray[MAX_CHAIRS];           
static int seats = 0;                  
static int nextStudent = 0;  
//counter for students who arrive              
static int count = 0;   
                   
                         
