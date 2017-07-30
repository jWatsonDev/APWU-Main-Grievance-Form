<?php
require_once('connection.php');
session_start();
$id = $_SESSION['id'];
if (isset($_POST['submit'])) {
  // POST variables 
  $employeeType = $_POST['employeeStatus'];
  $adddress = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zipCode'];
  $phone = $_POST['phone'];
  $employeeId = $_POST['eid'];
  $seniorityDate = $_POST['seniority'];
  $payStatusLevel = $_POST['payLevel'];
  $payStep = $_POST['payStep'];
  $tour = $_POST['tour'];
  $daysOff = $_POST['daysOff'];
  $veteranStatus = $_POST['veteranStatus'];
  $layoffProtected = $_POST['layOffProtected'];

  try {
    $sql = "UPDATE account_information SET employee_type = '$employeeType',
                                            address = '$adddress',
                                            city = '$city',
                                            state = '$state',
                                            zip_code = '$zip', 
                                            phone_number = '$phone',
                                            employee_id = '$employeeId',
                                            seniority_date = '$seniorityDate',
                                            pay_level = '$payStatusLevel',
                                            pay_step = '$payStep',
                                            tour = '$tour',
                                            days_off = '$daysOff',
                                            veteran_status = '$veteranStatus',
                                            layoff_protected = '$layoffProtected'
                                            WHERE id = '$id'";
    $stmt = $handler->prepare($sql);
    $stmt->execute();
    echo "Updated";
  } catch (PDOException $e) {
    echo "We have an error"."<br>";
    echo $e->getMessage()."<br>";
  }
}