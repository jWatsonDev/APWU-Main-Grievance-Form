<?php
include ('grievance.php');


$employeeID = $_POST['eid'];
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


try{
$stmtSignUpInfo = $conn->prepare("INSERT INTO UserSignUp (employeeID , employeeType , address, city , state, zipcode, phoneNumber,
seniorityDate, payLevel, payStep, tour, daysOff, veteranStatus, layOffProtected) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmtSignUpInfo->bindValue(1, $employeeID);
$stmtSignUpInfo->bindValue(2, $employeeType);
$stmtSignUpInfo->bindValue(3, $address);
$stmtSignUpInfo->bindValue(4, $city);
$stmtSignUpInfo->bindValue(5, $state);
$stmtSignUpInfo->bindValue(6, $zipCode);
$stmtSignUpInfo->bindValue(7, $phone);
$stmtSignUpInfo->bindValue(8, $seniority);
$stmtSignUpInfo->bindValue(9, $payStatus);
$stmtSignUpInfo->bindValue(10, $payStep);
$stmtSignUpInfo->bindValue(11, $tour);
$stmtSignUpInfo->bindValue(12, $daysOff);
$stmtSignUpInfo->bindValue(13, $veteran);
$stmtSignUpInfo->bindValue(14, $layOffProtected);
$stmtSignUpInfo->execute();
echo var_dump($_POST)."<br>";


}


catch(PDOException $e) {
  echo var_dump(PDOException);
   echo "We have an error"."<br>";
  echo $e->getMessage()."<br>";

   }
     $conn = null;


// header('Location:../htmlPages/success.html');
