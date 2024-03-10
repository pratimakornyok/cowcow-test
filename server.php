<?php
session_start();

$employee_name = "";
$employee_email    = "";
$errors = array(); 

// connect to the databaseS
$db = mysqli_connect('localhost', 'root', '', 'cowcow');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $employee_name = mysqli_real_escape_string($db, $_POST['employee_name']);
  $employee_email = mysqli_real_escape_string($db, $_POST['employee_email']);
  $employee_address = mysqli_real_escape_string($db, $_POST['employee_address']);
  $employee_phone = mysqli_real_escape_string($db, $_POST['employee_phone']);
  $employee_pass_1 = mysqli_real_escape_string($db, $_POST['employee_pass_1']);
  $employee_pass_2 = mysqli_real_escape_string($db, $_POST['employee_pass_1']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($employee_name)) { array_push($errors, "Username is required"); }
  if (empty($employee_email)) { array_push($errors, "Email is required"); }
  if (empty($employee_address)) { array_push($errors, "Address is required"); }
  if (empty($employee_phone)) { array_push($errors, "Phone is required"); }
  if (empty($employee_pass_1)) { array_push($errors, "Password is required"); }
  if ($employee_pass_1 != $employee_pass_2) {
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
  	$employee_pass = md5($employee_pass_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO employee (employee_name, employee_email, employee_address, employee_phone, employee_pass) 
  			  VALUES('$employee_name', '$employee_email', '$employee_address', '$employee_phone', '$employee_pass')";
  	mysqli_query($db, $query);
  	$_SESSION['employee_name'] = $employee_name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $employee_name = mysqli_real_escape_string($db, $_POST['employee_name']);
  $employee_pass = mysqli_real_escape_string($db, $_POST['employee_pass']);

  if (empty($employee_name)) {
  	array_push($errors, "Username is required");
  }
  if (empty($employee_pass)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$employee_pass = md5($employee_pass);
  	$query = "SELECT * FROM employee WHERE employee_name='$employee_name' AND employee_pass='$employee_pass'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['employee_name'] = $employee_name;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: home.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>