<?php
session_start();

include('../../helpers/functions.php');
include_once("../../db/config.php");

regUserOnly();

if (isset($_POST['submit'])) {
	$id =  $_POST['id'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$name = $_POST['name'];
	$date = $_POST['date'];
var_dump($date);
	$sql1 = "INSERT INTO `transactions` ( `user_id`, `amount`, `film_id`, `time`) VALUES ('$_SESSION[user_id]', '". $price * $quantity."', '$id', CURRENT_TIMESTAMP);";
	$result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

	if (!$result1) {
		header("Location: ../main");
	} else {

		$transaction_id = mysqli_insert_id($con);

		$sql1 = "INSERT INTO `tickets` (`user_id`, `film_id`, `transaction_id`, quantity, date) VALUES ('$_SESSION[user_id]', '$id', ". $transaction_id .", $quantity, '$date');";
		$result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

	}
} else {
	header("Location: ../main/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>One Movies</title>
	<link href="../../css/styles.css" rel="stylesheet" type="text/css" />
	<link href="../../css/header.css" rel="stylesheet" type="text/css" />
	<link href="../../css/navbar.css" rel="stylesheet" type="text/css" />
	<link href="../../css/contact.css" rel="stylesheet" type="text/css">
	<link href="../../css/buy.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include('../partials/header.php'); ?>
	<?php include('../partials/nav.php'); ?>

	<div class="container">
		<div class = "cntct1">
		    <div class="ticket">
		    	<div class="head">
		    		You have purchased Ticket
		    	</div>
		    	<div class="body">
		    		<h3>Movie: <span><?= $name ?></span></h3>
		    		<h3>Time: <span><?= $_POST['time']; ?></span></h3>
		    		<h3>Date: <span><?= $_POST['date']; ?></span></h3>
		    		<h3>Location: <span><?= $_POST['location'] ?></span></h3>
		    		<h3>Quantity: <span><?= $_POST['quantity']; ?></span></h3>
		    		<h3>Transaction ID: <span><?= $transaction_id ?></span></h3>
		    	</div>
		    </div>
		</div>
	</div>
	<div style="height: 500px;"></div>

	<?php include('../partials/footer.php'); ?>
	
</body>
</html>