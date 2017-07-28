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
  //address, city, state, zip_code, phone_number, employee_id, seniority_date, pay_level, pay_step, tour, days_off, veteran_status, layoff_protected, registration_id
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
                                            WHERE registration_id = '$id'";
    //"UPDATE articles SET  `article_content`='' WHERE `id` = ?"
    //$stmt->bindParam(':employeeType', $employeeType); 
    /*$stmt->bindValue(2, $adddress);
    $stmt->bindValue(3, $city);
    $stmt->bindValue(4, $state);
    $stmt->bindValue(5, $zip);
    $stmt->bindValue(6, $phone);
    $stmt->bindValue(7, $employeeId);
    $stmt->bindValue(8, $seniorityDate);
    $stmt->bindValue(9, $payStatusLevel);
    $stmt->bindValue(10, $payStep);
    $stmt->bindValue(11, $tour);
    $stmt->bindValue(12, $daysOff);
    $stmt->bindValue(13, $veteranStatus);
    $stmt->bindValue(14, $layoffProtected);
    $stmt->bindValue(15, $id);*/
    $stmt = $handler->prepare($sql);
    $stmt->execute();
    echo "Updated";
  } catch (PDOException $e) {
    echo "We have an error"."<br>";
    echo $e->getMessage()."<br>";
  }
}