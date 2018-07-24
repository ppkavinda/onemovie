<?php
session_start();
include('../../helpers/functions.php');
include_once("../../db/config.php");

adminOnly();

if (isset($_POST['submit'])) {
	$name = clean_input($_POST['name']);
	$price = clean_input($_POST['price']);
	$time = clean_input($_POST['time']);
	$start = clean_input($_POST['start_date']);
	$end = clean_input($_POST['end_date']);
	$hall = clean_input($_POST['hall']);

	$sql = "INSERT INTO films (name, price, time, start_date, end_date, location) VALUES ('$name', '$price', '$time', '$start', '$end', '$hall')";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
}
	$sql = "SELECT * FROM films ORDER BY film_id DESC";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	if(mysqli_num_rows($result)>0){
	    $str= "<table>";
	    $str.="<tr><th>Name</th><th>Price</th><th>Time</th><th>Location</th><th>Start Date</th><th>End Date</th></tr>";
	    $i = 0;
	    while($row = mysqli_fetch_array($result)){
	    	$i++;
	        $str.= "<tr><td>$row[name]</td>";
	        $str.= "<td>$row[price] LKR</td>";
	        $str.= "<td>$row[time]</td>";
	        $str.= "<td>$row[location]</td>";
	        $str.= "<td>$row[start_date]</td>";
	        $str.= "<td>$row[end_date]</td>";
	        $str.= "<td><a class='dlt-button' href='delete.php?t=films&id=$row[film_id]'>DELETE</a></td>";
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
			<div class="form-input">
				<label>Movie Name: <input type="text" name="name" placeholder="Movie name" required></label>
			</div>
			<div class="form-input">
				<label>Price: <input type="number" name="price" placeholder="Price" required=""></label>
			</div>
			<div class="form-input">
				<label>Time: <input type="time"  name="time" placeholder="Time" required></label>
			</div>
			<div class="form-input">
				<label>Start Date:<input type="date"  name="start_date" placeholder="Start Date" required></label>
			</div>
			<div class="form-input">
				<label>End Date: <input type="date"  name="end_date" placeholder="End Date" required></label>
			</div>
			<div class="form-input">
				<label>Location: <input type="text"  name="hall" placeholder="Location" required></label>
			</div>
			<div class="form-input">
				<label>
					<input type="submit" name="submit" value="Add Movie">
				</label>
			</div>
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
