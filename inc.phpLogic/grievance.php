<?php
try{
$conn = new PDO('mysql:host=localhost;dbname=apwugrievances;charset=utf8;','root','Cd151988@$');
}

catch(Exception $e) {
   echo "We have an error"."<br>";
  echo $e->getMessage()."<br>";
  die();
}
