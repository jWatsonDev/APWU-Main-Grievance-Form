# APWU-Main-Grievance-Form
This grievance form is for the multitude of union stewards who are having problems filing and keeping track of grievances forms.
In making this all grievances can be kept track of electronically and the APWU will become more green organization.

Resources:

Learning PHP 7

Learning PHP, MySQL, JavaScript,

CSS & HTML5

Pro PHP and jQuery

http://php.net/manual/en/pdo.prepared-statements.php

https://stackoverflow.com/questions/10908561/mysql-meaning-of-primary-key-unique-key-and-key-when-used-together-whil

https://geeksww.com/tutorials/database_management_systems/mysql/tips_and_tricks/mysql_primary_key_vs_unique_key_constraints.php

https://stackoverflow.com/questions/16200254/best-way-to-use-pdo-in-procedural-environment

https://stackoverflow.com/questions/17408605/mysqli-procedural-vs-pdo

https://stackoverflow.com/a/14112684/285587

SQL code for table creation no longer relevant. Will update when signup.html and userspage.html are complete.

http://php.net/manual/en/function.password-hash.php
<<<<
Must learn about password encryption before sql table completion.
CREATE Database grievanceInfo;
USE grievanceInfo;

CREATE TABLE userAccounts (

	id int(11) PRIMARY KEY AUTO_INCREMENT NOT null,
	fullName varchar(128) NOT null,
	emailAddress varchar(128) NOT null,
	PASSWORD varchar(128) NOT null

	);

	CREATE TABLE UserSignUp (
			userAccounts_id int(11) not null,
			employeeID int(8) PRIMARY KEY NOT null,
	    employeeType varchar(28) NOT null,
	    address varchar(128) NOT null,
	    city varchar(28) NOT null,
	    state varchar(28) NOT null,
	    zipcode int(10) NOT null,
	    phoneNumber varchar(10) NOT null,
	    seniorityDate varchar(10) NOT null,
	    payLevel varchar(10) NOT null,
	    payStep varchar(10) NOT null,
	    tour int(3) NOT null,
	    daysOff varchar(28) NOT null,
	    veteranStatus varchar(10) NOT null,
	    layOffProtected varchar(10) NOT null,
			CONSTRAINT fk_userAccounts FOREIGN KEY(userAccounts_id) REFERENCES userAccounts(id)
		);

			CREATE TABLE filedGrievances (

	      employeeID_ref int(8) not null,
				id int(11) PRIMARY KEY AUTO_INCREMENT NOT null,
				date varchar(10) NOT null,
				machineNumber int(3) NOT null,
				timeAlone varchar(28) NOT null,
				supervisorName varchar(128) NOT null,
				feedAndSweep varchar(10) NOT null,
				mailProcessed int(11) NOT null,
				timeHelpReceieved varchar(10) ,
				timeHelpSweptMachine varchar(10),
				hoursWorkedAlone int(2) NOT null,
				minutesWorkedAlone int(2),
				CONSTRAINT fk_UserSignUp FOREIGN KEY(employeeID_ref) REFERENCES UserSignUp(employeeID)

				)
