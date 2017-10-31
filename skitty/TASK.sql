/*
 * AUTHOR	Denise Nguyen
 * DATE 	10/26/2017
 * COURSE   CIS444 
 * PURPOSE  {s.dot} Database 
*/

/*Task Tracking Table*/
CREATE TABLE TASKS(
	Task_ID INT NOT NULL AUTO_INCREMENT,
	Priority INT(3) NOT NULL,
	Task VARCHAR(50) NOT NULL,
	TaskComplete VARCHAR(5) NOT NULL,
	SCRUM INT(3) NOT NULL,
	TaskRemarks VARCHAR(50) NOT NULL,

	CONSTRAINT Task_PK PRIMARY KEY(Task_ID)
/*
TProjectID
TAssignedID
TaskAssigned_ID INT(6) NOT NULL,

*/

);
