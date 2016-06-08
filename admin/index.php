<?php
session_start();
if(!$_SESSION['username']) {
	require_once('login.php');
} else {
	?>
	<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administrator</title>
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/script.js"></script>  
	</head>
	<body>
	<!-- TOP BAR -->
	<div id="top-bar">
		<div class="page-full-width cf">
			<ul id="nav" class="fl">
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><?php echo $_SESSION['username'];?></strong></a>
				<ul>
					<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?option=user">User Management</a></li>
					
				</ul> 
				</li>
				<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?option=user&task=logout" class="round button dark menu-logoff image-left">Log out</a></li>
			</ul> <!-- end nav -->
		</div> <!-- end full-width -->	
	</div> <!-- end top-bar -->

	<!-- HEADER -->
	<div id="header-with-tabs">
		<div class="page-full-width cf">
			<a href=" " id="company-branding" class="fr"><img src="" alt="" /></a>
		</div> <!-- end full-width -->	
	</div> <!-- end header -->

	<!-- MAIN CONTENT -->
	<div id="content">
		<div class="page-full-width cf">
			<div class="side-menu fl">
				<h3>Main Menu</h3>
				<ul>
					<li><a href="./">Home</a></li>
					<li><a href="index.php?option=mata_kuliah">Master Mata Kuliah</a></li>
					<li><a href="index.php?option=dosen">Master Dosen</a></li>
					<li><a href="index.php?option=rekap_dosen">Penilaian Dosen</a></li>
					<li><a href="index.php?option=rekap_matkul">Penilaian Matakuliah</a></li>
				</ul>
			</div> <!-- end side-menu -->
			<div class="side-content fr">
				<div class="content-module">
					<?php require_once('includes/content.php'); ?>
				</div>
			</div> <!-- end side-content -->
		</div> <!-- end full-width -->
	</div> <!-- end content -->
	</body>
<div id="copyright">
<label><b>Copyright &copy 2014 by ISTB</br>
Allright Reserved</br>
Power By FR Team</b></label>
</div>
	</html>
	<?php
}
?>