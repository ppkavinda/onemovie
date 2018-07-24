<?php
session_start();

if (isset($_POST['search'])) {
	include_once("../../db/config.php");

	$sql = "SELECT * FROM films WHERE name LIKE '%$_POST[search]%'";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	if(mysqli_num_rows($result)>0){
	    $str= "<table>";
	    $str.="<tr><th>Name</th><th>Price</th><th>Time</th></tr>";
	    $i = 0;
	    while($row = mysqli_fetch_array($result)){
	    	$i++;
	        $str.= "<tr><td><a href='single.php?q=$i'>$row[name]</a></td>";
	        $str.= "<td>$row[price] LKR</td>";
	        $str.= "<td>$row[time]</td>";
	    }
	    $str.= "</table>";
	}else{
	    $str = "<p style='font-size: 40px;'>No records matched.</p>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>One Movies</title>
	<link href="../../css/styles.css" rel="stylesheet" type="text/css" />
	<link href="../../css/header.css" rel="stylesheet" type="text/css" />
	<link href="../../css/search.css" rel="stylesheet" type="text/css" />
	<link href="../../css/navbar.css" rel="stylesheet" type="text/css" />
</head>
	
<body>

	<?php include("../partials/header.php"); ?>
	<?php include('../partials/nav.php'); ?>

	<div class="song-info">
		<h3>Search results for : <span><?= $_POST['search']; ?></span></h3>	
	</div>
	<div class="container">
		<?= $str ?>
	</div>
	<div style="height: 500px;"></div>

	<?php include('../partials/footer.php'); ?>
</body>
</html>