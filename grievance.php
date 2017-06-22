<?php
//when document only has php don't close tag
// mysqli_connect() is a php function

$conn =  mysqli_connect('localhost','root','Cd151988@$', 'apwugrievances');


if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
