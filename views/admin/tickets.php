<?php
session_start();
include('../../helpers/functions.php');
include_once("../../db/config.php");
adminOnly();

if (isset($_POST['submit'])) {
	$name = clean_input($_POST['name']);
	$price = clean_input($_POST['price']);
	$time = clean_input($_POST['time']);

	$sql = "INSERT INTO films (name, price, time) VALUES ('$name', '$price', '$time')";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
}

	$sql = "SELECT tickets.ticket_id, tickets.date, users.fname, users.lname, films.name, tickets.quantity FROM `tickets` 
	LEFT JOIN users ON users.user_id = tickets.user_id 
	LEFT JOIN films on films.film_id = tickets.film_id 
	LEFT JOIN transactions on transactions.transaction_id = tickets.transaction_id";

	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	if(mysqli_num_rows($result)>0){
	    $str= "<table>";
	    $str.="<tr><th>Ticket ID</th><th>Buyer</th><th>Movie</th><th>Quantity</th><th>Date</th></tr>";
	    $i = 0;
	    while($row = mysqli_fetch_array($result)){
	    	$i++;
	        $str.= "<tr><td>$row[ticket_id]</td>";
	        $str.= "<td>$row[fname]  $row[lname]</td>";
	        $str.= "<td>$row[name]</td>";
	        $str.= "<td>$row[quantity]</td>";
	        $str.= "<td>$row[date]</td>";
	        $str.= "<td><a class='dlt-button' href='delete.php?t=tickets&id=$row[ticket_id]'>DELETE</a></td>";
	    }
	    $str.= "</table>";
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
		<h3>Add a Movie</h3>
		<form action="" method="post">
			<input type="text" name="name" placeholder="Movie name">
			<input type="text" name="price" placeholder="Price">
			<input type=""  name="time" placeholder="Time">
			<input type="submit" name="submit" value="Add Movie">
		</form>
	</div>
	<div class="song-info">
		<h3>All Movies</h3>	
	</div>
	<div class="container">
			<?= $str ?>
	</div>
	<div style="height: 500px;"></div>
	
	<?php include('../partials/footer.php'); ?>
</body>
</html>