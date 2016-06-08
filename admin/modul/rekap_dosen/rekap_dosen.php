<?php
require_once 'rekap_dosen.html.php';
$task = $_GET['task'];
switch($task) {
	default:
		showRekapDosen( $option, $task );
	break;
}

function showRekapDosen( $option, $task ) {
	$sql	= mysql_query("SELECT * FROM trn_kusioner");
	$count	= mysql_num_rows($sql);

	$data		= array();
	$query		= mysql_query("SELECT b.nama_dosen, SUM(a.soal_1) AS soal1, SUM(a.soal_2) AS soal2, SUM(a.soal_3) AS soal3, SUM(a.soal_4) AS soal4, SUM(a.soal_5) AS soal5, SUM(a.soal_6) AS soal6, SUM(a.soal_7) AS soal7, COUNT(0) AS ttl FROM trn_kusioner a, mst_dosen b WHERE b.id_dosen=a.id_dosen GROUP BY a.id_dosen");
	$counter	= mysql_num_rows($query);
	while($row = mysql_fetch_array($query)) {
		$data[] = $row;
	}
	HTML_rekapdosen::showRekapDosen( $option, $task, $data, $counter, $count );
}
?>