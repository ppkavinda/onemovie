 

<div>
<ul class="navul" id="navBar">
	<div class="flleft">
  		<li class="navItem"><a href="../main/index.php">Home</a></li>
  		<li class="navItem"><a href="../main/contact.php">Contact</a></li>
  		<li class="navItem"><a href="../main/about.php">About</a></li>
	</div>
	  
	<div class="flright">
		
  		<?php if (isset($_SESSION['user_id'])) {
  			if ($_SESSION['role'] == 1) {
				  echo '<li class="navItem"><a href="../admin" class="fllog">Admin</a></li>';
			  }
			echo '<li class="navItem"><a href="../main/cart.php" class="fllog">My Tickets</a></li>';
	  		echo '<li class="navItem"><a href="../main/logout.php" class="fllog">Logout</a></li>';
		  	} else {
  				// echo '<li class="navItem"><a href="../main/register.php" class="flreg">Register</a></li>';
	  			// echo '<li class="navItem"><a href="../main/login.php" class="fllog">Login</a></li>';
	  			echo '<li class="navItem"><a href="../main/regLog.php" class="fllog">Login / Register</a></li>';
	  		}
  		?>
	</div>
</ul>
</div>
<div class="clearfix"></div>
