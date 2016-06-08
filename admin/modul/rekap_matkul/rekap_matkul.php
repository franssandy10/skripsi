<?php
require_once 'rekap_matkul.html.php';
$task = $_GET['task'];
switch($task) {
	default:
		showRekapMatkul( $option, $task );
	break;
}

function showRekapMatkul( $option, $task ) {
	$sql	= mysql_query("SELECT * FROM trn_kusioner");
	$count	= mysql_num_rows($sql);

	$data		= array();
	$query		= mysql_query("SELECT b.mata_kuliah, SUM(a.soal_8) AS soal8, SUM(a.soal_9) AS soal9, SUM(a.soal_10) AS soal10, SUM(a.soal_11) AS soal11, COUNT(0) AS ttl FROM trn_kusioner a, mst_mata_kuliah b WHERE b.id_matkul=a.id_matkul GROUP BY a.id_matkul");
	$counter	= mysql_num_rows($query);
	while($row = mysql_fetch_array($query)) {
		$data[] = $row;
	}
	HTML_rekapmatkul::showRekapMatkul( $option, $task, $data, $counter, $count );
}
?>