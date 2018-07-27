<?php
session_start();
include('../../helpers/functions.php');
include_once("../../db/config.php");

adminOnly();
$fname = '';
$lname = '';
$email = '';
if (isset($_POST['submit'])) {
	$fname = clean_input($_POST['fname']);
	$lname = clean_input($_POST['lname']);
	$email = clean_input($_POST['email']);
	$user_id = $_POST['user_id'];
	$sql = "UPDATE `users` SET `fname` = '$fname', `lname` = '$lname', `email` = '$email' WHERE `users`.`user_id` = $user_id;";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	if ($result) {
		header('Location: ../admin/users.php');
	} else {
		echo "Ooops...Something wend Wrong!";
	}

}
	$sql = "SELECT * FROM users WHERE user_id = $_REQUEST[id]";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	if(mysqli_num_rows($result)>0){
	  $row = mysqli_fetch_array($result);
	  $fname = $row['fname'];
	  $lname = $row['lname'];
	  $email = $row['email'];

	}else{
	    $str = "<p style='font-size: 40px;'>No records matched.</p>";
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>One Movies</title>
	<link href="../../css/styles.css" rel="stylesheet" type="text/css" />
	<link href="../../css/header.css" rel="stylesheet" type="text/css" />
	<link href="../../css/search.css" rel="stylesheet" type="text/css" />
	<link href="../../css/navbar.css" rel="stylesheet" type="text/css"> 
	<link href="../../css/admin.css" rel="stylesheet" type="text/css"> 
</head>
	
<body>
	<?php include("../partials/header.php"); ?>
	<?php include('../partials/nav.php'); ?>

	<div class="container add-movie">
		<h3>Edit User</h3>
		<form action="" method="post">
			<div class="form-input">
				<label>First Name: <input type="text" name="fname" placeholder="First name" value="<?= $fname ?>" required></label>
			</div>
			<div class="form-input">
				<label>Last Name: <input type="text" name="lname" placeholder="Last name" value="<?= $lname ?>" required></label>
			</div>
			<div class="form-input">
				<label>Email: <input type="text" name="email" placeholder="Email" value="<?= $email ?>" required></label>
			</div>
			<input type="hidden" name="user_id" value="<?= $_REQUEST['id']; ?>">
			<div class="form-input">
				<label>
					<input type="submit" name="submit" value="Save">
				</label>
			</div>
		</form>
	</div>


	<div style="height: 500px;"></div>

	<?php include('../partials/footer.php'); ?>
