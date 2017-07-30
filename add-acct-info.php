<?php
require_once('connection.php');

if (isset($_POST['submit'])) {
  // POST variables 
  
  $fullName = $_POST['full-name'];
  $email = $_POST['email1'];
  $password = trim($_POST['password1']);
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // PW auto salted & hashed 

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
    $stmt = $handler->prepare("INSERT INTO account_information (full_name, email, password, employee_type, address, city, state, zip_code, phone_number, employee_id, seniority_date, pay_level, pay_step, tour, days_off, veteran_status, layoff_protected) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindValue(1, $fullName);
    $stmt->bindValue(2, $email);
    $stmt->bindValue(3, $hashedPassword);
    $stmt->bindValue(4, $employeeType);
    $stmt->bindValue(5, $adddress);
    $stmt->bindValue(6, $city);
    $stmt->bindValue(7, $state);
    $stmt->bindValue(8, $zip);
    $stmt->bindValue(9, $phone);
    $stmt->bindValue(10, $employeeId);
    $stmt->bindValue(11, $seniorityDate);
    $stmt->bindValue(12, $payStatusLevel);
    $stmt->bindValue(13, $payStep);
    $stmt->bindValue(14, $tour);
    $stmt->bindValue(15, $daysOff);
    $stmt->bindValue(16, $veteranStatus);
    $stmt->bindValue(17, $layoffProtected);
    $stmt->execute();
    echo "Inserted";
  } catch (PDOException $e) {
    echo "We have an error"."<br>";
    echo $e->getMessage()."<br>";
  }
}