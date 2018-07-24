<?php
session_start();
include('../../helpers/functions.php');
include_once("../../db/config.php");
adminOnly();

	$sql = "SELECT * FROM users";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	if(mysqli_num_rows($result)>0){
	    $str= "<table>";
	    $str.="<tr><th>Name</th><th>Email</th></tr>";
	    $i = 0;
	    while($row = mysqli_fetch_array($result)){
	    	$i++;
	        $str.= "<tr><td>$row[fname] $row[lname]</td>";
	        $str.= "<td>$row[email]</td>";
	        $str.= "<td><a class='dlt-button' href='delete.php?t=users&id=$row[user_id]'>DELETE</a></td>";
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

	<div class="song-info">
		<h3>All Users</h3>	
	</div>
	<div class="container">
			<?= $str ?>
	</div>
	<div style="height: 500px;"></div>
	<?php include('../partials/footer.php'); ?>
