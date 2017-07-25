<?php
require_once('connection.php');

$fullName = $_POST['full-name'];
$email = $_POST['email1'];
$password = trim($_POST['password1']);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // PW auto salted & hashed 

try {
  $stmt = $handler->prepare("INSERT INTO registration (full_name, email, password) VALUES (?, ? , ?)");
  $stmt->bindValue(1, $fullName);
  $stmt->bindValue(2, $email);
  $stmt->bindValue(3, $hashedPassword);
  $stmt->execute();
  echo "Inserted";
} catch (PDOException $e) {
  echo "We have an error"."<br>";
  echo $e->getMessage()."<br>";
}

$handler = null; // Closing connection 
