<?php
function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function adminOnly () {
	if ( $_SESSION['role'] != 1) {
		header("location:javascript://history.go(-1)");
	}
}

function regUserOnly () {
	if (!isset($_SESSION['user_id'])) {
		header("Location: ../main/regLogin.php");
	}
}

function guestOnly () {
	if (isset($_SESSION['user_id'])) {
		header("location:javascript://history.go(-1)");
	}
}