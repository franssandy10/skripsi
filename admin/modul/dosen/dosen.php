<?php
require_once 'dosen.html.php';
require_once 'includes/paging.php';
$task = $_GET['task'];
switch($task) {
	case 'del':
		delDosen( $option, $task, $_GET['id'] );
	break;

	case 'save':
		saveDosen( $option, $task, $_POST['id'] );
	break;

	case 'edit':
	case 'new':
		formDosen( $option, $task, $_GET['id'] );
	break;

	default:
		showDosen( $option, $task );
	break;
}

function showDosen( $option, $task ) {
    $p      = new Paging;
    $batas  = 7;
    $posisi = $p->cariPosisi($batas);

	$data	= array();
	$query	= mysql_query("SELECT * FROM mst_dosen ORDER BY nama_dosen DESC LIMIT ".$posisi.",".$batas."");
	while( $row = mysql_fetch_array( $query ) ) {
		$data[] = $row;
	}
	$paging			= mysql_num_rows(mysql_query("SELECT * FROM mst_dosen"));
    $jmlhalaman 	= $p->jumlahHalaman($paging, $batas);
    $linkHalaman	= $p->navHalaman($_GET['halaman'], $jmlhalaman);

	HTML_dosen::showDosen( $option, $task, $data, $posisi, $linkHalaman );
}

function formDosen( $option, $task, $gid ) {
	$id	= intval($gid);
	$query	= mysql_query("SELECT * FROM mst_dosen WHERE id_dosen = '".$id."'");
	$row	= mysql_fetch_array($query);
	$matkul	= mysql_query("SELECT * FROM mst_mata_kuliah ORDER BY mata_kuliah");
	$count	= mysql_num_rows($matkul);
	HTML_dosen::showFormDosen( $option, $task, $id, $row, $matkul, $count );
}

function saveDosen( $option, $task, $gid ) {
	$id	= intval($gid);
	$jab = '';
	for($i=0;$i<count($_POST['id_matkul']);$i++) {
		if($i != (count($_POST['id_matkul']) - 1)){
			$delimiter = ',';
		} else {
			$delimiter = '';
		}
		$jab .= $_POST['id_matkul'][$i].$delimiter;
	}
	if(!$id) {
		mysql_query("INSERT INTO mst_dosen (id_matkul,kode_dosen,nama_dosen) VALUES ('".$jab."','".$_POST['kode']."','".$_POST['nama']."')");
	}else{
		mysql_query("UPDATE mst_dosen SET id_matkul = '".$jab."', kode_dosen = '".$_POST['kode']."', nama_dosen = '".$_POST['nama']."' WHERE id_dosen = '".$id."'");
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?option=dosen'>";
}

function delDosen( $option, $task, $gid ) {
	$id	= intval($gid);
	mysql_query("DELETE FROM mst_dosen WHERE id_dosen = '".$id."'");
	echo "<meta http-equiv='refresh' content='0; url=index.php?option=dosen'>";
}
?>