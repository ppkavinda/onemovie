<?php
session_start();

include('../../helpers/functions.php');
include_once("../../db/config.php");
adminOnly ();

$sql = "SELECT * FROM contact";

$result = mysqli_query($con, $sql) or die(mysqli_error($con));

if(mysqli_num_rows($result)>0){
	$str = '';
	while($row = mysqli_fetch_array($result)){
		$str.= "<div class='ticketbody'>
					<div>
						<span class='label'>Email : </span> $row[email]
					</div>
					<div>
						<span class='label'>Name : </span> $row[name]
					</div>
					<div>
						<span class='label'>TP No : </span> $row[mobile]
					</div>
					<div>
						<span class='label'>Message : </span> $row[massege]
					</div>
				</div>";
	}
}else{
	$str = "<p style='font-size: 30px;'>You haven't bough any tickets.</p>";
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
	<link href="../../css/mes.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php include('../partials/header.php'); ?>
	<?php include('../partials/nav.php'); ?>

	<div class="container">   
        <div class="cartticket">
        	<div class="carthead">
        		Messages
        	</div>
            <div class="cartbody">
                <?= $str; ?>
    	    </div>	
        </div>
	</div>
	<div style="height: 500px;"></div>
	
	<?php include('../partials/footer.php'); ?>

</body>
</html>