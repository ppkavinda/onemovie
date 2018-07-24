<?php
session_start();
include('../../helpers/functions.php');
include_once("../../db/config.php");

    $str = "If you wish to contact us via email please fill in the following form and we will get in touch with you at the earliest.";
if (isset($_POST['submit'])) {
    $email = clean_input($_POST['email']);
    $name = clean_input($_POST['name']);
    $tp = clean_input($_POST['tp']);
    $content = clean_input($_POST['content']);

    $sql = "INSERT INTO contact (email, name, mobile, massege) VALUES ('$email', '$name', '$tp', '$content')";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    
    if($result){
        $str =  "Youe Message Successfully Submited. We'll get back to you soon..";
    }else{
        $str =  "Youe message didn't reach to us.. Try again..";
    }
    
}
    $email = "";
	$name = "";
	$tp = "";
	$content = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>One Movies</title>
    <link href="../../css/styles.css" rel="stylesheet" type="text/css" />
    <link href="../../css/header.css" rel="stylesheet" type="text/css" />
    <link href="../../css/navbar.css" rel="stylesheet" type="text/css" />
    <link href="../../css/reglogin.css" rel="stylesheet" type="text/css">
</head>

<?php include('../partials/header.php'); ?>
<?php include('../partials/nav.php'); ?>

<div class="container">
    <div style="margin-top: 40px;">
        <h3 style="text-align: center;"><?= $str; ?></h3>
    </div>
    <div class="container">
        <div class="form-container" style="margin-bottom: 60px;">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="input">
                    <input type="email" name="email" id="" placeholder="Enter Email" required>
                </div>
                <div class="input">
                    <input type="text" name="name" id="" placeholder="Enter Name" required>
                </div>
                 <div class="input">
                    <input type="text" name="tp" id="" placeholder="Enter Telephone Number" required>
                </div>
                 <div class="input">
                    <textarea rows="8" name="content" placeholder="Enter you message here..."></textarea>
                </div>
                <div class="input">
                    <input type="submit" name="submit" id="" Value="Submit">    
                </div>
            </form>
        </div>  
    </div>
</div>
    <?php include('../partials/footer.php'); ?>