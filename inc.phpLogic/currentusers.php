<?php

class ExpUsers extends Dbh{
    protected function escape(post){
      return mysqli->real_escape_string(post);
    };
  private $fullName1=escape($_POST['full-name']);
  private $employeeStatus=escape($_POST['employeeStatus']);
  private $grievanceDate=escape($_POST['grievance-date']);
  private $employeeID=escape($_POST['eid']);
  private $seniority=escape($_POST['seniority']);
  private $machineNum=escape($_POST['machine']);
  private $timeAlone=escape($_POST['timeAlone']);
  private $radio=escape($_POST['radio']);
  private $mailProcessed=escape($_POST['mail-processed']);
  private $timeHelped=escape($_POST['time-helped']);
  private $timeSwept=escape($_POST['time-swept']);
  private $hoursWorkedAlone=escape($_POST['hours-worked-alone']);
  private $minutesWorkedAlone=escape($_POST['minutes-worked-alone']);

  protected function insertUserData() {
    $sql = 'INSERT INTO usergrievance (eid, fullName, employeeStatus, grievanceDate, seniority, machine, timeAlone, radio, mail-processed, timeHelped, timeSwept, hourWorkedAlone, minutesWorkedAlone) VALUES ($employeeID, $fullName1, $employeeStatus, $grievanceDate, $seniority, $machineNum, $timeAlone, $radio, $mailProcessed, $timeHelped, $timeSwept, $hoursWorkedAlone, $minutesWorkedAlone )';
    $result = $this->connect()->query($sql);
}
}
