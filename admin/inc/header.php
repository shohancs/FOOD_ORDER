<?php 
	ob_start();
	include "inc/db.php" 
?>

<!doctype html>
<html lang="en" class="semi-dark">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include "inc/css.php" ?>

	<title>Dashboard | Home</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">

		<!-- START: LEFT MENU -->
		<?php include "inc/leftmenu.php" ?>
		<!-- END: LEFT MENU -->

		<!-- START: TOP BAR -->
		<?php include "inc/topbar.php" ?>
		<!-- END: TOP BAR -->