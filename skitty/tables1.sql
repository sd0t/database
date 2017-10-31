/*
 * AUTHOR	Denise Nguyen
 * DATE 	10/26/2017
 * COURSE   CIS444 
 * PURPOSE  {s.dot} Database 
 
 Users(UserID, Username, Fname, Lname, Password)
 Project(ProjectID, ProjectName, ProjectSummary)
 ProjectMember(PMProjectID,PMUserID)
 Tasks(TaskID, Priority, Task, Complete, SCRUM, Remarks,
 			      					TProjectID, TAssignedID)
 Bugs(BugID, SourceFile, Location, Description, Status, 
						BProjectID, BReporterID, BAssienedID)
 Fourm(FourmID, Comment, 
 										FProjectID, FUserID)



 */

DROP TABLE USERS;
DROP TABLE PROJECTS;
DROP TABLE MEMBERS;
DROP TABLE TASKS;
DROP TABLE BUGS;
DROP TABLE FOURMS;



/*Users Table*/
CREATE TABLE USERS(
	User_ID INT NOT NULL AUTO_INCREMENT,
	Username VARCHAR(20) NOT NULL,
	Password VARCHAR(20) NOT NULL,

	CONSTRAINT Users_PK PRIMARY KEY (User_ID),
	CONSTRAINT Username UNIQUE(Username)
);


/*Inserting users*/
INSERT INTO USERS (Username,Password)
VALUES	('kitty','6666'),
('Max','6666'),
('Cody','6666'),
('ALex','6666'),
('Victor','6666');

/*Deleting users*/
DELETE FROM USERS WHERE Password=6666;
/*ALTER TABLE table_name AUTO_INCREMENT = 1;*/
ALTER TABLE USERS AUTO_INCREMENT = 1;

/*Projects Table*/
CREATE TABLE PROJECTS(
	Project_ID INT NOT NULL AUTO_INCREMENT,
	Project_Name VARCHAR(25) NOT NULL, 
	Project_Summary VARCHAR(50) NOT NULL,

	CONSTRAINT Project_PK PRIMARY KEY (Project_ID)
);

/*Project Memebers Table*/
CREATE TABLE MEMBERS(
	Member_Project_ID INT(6) NOT NULL,
	Member_User_ID	INT(6) NOT NULL
	/*FOREIGN KEY*/
	/* User_ID INT(6) NOT NULL AUTO INCREMENT, */
);

/*Task Tracking Table*/
CREATE TABLE TASKS(
	Task_ID INT NOT NULL AUTO_INCREMENT,
	Priority INT(3) NOT NULL,
	Task VARCHAR(50) NOT NULL,
	TaskComplete VARCHAR(5) NOT NULL,
	SCRUM INT(3) NOT NULL,
	TaskRemarks VARCHAR(50) NOT NULL,
	TaskAssigned_ID INT(6) NOT NULL,

	CONSTRAINT Task_PK PRIMARY KEY(Task_ID)
);

/*Bug Tracking Table*/
CREATE TABLE BUGS(
	Bugs_ID INT NOT NULL AUTO_INCREMENT,
	Sourcefile VARCHAR(25) NOT NULL,
	Location CHAR(15) NOT NULL,
	Description VARCHAR(50) NOT NULL,
	BugStauts VARCHAR(15) NOT NULL,
	BugReporter_ID VARCHAR(15) NOT NULL,
	BugAssigned_ID VARCHAR(15) NOT NULL,
);


/*Dev Fourm Table*/
CREATE TABLE FOURMS(
	Fourm_ID INT NOT NULL AUTO_INCREMENT,
	FourmThread VARCHAR(50) NOT NULL,
	FourmUser_ID VARCHAR(15) NOT NULL
);

