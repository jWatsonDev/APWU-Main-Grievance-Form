<?php
include ('grievance.php');

$employeeID = $_POST['eid'];
$fullName = $_POST['full-name'];
$employeeType = $_POST['employeeStatus'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipCode = $_POST['zipCode'];
$phone = $_POST['phone'];
$seniority = $_POST['seniority'];
$payStatus = $_POST['payLevel'];
$payStep = $_POST['payStep'];
$tour = $_POST['tour'];
$daysOff = $_POST['daysOff'];
$veteran = $_POST['veteranStatus'];
$layOffProtected = $_POST['layOffProtected'];
$email = $_POST['email1'];
$password = $_POST['password1'];
/* $options = [
    'cost' => 10,
]; Used to shorten execution time to under 100 millisection values 8 - 12 normally*/
$hash = password_hash($password, PASSWORD_DEFAULT);
/*$sqlQueryCreateAccount = "INSERT INTO userAccounts (employeeID, emailAddress, PASSWORD) VALUES (?,?,?)";
$sqlQueryUserSignUp = "INSERT INTO UserSignUp(fullName , employeeType , address, city , state, zipcode, phoneNumber,
seniorityDate, payLevel, payStep, tour, daysOff, veteranStatus, layOffProtected) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; */
$stmt = $conn->prepare("INSERT INTO userAccounts (employeeID, emailAddress, PASSWORD) VALUES (?,?,?)");
$stmt->bindValue(1,$employeeID);
$stmt->bindValue(2,$email);
$stmt->bindValue(3,$hash);
$stmt->execute();
$stmtSignUpInfo = $conn->prepare("INSERT INTO UserSignUp (fullName , employeeType , address, city , state, zipcode, phoneNumber,
seniorityDate, payLevel, payStep, tour, daysOff, veteranStatus, layOffProtected) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmtSignUpInfo->bindValue(1, $fullName);
$stmtSignUpInfo->bindValue(2, $employeeType);
$stmtSignUpInfo->bindValue(3, $address);
$stmtSignUpInfo->bindValue(4, $city);
$stmtSignUpInfo->bindValue(5, $state);
$stmtSignUpInfo->bindValue(6, $zipCode);
$stmtSignUpInfo->bindValue(7, $phone);
$stmtSignUpInfo->bindValue(8,$seniority);
$stmtSignUpInfo->bindValue(9, $payStatus);
$stmtSignUpInfo->bindValue(10, $payStep);
$stmtSignUpInfo->bindValue(11, $tour);
$stmtSignUpInfo->bindValue(12, $daysOff);
$stmtSignUpInfo->bindValue(13, $veteran);
$stmtSignUpInfo->bindValue(14, $layOffProtected);
$stmtSignUpInfo->execute();
header('Location:../userspage.html');
