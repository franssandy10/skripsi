<?php
require_once 'mata_kuliah.html.php';
require_once 'includes/paging.php';
$task = $_GET['task'];
switch($task) {
	default:
		showMataKuliah( $option, $task );
	break;

	case 'edit':
	case 'new':
		formMatkul( $option, $task, $_GET['id'] );
	break;

	case 'save':
		saveMatkul( $option, $task, $_POST['id'] );
	break;

	case 'del':
		delMatkul( $option, $task, $_GET['id'] );
	break;
}

function showMataKuliah( $option, $task ) {
    $p      = new Paging;
    $batas  = 7;
    $posisi = $p->cariPosisi($batas);

	$data	= array();
	$query	= mysql_query("SELECT * FROM mst_mata_kuliah ORDER BY mata_kuliah ASC LIMIT ".$posisi.",".$batas."");
	while( $row = mysql_fetch_array( $query ) ) {
		$data[] = $row;
	}
	$paging			= mysql_num_rows(mysql_query("SELECT * FROM mst_dosen"));
    $jmlhalaman 	= $p->jumlahHalaman($paging, $batas);
    $linkHalaman	= $p->navHalaman($_GET['halaman'], $jmlhalaman);

	HTML_matakuliah::showshowMataKuliah( $option, $task, $data, $posisi, $linkHalaman );
}

function formMatkul( $option, $task, $gid ) {
	$id	= intval($gid);
	$query	= mysql_query("SELECT * FROM mst_mata_kuliah WHERE id_matkul = '".$id."'");
	$row	= mysql_fetch_array($query);
	HTML_matakuliah::showFormMatKul( $option, $task, $id, $row );
}

function saveMatkul( $option, $task, $gid ) {
	$id	= intval($gid);
	if(!$id) {
		mysql_query("INSERT INTO mst_mata_kuliah (kode_matkul,mata_kuliah) VALUES ('".$_POST['kode']."','".$_POST['nama']."')");
	}else{
		mysql_query("UPDATE mst_mata_kuliah SET kode_matkul = '".$_POST['kode']."', mata_kuliah = '".$_POST['nama']."' WHERE id_matkul = '".$id."'");
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?option=mata_kuliah'>";
}

function delMatkul( $option, $task, $gid ) {
	$id	= intval($gid);
	mysql_query("DELETE FROM mst_mata_kuliah WHERE id_matkul = '".$id."'");
	echo "<meta http-equiv='refresh' content='0; url=index.php?option=mata_kuliah'>";
}
?>