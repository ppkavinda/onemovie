<?php
define('DB_HOST', "localhost");
define('DB_NAME', "tickets");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "");

$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("cannot connect to database!");
