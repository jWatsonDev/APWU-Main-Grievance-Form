# APWU-Main-Grievance-Form
This grievance form is for the multitude of union stewards who are having problems filing and keeping track of grievances forms.
In making this all grievances can be kept track of electronically and the APWU will become a 
more green organization.


#SQL for database and table creation
CREATE DATABASE grievanceInfo



CREATE TABLE userInfo(
    eid int(8) NOT null PRIMARY KEY,
    fullName varchar(128) NOT null,
    datacreated timestamp NOT null,
    employeeStatus varchar(28) NOT null,
    address varchar(72) NOT null,
    city varchar(28) NOT null,
    state varchar(10) NOT null,
    phone varchar(10) NOT null,
    seniority varchar(28) NOT null
             
                     );
CREATE TABLE usergrievance(
	eid int(8) NOT null ,
    fullName varchar(128) NOT null,
    employeeStatus varchar(28) NOT null,
    grievanceDate varchar(28) NOT null,
    fileDate timestamp NOT null,
    seniority varchar(28) NOT null,
    machine int(3) NOT null,
    timeAlone varchar(28) NOT null,
    radio varchar(10) NOT null,
    mailProcessed int(10) NOT null,
    timeHelped varchar(28),
    timeSwept int(3),
    hourWorkedAlone int(2) NOT null,
    minutesWorkedAlone int(3) 
    
);
