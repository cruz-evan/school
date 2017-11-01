all: testSleepingTa

testSleepingTa: Student.o SleepingTA.o
	gcc -lpthread -o Student Student.o SleepingTA.o

SleepingTA.o: SleepingTA.c StudDef.h
	gcc -c SleepingTA.c

Student.o: Student.c StudDef.h
	gcc -c Student.c

