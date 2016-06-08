<?php
session_start();
require_once '../../config.php';

if($_GET['task'] == 'validasi') {
	require_once '../includes/PasswordHash.php';
	$user	= addslashes($_POST['username']);
	$pass	= addslashes($_POST['password']);
	$result	= mysql_query("SELECT * FROM mst_user WHERE username = '".$user."'");
	$count	= mysql_num_rows($result);
	if($count > 0) {
		$hashObj	= new PasswordHash(10, TRUE);
		$row		= @mysql_fetch_array($result);
		$storedHash	= $row['password'];
		$check		= $hashObj->CheckPassword( $pass, $storedHash );
		$_SESSION['id'] = $row['id'];
		$_SESSION['username'] = $row['username'];
	}
} elseif($_GET['task'] == 'logout') {
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=./'>";
}
?>