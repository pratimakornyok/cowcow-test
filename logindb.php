<?php
session_start();
include('server.php');

$errors = array();

if(isset($_POST['login_user'])) {
    $employee_name = mysqli_real_escape_string($conn, $_POST['username']);
    $employee_pass = mysqli_real_escape_string($conn, $_POST['password']);

    if(empty($username)) {
        array_push($error, "username is required");
    }

    if(empty($password)) {
        array_push($error, "password is required");
    }

    if(count($error) == 0) {
        $query = "SELECT * FORM employee WHERE employee_name = '$username'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now loged in";

            if($employee['role'] == 'Admin'){
                header('location: home.php');
            }
        }else{
            array_push($errors, "Wrong username/password combination");
            $_SESSION['error'] = "Wrong username/password. Please try again.";
            header("location: login.php");
        }
    }
}
?>