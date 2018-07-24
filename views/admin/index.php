<?php
session_start();

include('../../helpers/functions.php');
adminOnly();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>One Movies</title>
	<link href="../../css/styles.css" rel="stylesheet" type="text/css" />
	<link href="../../css/header.css" rel="stylesheet" type="text/css" />
	<link href="../../css/navbar.css" rel="stylesheet" type="text/css"> 
	<link href="../../css/admin.css" rel="stylesheet" type="text/css"> 
</head>
	
<body>
	<?php include("../partials/header.php"); ?>
	<?php include('../partials/nav.php'); ?>

	<div class="container">
		<div class="align">
			<a href="../admin/movies.php" class="button"><h4>View Movies</h4></a>
			<a href="../admin/users.php" class="button"><h4>View Users</h4></a>
			<a href="../admin/tickets.php" class="button"><h4>View Tickets</h4></a>
			<a href="../admin/transactions.php" class="button"><h4>View Transactions</h4></a>
			<a href="../admin/mes.php" class="button"><h4>View Messages</h4></a>
		</div>
	</div>
	<div style="height: 200px;"></div>
	<?php include('../partials/footer.php'); ?>
</body>
</html>
