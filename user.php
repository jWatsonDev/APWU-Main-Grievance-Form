<?php
include ('grievance.php');

 $fullName=$_POST['full-name'];
$employeeStatus=$_POST['employeeStatus']; $grievanceDate=$_POST['grievance-date'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$employeeID=$_POST['eid'];
$phone=$_POST['phone'];
$seniority=$_POST['seniority'];
$machineNum=$_POST['machine'];
$timeAlone=$_POST['timeAlone'];
 $radio=$_POST['radio'];
  $mailProcessed=$_POST['mail-processed'];
  $timeHelped=$_POST['time-helped'];
$timeSwept=$_POST['time-swept'];
  $hoursWorkedAlone=$_POST['hours-worked-alone'];
   $minutesWorkedAlone=$_POST['minutes-worked-alone'];
$conn->query('
        INSERT INTO usergrievance (eid, fullName, employeeStatus, grievanceDate, seniority, machine, timeAlone, radio, mail-processed, timeHelped, timeSwept, hourWorkedAlone, minutesWorkedAlone) VALUES ($employeeID, $fullName, $employeeStatus, $grievanceDate, $seniority, $machineNum, $timeAlone, $radio, $mailProcessed, $timeHelped, $timeSwept, $hoursWorkedAlone, $minutesWorkedAlone)
        ');
 

/*    function insertUserData() {
        $sqlUserField = 'INSERT INTO userInfo(eid, fullName, employeeStatus, address, city, state, phone, seniority) VALUES ($employeeID, $fullName1, $employeeStatus, $address, $city, $state, $phone, $seniority);
        INSERT INTO usergrievance (eid, fullName, employeeStatus, grievanceDate, seniority, machine, timeAlone, radio, mail-processed, timeHelped, timeSwept, hourWorkedAlone, minutesWorkedAlone) VALUES ($employeeID, $fullName1, $employeeStatus, $grievanceDate, $seniority, $machineNum, $timeAlone, $radio, $mailProcessed, $timeHelped, $timeSwept, $hoursWorkedAlone, $minutesWorkedAlone)
        ';
    

    }

*/
?>