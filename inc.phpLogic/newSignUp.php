<?php
include ('grievance.php');


$fullName = $_POST['full-name'];
$email = $_POST['email1'];
$password = $_POST['password1'];
/* $options = [
    'cost' => 10,
]; Used to shorten execution time to under 100 millisection values 8 - 12 normally*/
$hash = password_hash($password, PASSWORD_DEFAULT);

try {
    $stmt = $conn->prepare("INSERT INTO userAccounts (fullName, emailAddress, PASSWORD) VALUES (?, ? , ?)");
    $stmt->bindValue(1, $fullName);
    $stmt->bindValue(2, $email);
    $stmt->bindValue(3, $hash);
    $stmt->execute();
}
catch(PDOException $e) {
   echo "We have an error"."<br>";
  echo $e->getMessage()."<br>";


   }
     $conn = null;


header('Location:../htmlPages/newSignUpAccountInfo.html');
