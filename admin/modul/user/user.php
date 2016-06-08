<?php
require_once 'user.html.php';
require_once 'includes/paging.php';
require_once 'includes/PasswordHash.php';
$task = $_GET['task'];
switch($task) {
	default:
		showUser( $option, $task );
	break;

	case 'error':
	case 'edit':
	case 'new':
		formUser( $option, $task );
	break;

	case 'save':
		saveUser( $option, $task );
	break;

	case 'del':
		delUser( $option, $task, $_GET['id'] );
	break;

	case 'logout':
		logoutUser();
	break;
}

function showUser( $option, $task ) {
    $p      = new Paging;
    $batas  = 7;
    $posisi = $p->cariPosisi($batas);

	$data	= array();
	$query	= mysql_query("SELECT * FROM mst_user ORDER BY nama DESC LIMIT ".$posisi.",".$batas."");
	while( $row = mysql_fetch_array( $query ) ) {
		$data[] = $row;
	}
	$paging			= mysql_num_rows(mysql_query("SELECT * FROM mst_user"));
    $jmlhalaman 	= $p->jumlahHalaman($paging, $batas);
    $linkHalaman	= $p->navHalaman($_GET['halaman'], $jmlhalaman);

	HTML_user::showListUser( $option, $task, $data, $posisi, $linkHalaman );
}

function formUser( $option, $task ) {
	$id	= intval($_GET['id']);
	$query	= mysql_query("SELECT * FROM mst_user WHERE id = '".$id."'");
	$row	= mysql_fetch_array($query);
	HTML_user::showFormUser( $option, $task, $id, $row );
}
//Untuk membuat Encrypt password

function saveUser( $option, $task ) {

	$hashObj	= new PasswordHash(10, TRUE);
	$pass		= $hashObj->HashPassword( $_POST['password'] );

	if (!$_POST['id']) {
		$cek	= @mysql_query("SELECT username FROM mst_user WHERE username = '".$_POST['username']."'");
		$cek	= @mysql_num_rows($cek);

		if($cek==0) {
			$sql	= "INSERT INTO mst_user(nama,username,password,dt_created) VALUES ('".$_POST['nama']."','".$_POST['username']."','".$pass."','".date('Y-m-d')."')";
			$result = @mysql_query($sql);
			header('Location: http://localhost/skripsi/admin/index.php?option=user');
			echo "<meta http-equiv='refresh' content='0; url=index.php?option=user'>";
		}
	    else {
			echo "<meta http-equiv='refresh' content='0; url=index.php?option=user&task=new&warning=error'>";
		}
    }else {

		if(!$_POST['password']) {
			$sql	= "UPDATE mst_user SET nama = '".$_POST['nama']."' WHERE id = '".$_POST['id']."'";
		} else {
			$sql	= "UPDATE mst_user SET nama = '".$_POST['nama']."', password = '".$pass."' WHERE id = '".$_POST['id']."'";
		}
	    }
		$result = @mysql_query($sql);
		echo "<meta http-equiv='refresh' content='0; url=index.php?option=user'>";
}
function delUser( $option, $task, $gid ) {
	$id	= intval($gid);
	mysql_query("DELETE FROM mst_user WHERE id = '".$id."'");
	echo "<meta http-equiv='refresh' content='0; url=index.php?option=user'>";
}

function logoutUser() {
	session_start();
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=./'>";
}
?>