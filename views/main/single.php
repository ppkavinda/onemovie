<?php 
session_start(); 

include_once("../../db/config.php");

if (isset($_REQUEST['id'])) {
	$id =  $_REQUEST['id'];
} else {
	header("Location: ../main/");
}

$sql1 = "SELECT * FROM films WHERE film_id = $id;";
$result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));


if(mysqli_num_rows($result1)>0){
    $row=mysqli_fetch_assoc($result1);
    if ($row['start_date'] < date("Y-m-d")) {
    	$status = "Closing " . date("jS", strtotime($row['end_date'])) . " of " . date("F", strtotime($row['end_date']));
    } else {
    	$status = "Opening " . date("jS", strtotime($row['start_date'])) . " of " . date("F", strtotime($row['start_date']));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>One Movies</title>
	<link href="../../css/styles.css" rel="stylesheet" type="text/css" />
	<link href="../../css/header.css" rel="stylesheet" type="text/css" />
	<link href="../../css/navbar.css" rel="stylesheet" type="text/css" />
	<link href="../../css/single.css" rel="stylesheet" type="text/css" />
</head>
	
<body>
	<?php include("../partials/header.php"); ?>
	<?php include('../partials/nav.php'); ?>
	
	<div class="song-info">
		<h3>Buy a Ticket for "<?= $row['name']; ?>"</h3>	
	</div>
	<div class="container">
		<div class="single-container single-left">
			<div class="song">
				<div id="video"> 
					<img src="../../img/<?= $_REQUEST['q'] ?>c.jpg" >
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="single-right">
			<div class="details">
				<div class="status"><?= $status; ?></div>
				<h3>Time: <span><?= $row['time']; ?></span></h3>
				<h3>Location: <span><?= $row['location']; ?></span></h3>
				<h4><?= $row['price']; ?>.00 LKR</h4> 
				<form action="buy.php" method="post">
					Quantity: <input type="number" value="1" name="quantity"><br>
					Date: <input type="date" name="date" min="<?= $row['start_date']; ?>" max="<?= $row['end_date']; ?>" required>
					<input type="hidden" name="location" value="<?= $row['location']; ?>">
					<input type="hidden" name="id" value="<?= $row['film_id']; ?>">	
					<input type="hidden" name="price" value="<?= $row['price']; ?>">	
					<input type="hidden" name="time" value="<?= $row['time']; ?>">	
					<input type="hidden" name="name" value="<?= $row['name']; ?>">	
					<button name="submit" class="button buy">Buy now</button>
				</form>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="clearfix"> </div>
	<div style="height: 500px;"></div>

	<?php include('../partials/footer.php'); ?>

</body>
</html>
