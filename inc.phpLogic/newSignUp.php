<?php
include ('grievance.php');


$fullName = $_POST['full-name'];
$email = $_POST['email1'];
$password = $_POST['password1'];
/* $options = [
    'cost' => 10,
]; Used to shorten execution time to under 100 millisection values 8 - 12 normally*/
$hash = password_hash($password, PASSWORD_DEFAULT);
/*$sqlQueryCreateAccount = "INSERT INTO userAccounts (employeeID, emailAddress, PASSWORD) VALUES (?,?,?)";
$sqlQueryUserSignUp = "INSERT INTO UserSignUp(fullName , employeeType , address, city , state, zipcode, phoneNumber,
seniorityDate, payLevel, payStep, tour, daysOff, veteranStatus, layOffProtected) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; */
// $conn->beginTransaction();
try{
$stmt = $conn->prepare("INSERT INTO userAccounts (fullName, emailAddress, PASSWORD) VALUES (?, ? , ?)");
$stmt->bindValue(1,$fullName);
$stmt->bindValue(2,$email);
$stmt->bindValue(3,$hash);
$stmt->execute();
}
/*
$stmtCreateUnique = $conn->prepare("CREATE TABLE ".$employeeID."Grievances like filedGrievances");
$stmtCreateUnique->execute();
$stmtSignUpInfo = $conn->prepare("INSERT INTO UserSignUp (employeeID, fullName , employeeType , address, city , state, zipcode, phoneNumber,
seniorityDate, payLevel, payStep, tour, daysOff, veteranStatus, layOffProtected) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmtSignUpInfo->bindValue(1, $employeeID);
$stmtSignUpInfo->bindValue(2, $fullName);
$stmtSignUpInfo->bindValue(3, $employeeType);
$stmtSignUpInfo->bindValue(4, $address);
$stmtSignUpInfo->bindValue(5, $city);
$stmtSignUpInfo->bindValue(6, $state);
$stmtSignUpInfo->bindValue(7, $zipCode);
$stmtSignUpInfo->bindValue(8, $phone);
$stmtSignUpInfo->bindValue(9, $seniority);
$stmtSignUpInfo->bindValue(10, $payStatus);
$stmtSignUpInfo->bindValue(11, $payStep);
$stmtSignUpInfo->bindValue(12, $tour);
$stmtSignUpInfo->bindValue(13, $daysOff);
$stmtSignUpInfo->bindValue(14, $veteran);
$stmtSignUpInfo->bindValue(15, $layOffProtected);
$stmtSignUpInfo->execute();

if(!$stmtSignUpInfo->execute()) {
throw new Exception($statement->errorInfo()[2]);
}
$conn->commit();
}

*/
catch(PDOException $e) {
   echo "We have an error"."<br>";
  echo $e->getMessage()."<br>";


   }
     $conn = null;


header('Location:../htmlPages/newSignUpAccountInfo.html');
