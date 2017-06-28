<?php

class User extends Dbh{
  private $_POST['full-name'];
  private $_POST['employeeStatus'];
  private $_POST['grievance-date'];
  private $_POST['address'];
  private $_POST['city'];
  private $_POST['state'];
  private $_POST['eid'];
  private $_POST['phone'];
  private $_POST['seniority'];
  private $_POST['machine'];
  private $_POST['timeAlone'];
  private $_POST['radio'];
  private $_POST['mail-processed'];
  private $_POST['time-helped'];
  private $_POST['time-swept'];
  private $_POST['hours-worked-alone'];
  private $_POST['minutes-worked-alone'];
    protected function insertUserData() {
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
