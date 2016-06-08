<?php
require_once('../config.php');
if(empty($_GET['option']) and empty($_GET['cek'])) {
	include 'modul/dashboard/dashboard.php';
} elseif($_GET['option']) {
	include "modul/".$_GET['option']."/".$_GET['option'].".php";
}
?>