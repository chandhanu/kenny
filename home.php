<?php
	/*** Important do not change ***/
	session_start();
	if(!isset($_SESSION['simple_login'])){
		header("Location: index.php");
		exit();
	}
	/*** Important END ***/
?>

<!-------- Write you stuff down here -------->
<h1 align="center">Welcome, <?php echo $_SESSION['simple_login']; ?></h1>
<p align="center"><a href="logout.php">Logout</a></p>
