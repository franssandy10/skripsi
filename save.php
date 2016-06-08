<?php
session_start();
require_once('config.php');
$task	= $_GET['task'];

switch($task) {
	case 'save':	
		saveKusioner();
	break;

	case 'matkul':
		getMatkul($_GET['id']);
	break;

	case 'cekSession':
		cekSession($_GET['id']);
	break;
}

function saveKusioner() {
	$session =  session_id();
	$save	= @mysql_query("INSERT INTO trn_kusioner(session_id,id_dosen,id_matkul,soal_1,soal_2,soal_3,soal_4,soal_5,soal_6,soal_7,soal_8,soal_9,soal_10,soal_11,dt_created) VALUES ('".$session."','".$_POST['dosen']."','".$_POST['matkul']."','".$_POST['soal1']."','".$_POST['soal2']."','".$_POST['soal3']."','".$_POST['soal4']."','".$_POST['soal5']."','".$_POST['soal6']."','".$_POST['soal7']."','".$_POST['soal8']."','".$_POST['soal9']."','".$_POST['soal10']."','".$_POST['soal11']."','".date('Y-m-d H:i:s')."')");
	if ($save > 0) {
		echo '['.json_encode(array('error'=>'false')).']';
	} else {
		echo '['.json_encode(array('error'=>'true')).']';
	}
}

function getMatkul($gid) {
	$id	= intval($gid);
	$query	= mysql_query("SELECT id_dosen, id_matkul, nama_dosen FROM mst_dosen WHERE id_matkul <>''");
	while($row = @mysql_fetch_array($query)) {
		$split	= explode(',', $row['id_matkul']);
		for($i=0; $i<count($split); $i++) {
			if($id==$split[$i]) {
				$json[]	= array(
					"id_dosen"		=> $row['id_dosen'],
					"nama_dosen"	=> $row['nama_dosen']
				);
			}
		}
	}
	echo json_encode($json);
}

function cekSession($id) {
	$session =  session_id();
	$cekSession	= mysql_query("SELECT session_id FROM trn_kusioner WHERE session_id = '".$session."'");
	$count		= mysql_num_rows($cekSession);
	if($count > 0) {
		echo '['.json_encode(array('error'=>'true')).']';
	} else {
		echo '['.json_encode(array('error'=>'false')).']';
	}
}
?>