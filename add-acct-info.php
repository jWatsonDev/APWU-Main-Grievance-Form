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
    $stmt = $handler->prepare("INSERT INTO account_information (employee_type, address, city, state, zip_code, phone_number, employee_id, seniority_date, pay_level, pay_step, tour, days_off, veteran_status, layoff_protected, registration_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindValue(1, $employeeType);
    $stmt->bindValue(2, $adddress);
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
    $stmt->bindValue(15, $id);
    $stmt->execute();
    echo "Inserted";
  } catch (PDOException $e) {
    echo "We have an error"."<br>";
    echo $e->getMessage()."<br>";
  }
}