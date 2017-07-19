<?php
include('grievance.php');

$eid=$_POST['eid'];
$date=$_POST['grievance-date'];
$time_alone=$_POST['timeAlone'];
$machine_number=$_POST['machine'];
$feed_sweep=$_POST['radio'];
$supervisor=$_POST['supervisor'];
$mail_processed=$_POST['mail-processed'];
$time_helped=$_POST['time-helped'];
$time_swept=$_POST['time-swept'];
$hoursWorkedAlone=$_POST['hours-worked-alone'];
$minutesWorkedAlone=$_POST['minutes-worked-alone'];


$query = 'INSERT INTO filedGrievances(employeeID, date, machineNumber, timeAlone, supervisorName, feedAndSweep, mailProcessed, timeHelpReceieved, timeHelpSweptMachine, hoursWorkedAlone, minutesWorkedAlone) VALUES(?,?,?,?,?,?,?,?,?,?,?) ';

$stmt = $conn->prepare($query);
$stmt->bindValue(1, $eid );
$stmt->bindValue(2, $date );
$stmt->bindValue(3, $time_alone );
$stmt->bindValue(4, $machine_number );
$stmt->bindValue(5, $feed_sweep );
$stmt->bindValue(6, $supervisor );
$stmt->bindValue(7, $mail_processed );
$stmt->bindValue(8, $time_helped );
$stmt->bindValue(9, $time_swept );
$stmt->bindValue(10, $hoursWorkedAlone );
$stmt->bindValue(11, $minutesWorkedAlone );
$stmt->execute();
