<?php 
  session_start(); 

  if (!isset($_SESSION['employee_name'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['employee_name']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><P>Home Page</p></center>
	<!-- <br><br><br><br><br><br>
    <center><P>Home Page</p></center>
	<br><br>
	<div class="container">
	<div class="box">
		<h2><a href="customer.php">CUSTOMER</a></h2>
		<p>Manage your customer information here.</p>
	</div>
	<div class="box">
		<h2><a href="employee.php">EMPLOYEE</a></h2>
		<p>Access employee-related functions.</p>
	</div>
	<div class="box">
		<h2><a href="cow.php">COW</a></h2>
		<p>Explore our bovine inventory.</p>
	</div>
	<div class="box">
		<h2><a href="bill.php">BILL</a></h2>
		<p>View and manage billing information.</p>
	</div> -->
	</div>
	
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['employee_name'])) : ?>
    	<p>Welcome <strong></*?php echo $_SESSION['username']; ?*/></strong></p>
    	<center><p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p></center>
    <?php endif ?>
</div>

</body>
</html>