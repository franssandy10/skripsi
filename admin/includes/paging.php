<?php
class Paging{
	function cariPosisi($batas) {
		if(empty($_GET['halaman'])) {
			$posisi=0;
			$_GET['halaman']=1;
		} else {
			$posisi = ($_GET['halaman']-1) * $batas;
		}
		return $posisi;
	}

	function jumlahHalaman($jmldata, $batas) {
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}

	function navHalaman($halaman_aktif, $jmlhalaman) {
		$link_halaman = "<ul class='paging'>";

		if($halaman_aktif > 1) {
			$prev = $halaman_aktif-1;
			$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?option=$_GET[option]&halaman=1>First</a></li> "; 
			$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?option=$_GET[option]&halaman=$prev>Prev</a></li>"; 

		} else {
			$link_halaman .= "<li class='na'>First</li> ";
			$link_halaman .= "<li class='na'>Prev</li>";
		}

		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
				continue;
				$angka .= "<li><a href=$_SERVER[PHP_SELF]?option=$_GET[option]&halaman=$i>$i</a></li> ";
		}
		$angka .= "<li class='na'>$halaman_aktif</li> ";

		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++) {
			if($i > $jmlhalaman)
				break;
				$angka .= "<li><a href=$_SERVER[PHP_SELF]?option=$_GET[option]&halaman=$i>$i</a></li> ";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='na'>...</li> <li><a href=$_SERVER[PHP_SELF]?option=$_GET[option]&halaman=$jmlhalaman>$jmlhalaman</a></li> " : " ");

		$link_halaman .= "$angka";

		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?option=$_GET[option]&halaman=$next>Next</a></li> "; 
			$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?option=$_GET[option]&halaman=$jmlhalaman>Last</a><li>";
		} else {
			$link_halaman .= "<li class='na'>Next</li> ";
			$link_halaman .= "<li class='na'>Last</li>";
		}
		$link_halaman .= "</ul>";
		return $link_halaman;
	}
}
?>
