<?php
session_start();

include_once("../../helpers/functions.php");
guestOnly();

include_once("../../db/config.php");

if(isset($_POST["submit-reg"])){
    $fname = clean_input($_POST["fname"]);
    $lname = clean_input($_POST["lname"]);
    $email = clean_input($_POST["email"]);
    $password = clean_input($_POST["password"]);
    $passwordc = clean_input($_POST["passwordc"]);

    if ($password == $passwordc) {
        $sql1 = "INSERT INTO users(fname, lname, email, password) VALUES ('$fname', '$lname', '$email',  '" . md5($password) ."');";
        $result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));

        if($result1){
            header("Location: regLog.php");
        }
    }
}
if(isset($_POST["submit-log"])){
    $email = clean_input($_POST["email"]);
    $password = clean_input($_POST["password"]);

    $sql = "SELECT user_id, role FROM users WHERE email = '$email' AND password = '" . md5($password) . "';";
    $result = mysqli_query($con, $sql) or  die(mysqli_error($con));
    
    if(mysqli_num_rows($result)>0){

        $row = mysqli_fetch_array($result);
        echo $row["user_id"];
        echo $row["role"];

        //if details are correct logging in the user
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["role"] = $row["role"];

        if($_SESSION["role"] == 1){
            header("Location: ../admin/");
        }else{
            header("Location: index.php");
        }
    }else{
        echo "You have Failed! #This city.";
    }
}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
<title>One Movies</title>
    <link href="../../css/styles.css" rel="stylesheet" type="text/css" />
    <link href="../../css/header.css" rel="stylesheet" type="text/css" />
    <link href="../../css/navbar.css" rel="stylesheet" type="text/css"> 
    <link href="../../css/reglogin.css" rel="stylesheet" type="text/css">
    <link href="../../css/register.css" rel="stylesheet" type="text/css">

    <script src="../../js/scripts.js"></script>
</head>
<body>
    <?php include('../partials/header.php'); ?>
    <?php include('../partials/nav.php'); ?>

    <div class="container">
        <div class="forms">
            <button onclick="displayLogForm()" class="toggle-button">Login</button>
            <button onclick="displayRegForm()" class="toggle-button">Register</button>
        </div>
        <div id="reg-form" style="display: none;" class="form-container">
            <div class="log-title">
                Register Here
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="input">
                    <input type="email" name="email" placeholder="Enter Email" required>
                </div>
                <div class="input">
                    <input type="text" name="fname" placeholder="Enter First Name" required>
                </div>
                 <div class="input">
                    <input type="text" name="lname" placeholder="Enter Last Name" required>
                </div>
                 <div class="input">
                    <input type="password" name="password" placeholder="Enter a Password" required>
                </div>
                 <div class="input">
                    <input type="password" name="passwordc" placeholder="Re-Enter the Password" required>
                </div>
                <div class="input">
                    <input type="submit" name="submit-reg" Value="Register">    
                </div>
            </form>
        </div> 
        <div id="login-form" class="form-container">
            <div class="log-title">
                Login Here
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="input">
                    <input type="email" name="email" placeholder="Enter Email" required>
                </div>
                <div class="input">
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>
                <div class="input">
                    <input class="btnLogin" type="submit" name="submit-log" Value="Login">    
                </div>
            </form>
        </div>   
    </div>
</body>
</html>