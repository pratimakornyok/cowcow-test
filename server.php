<?php
$servername = "localhost";
$userame = "root";
$password = "";
$dbname = "cowcow";

//creat connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if(!$conn) {
    die("connection failed" . mysqli_connect_error());
}
?>