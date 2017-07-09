# APWU-Main-Grievance-Form
This grievance form is for the multitude of union stewards who are having problems filing and keeping track of grievances forms.
In making this all grievances can be kept track of electronically and the APWU will become a
more green organization.

SQL code for table creation no longer relevant. Will update when signup.html and userspage.html are complete.
https://dev.mysql.com/doc/refman/5.5/en/encryption-functions.html
^^^^^
Must learn about password encryption before sql table completion.
CREATE TABLE UserSignUp (
	employeeID int(8) PRIMARY KEY NOT null,
	fullName varchar(128) NOT null,
    employeeType varchar(28) NOT null,
    address varchar(128) NOT null,
    city varchar(28) NOT null,
    state varchar(28) NOT null,
    zipcode int(10) NOT null,
    phoneNumber int(10) NOT null,
    seniorityDate varchar(10) NOT null,
    payLevel varchar(10) NOT null,
    payStep varchar(10) NOT null,
    tour int(3) NOT null,
    daysOff varchar(28) NOT null,
    veteranStatus varchar(10) NOT null,
    layOffProtected varchar(10) NOT null,
    emailAddress varchar(128) NOT null,
    PASSWORD <<<<<<????????
