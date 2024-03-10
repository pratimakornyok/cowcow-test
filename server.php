<?php
session_start();

$employee_name = "";
$employee_email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'cowcow');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $employee_name = mysqli_real_escape_string($db, $_POST['employee_name']);
  $employee_email = mysqli_real_escape_string($db, $_POST['employee_email']);
  $employee_address = mysqli_real_escape_string($db, $_POST['employee_address']);
  $employee_phone = mysqli_real_escape_string($db, $_POST['employee_email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($employee_name)) { array_push($errors, "Username is required"); }
  if (empty($employee_email)) { array_push($errors, "Email is required"); }
  if (empty($employee_address)) { array_push($errors, "Address is required"); }
  if (empty($employee_phone)) { array_push($errors, "Phone is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM employee WHERE employee_name='$employee_name' OR employee_email='$employee_email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['employee_name'] === $employee_name) {

      array_push($errors, "Username already exists");
    }

    if ($user['employee_email'] === $employee_email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO employee (employee_name, employee_email, password) 
  			  VALUES('$employee_name', '$employee_name', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['employee_name'] = $employee_name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $employee_name = mysqli_real_escape_string($db, $_POST['employee_name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($employee_name)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM employee WHERE employee_name='employee_name' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['employee_name'] = $employee_name;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>