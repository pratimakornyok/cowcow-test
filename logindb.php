<?php
session_start();
include('server.php');

$errors = array();

if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(empty($username)) {
        array_push($errors, "username is required");
    }

    if(empty($password)) {
        array_push($errors, "password is required");
    }

    if(count($errors) == 0) {
        //$password = md5($password);
        $query = "SELECT * FROM employee WHERE employee_name = '$username' OR employee_pass = '$password'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            if(password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['success'] = "You are now loged in";
                    header('location: home.php');

            }else{
                array_push($errors, "Wrong username/password combination");
                $_SESSION['error'] = "Wrong username/password. Please try again.";
                header("location: login.php");
            }

        }else{
            array_push($errors, "No user found with that username");
            $_SESSION['error'] = "No user found with that username";
            header("location: login.php");
        }
    }
}
?>