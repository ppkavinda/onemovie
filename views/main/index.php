<?php
session_start();

include_once("../../db/config.php");
// include_once("../../helpers/functions.php");
$sql1 = "SELECT * FROM films ORDER BY 'film_id' DESC;";
$result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

if(mysqli_num_rows($result1)>0){
    $str = '';
    $i = 0;

    while($row=mysqli_fetch_assoc($result1)){
    if ($row['start_date'] < date("Y-m-d")) {
    	$status = "Now Showing";
    } else {
    	$status = "Opening " . date("jS", strtotime($row['start_date'])) . " of " . date("F", strtotime($row['start_date']));
    }
    	$i++;
        $str .= "	
	    	<div class='mov_tab'>
				<a href='single.php?q=$i&id=$row[film_id]'>
					<div class='img-box img$i'>
						<div class='status'>$status</div>
					</div>
				</a>
			<div>
			<div class='movie-text'>
				<h6><a href='single.php?q=$i&id=$row[film_id]'>$row[name]</a></h6>							
			</div>
			<div class='movie-time'>
				<p>$row[time]</p>
				<div class='clearfix'></div>
			</div>	
			<div class='movie-text'>
				<a class='button' href='single.php?q=$i&id=$row[film_id]'>Buy ticket</a>
			</div>
		</div>
	</div>";
    }
}else{
    $str = "<li>No data</li>";
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>One Movies</title>

<link href="../../css/styles.css" rel="stylesheet" type="text/css" />
<link href="../../css/header.css" rel="stylesheet" type="text/css" />
<link href="../../css/general.css" rel="stylesheet" type="text/css" />
<link href="../../css/boxes.css" rel="stylesheet" type="text/css" />
<link href="../../css/navbar.css" rel="stylesheet" type="text/css"> 

</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 	
<body>
	<?php include("../partials/header.php"); ?>
	<?php include('../partials/nav.php'); ?>
	<?php include('../partials/slids.php'); ?>

	<div class="general">
		<h4 class="latest-text">Recent- Movies</h4>
		<div class="container">

			<?php echo $str ?>

			<div class="clearfix"> </div>
		</div>
	</div>

	<?php include('../partials/footer.php'); ?>

</body>
</html>