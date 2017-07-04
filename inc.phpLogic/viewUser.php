<?php

class viewUser extends User{
  
    public function showAllUsers() {
    $datas = $this->getAllUsers();
    foreach($datas as $data) {
        echo "<br>".$data['name']."<br>";
        echo $data['employeeType']."<br>";

            }
        }
    }
