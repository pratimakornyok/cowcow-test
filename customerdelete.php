<?php
$customer_id = $_REQUEST['customer_id'];
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "cowcow";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("ไม่สามารถติดต่อกับ MySQL ได้: " . mysqli_connect_error());
}

$sql = "DELETE FROM customer WHERE customer_id = '$customer_id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("DELETE จากตาราง cow มีข้อผิดพลาดเกิดขึ้น: " . mysqli_error($conn));
}

mysqli_close($conn);

header("Location: customer.php");
?>
