<?php
require_once('connection.php');
session_start();
$id = $_SESSION['id'];

// get pw
$sql = "SELECT * FROM account_information WHERE id = '$id'";
$query = $handler->query($sql);
$row = $query->fetch(PDO::FETCH_OBJ);

//echo $row->id . " - " . $row->password;

if (isset($_POST['submit'])) {
  // POST variables 
  $newEmail = $_POST['email1'];
  $newEmail2 = $_POST['email2'];
  $password = $_POST['password1'];
  if ($newEmail == $newEmail2 && password_verify($password, $row->password)) {
      try {
        $sql = "UPDATE account_information SET email = '$newEmail' WHERE id = '$id'";
        $stmt = $handler->prepare($sql);
        $stmt->execute();
        echo "Email updated.";
      } catch (PDOException $e) {
        echo "We have an error"."<br>";
        echo $e->getMessage()."<br>";
      }
  } else {
      echo "Emails don't match or pw is incorrect.";
  }
}