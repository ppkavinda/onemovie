<?php
session_start();

include('../../helpers/functions.php');
include_once("../../db/config.php");
regUserOnly();

$sql = "SELECT ticket_id, users.fname, tickets.date, users.lname, quantity, films.name, films.time, films.location FROM tickets 
		INNER JOIN users ON users.user_id = tickets.user_id 
		INNER JOIN films on films.film_id = tickets.film_id
	WHERE tickets.user_id = $_SESSION[user_id]";

$result = mysqli_query($con, $sql) or die(mysqli_error($con));

if(mysqli_num_rows($result)>0){
	$str = '';
	while($row = mysqli_fetch_array($result)){
		$str.= "<div class='ticketbody'>
					<div>
						<span class='label'>Name : </span> $row[name]
					</div>
					<div>
						<span class='label'>Ticket ID : </span> $row[ticket_id]
					</div>
					<div>
						<span class='label'>Time : </span> $row[time]
					</div>
					<div>
						<span class='label'>Quantity : </span> $row[quantity]
					</div>
					<div>
						<span class='label'>Location : </span> $row[location]
					</div>
					<div>
						<span class='label'>Date : </span> $row[date]
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
	<link href="../../css/cart.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php include('../partials/header.php'); ?>
	<?php include('../partials/nav.php'); ?>

	<div class="container">   
        <div class="cartticket">
        	<div class="carthead">
        		Your Tickets
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