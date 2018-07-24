<?php
session_start();
include('../../helpers/functions.php');
include_once("../../db/config.php");
adminOnly();

if ($_REQUEST['t'] == 'films') {
	$sql = "DELETE FROM `films` WHERE `films`.`film_id` = $_REQUEST[id];";
	$result = mysqli_query($con, $sql) or die(mysql_error($con));

	header('Location: ../admin/movies.php');
}

if ($_REQUEST['t'] == 'users') {
	$sql = "DELETE FROM `users` WHERE `users`.`user_id` = $_REQUEST[id];";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	header('Location: ../admin/users.php');
}
if ($_REQUEST['t'] == 'tickets') {
	$sql = "DELETE FROM `tickets` WHERE `tickets`.`ticket_id` = $_REQUEST[id];";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));

	header('Location: ../admin/tickets.php');
}
