<?php
session_start();

include('../../helpers/functions.php');
regUserOnly();

if(isset($_SESSION["user_id"]) || isset($_SESSION["role"])){
    unset($_SESSION["user_id"]);
    unset($_SESSION["role"]);

    header("Location: index.php");
}
