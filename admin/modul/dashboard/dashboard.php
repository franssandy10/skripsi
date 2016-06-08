<?php
require_once 'dashboard.html.php';
$task = $_GET['task'];
switch($task) {
	default:
		showFontPage( $option, $task );
	break;
}

function showFontPage( $option, $task ) {
	HTML_dashboard::showDashboard( $option, $task );
}

?>