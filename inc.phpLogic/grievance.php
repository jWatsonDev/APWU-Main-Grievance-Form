<?php
try{
$conn = new PDO('mysql:host=localhost;dbname=apwugrievance;charset=utf8;','phpmyadmin','Cd151988@%');
}

catch(Exception $e) {
   echo "We have an error"."<br>";
  echo $e->getMessage()."<br>";
  die();
}
