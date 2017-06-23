<?php

class User extends Dbh{
  
    protected function getAllUsers() {
        $sql = 'SELECT * FROM post';
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()){
                $datas[] = $row;

                return $datas;
            }
        }
    }
}