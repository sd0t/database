/*
 * AUTHOR	Denise Nguyen
 * DATE 	10/26/2017
 * COURSE   	CIS444 
 * PURPOSE  	{s.dot} Database 
*/

/*Projects Table*/
CREATE TABLE PROJECTS(
	Project_ID INT NOT NULL AUTO_INCREMENT,
	Project_Name VARCHAR(25) NOT NULL, 
	Project_Summary VARCHAR(50) NOT NULL,

	CONSTRAINT Project_PK PRIMARY KEY (Project_ID)
);
