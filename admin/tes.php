<?php
mysql_connect("localhost","root","");
mysql_select_db("db_frans");

$query	= mysql_query("SELECT b.nama_dosen, SUM(a.soal_1) AS soal1, SUM(a.soal_2) AS soal2, SUM(a.soal_3) AS soal3, SUM(a.soal_4) AS soal4, SUM(a.soal_5) AS soal5, SUM(a.soal_6) AS soal6, SUM(a.soal_7) AS soal7, SUM(a.soal_8) AS soal8, SUM(a.soal_9) AS soal9, SUM(a.soal_10) AS soal10, COUNT(0) AS ttl FROM trn_kusioner a, mst_dosen b WHERE b.id_dosen=a.id_dosen GROUP BY a.id_dosen");
while($row = mysql_fetch_array($query)) {
	$avg1 = $row['soal1'] / $row['ttl'];
	$avg2 = $row['soal2'] / $row['ttl'];
	$avg3 = $row['soal3'] / $row['ttl'];
	$avg4 = $row['soal4'] / $row['ttl'];
	$avg5 = $row['soal5'] / $row['ttl'];
	$avg6 = $row['soal6'] / $row['ttl'];
	$avg7 = $row['soal7'] / $row['ttl'];
	$avg8 = $row['soal8'] / $row['ttl'];
	$avg9 = $row['soal9'] / $row['ttl'];
	$avg10 = $row['soal10'] / $row['ttl'];

	$nDosen	= ($avg1 + $avg2 + $avg3 + $avg4 + $avg5 + $avg6 + $avg7) / 7;

	echo '<br />DOSEN = ' .$row['id_dosen'].'<br />';
	echo 'SOAL 1 = ' .$row['soal1']. ' = '. number_format($avg1,2).'<br />';
	echo 'SOAL 2 = ' .$row['soal2']. ' = '. number_format($avg2,2).'<br />';
	echo 'SOAL 3 = ' .$row['soal3']. ' = '. number_format($avg3,2).'<br />';
	echo 'SOAL 4 = ' .$row['soal4']. ' = '. number_format($avg4,2).'<br />';
	echo 'SOAL 5 = ' .$row['soal5']. ' = '. number_format($avg5,2).'<br />';
	echo 'SOAL 6 = ' .$row['soal6']. ' = '. number_format($avg6,2).'<br />';
	echo 'SOAL 7 = ' .$row['soal7']. ' = '. number_format($avg7,2).'<br />';
	echo 'SOAL 8 = ' .$row['soal8']. ' = '. number_format($avg8,2).'<br />';
	echo 'SOAL 9 = ' .$row['soal9']. ' = '. number_format($avg9,2).'<br />';
	echo 'SOAL 10 = ' .$row['soal10']. ' = '. number_format($avg10,2).'<br />';
	echo '<br />'.number_format($nDosen,2).'<br />';
}
?>