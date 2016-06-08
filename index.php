<?php
require_once('config.php');
/*Query Ke DB untuk men-generate matakuliah saat form di buka*/
$sql	= @mysql_query("SELECT * FROM mst_mata_kuliah ORDER BY mata_kuliah ASC");
?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Student Feedback Online</title>
<link rel="stylesheet" type="text/css" href="css/ui.core.css">
<link rel="stylesheet" type="text/css" href="css/ui.theme.css">
<link rel="stylesheet" type="text/css" href="css/ui.progressbar.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/ui.progressbar.js"></script>
<script type="text/javascript" src="js/js.js"></script>
</head>
<body>
<div class="form-container">
	<div class="logo1" style ="text-align:left;"><img src="images/stufeedon.jpg"></div>
	<p>Progress:</p>
	<div id="progress"></div><label id="amount">0%</label>
	<form method="post">
	<div class="required" hidden="hidden">
		<table width="100%">
		<tr>
			<td colspan="3"><i style="color:red;">* Required fields</i></td>
		</tr>
		<tr>
			
			<td width="33%"><table width="100%">
			<tr>
				<td><b style="color:white;">Mata Kuliah</b></td>
				<td><select name="matkul" id="matkul">
					<option value="0">--- Mata Kuliah ---</option>
					<?php while($row = @mysql_fetch_array($sql)) { ?>
						<option value="<?php echo $row['id_matkul'];?>"><?php echo $row['mata_kuliah']; ?></option>
					<?php } ?>
				</select> <span>*</span></td>
			</tr>
			</table></td>
			<td width="33%"><table width="100%">
			<tr>
				<td><b style="color:white;">Nama Dosen</b></td>
				<td><select name="dosen" id="dosen">
					<option value="0">--- Nama Dosen ---</option>
				</select> <span>*</span></td>
			</tr>
			</table></td>
		</tr>
		</table>
	</div>

	<div id="panel1" class="form-panel" hidden="hidden">
		<div class="dd">
			<table width="100%">
			<tr>
				<td colspan="5" style="height:30px;" valign="top">Pilihlah Salah Satu Penilaian Anda Terhadap Dosen Tersebut !</td>
			</tr>
			<tr><td width="1%">1.</td><td colspan="4">Dosen datang ke kelas tepat waktu :</td></tr>
			<tr>
				<td></td>
				<td width="20%"><input type="radio" name="soal1" id="soal1" value="1">Tidak Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td width="20%"><input type="radio" name="soal1" id="soal1" value="2">Cukup Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td width="20%"><input type="radio" name="soal1" id="soal1" value="3">Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td>			<input type="radio" name="soal1" id="soal1" value="4">Sangat Memuaskan</td>
			</tr>
			
			<tr><td height="20px"></td></tr>
			<tr><td>2.</td><td colspan="4">Dosen membantu dalam proses belajar mengajar di dalam kelas :</td></tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal2" id="soal2" value="1">Tidak Memuaskan</td>
			</tr>
			<tr>	
				<td></td>
				<td><input type="radio" name="soal2" id="soal2" value="2">Cukup Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal2" id="soal2" value="3">Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal2" id="soal2" value="4">Sangat Memuaskan</td>
			</tr>
			
			<tr><td height="20px"></td></tr>
			<tr><td>3.</td><td colspan="4">Dosen dapat dengan mudah dihubungi melalui email, tatap muka, dll :</td></tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal3" id="soal3" value="1">Tidak Memuaskan</td>
			</tr>
			<tr>
				<td></td>	
				<td><input type="radio" name="soal3" id="soal3" value="2">Cukup Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal3" id="soal3" value="3">Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal3" id="soal3" value="4">Sangat Memuaskan</td>
			</tr>
			
			<tr><td height="20px"></td></tr>
			<tr><td>4.</td><td colspan="4">Dosen menjelaskan materi perkuliahan terhadap mahasiswa dengan baik :</td></tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal4" id="soal4" value="1">Tidak Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal4" id="soal4" value="2">Cukup Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal4" id="soal4" value="3">Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal4" id="soal4" value="4">Sangat Memuaskan</td>
			</tr>
			
			<tr><td height="20px"></td></tr>
			<tr><td>5.</td><td colspan="4">Dosen menjelaskan dengan jelas tentang apa yang harus dikerjakan dalam tugas, project,dll. :</td></tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal5" id="soal5" value="1">Tidak Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal5" id="soal5" value="2">Cukup Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal5" id="soal5" value="3">Memuaskan</td>
			</tr>
			<tr>
				<td></td>	
				<td><input type="radio" name="soal5" id="soal5" value="4">Sangat Memuaskan</td>
			</tr>
			</table>
		</div>
	</div>

	<div id="panel2" class="form-panel ui-helper-hidden">
		<div class="dd">
			<table width="100%">
			
			<tr><td width="1%">6.</td><td colspan="4">Dosen memberikan nilai dengan objektif :</td></tr>
			<tr>
				<td></td>
				<td width="20%"><input type="radio" name="soal6" id="soal6" value="1">Tidak Memuaskan</td>
			</tr>
			<tr>
				<td></td>	
				<td width="20%"><input type="radio" name="soal6" id="soal6" value="2">Cukup Memuaskan</td>
			</tr>
			<tr>
				<td></td>	
				<td width="20%"><input type="radio" name="soal6" id="soal6" value="3">Memuaskan</td>
			</tr>
			<tr>
				<td></td>	
				<td><input type="radio" name="soal6" id="soal6" value="4">Sangat Memuaskan</td>
			</tr>
			
			<tr><td height="20px"></td></tr>
			<tr><td>7.</td><td colspan="4">Dosen dapat mengendalikan proses belajar mengajar di dalam kelas :</td></tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal7" id="soal7" value="1">Tidak Memuaskan</td>
			</tr>
			<tr>
				<td></td>	
				<td><input type="radio" name="soal7" id="soal7" value="2">Cukup Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal7" id="soal7" value="3">Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal7" id="soal7" value="4">Sangat Memuaskan</td>
			</tr>
			
			<tr><td height="30px"></td></tr>			
			<tr>
				<td colspan="5" style="height:30px;" valign="top">Penilaian Terhadap Matakuliah Yang Diajar !</td>
			</tr>
			<tr><td>8.</td><td colspan="4">Subject ini dapat memperkaya pengetahuan mahasiswa :</td></tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal8" id="soal8" value="1">Tidak Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal8" id="soal8" value="2">Cukup Memuaskan</td>
			</tr>	
			<tr>
				<td></td>
				<td><input type="radio" name="soal8" id="soal8" value="3">Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal8" id="soal8" value="4">Sangat Memuaskan</td>
			</tr>
			
			<tr><td height="20px"></td></tr>
			<tr><td>9.</td><td colspan="4">Tugas dan project membantu mahasiswa dalam memahami matakuliah ini :</td></tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal9" id="soal9" value="1">Tidak Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal9" id="soal9" value="2">Cukup Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal9" id="soal9" value="3">Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal9" id="soal9" value="4">Sangat Memuaskan</td>
			</tr>
			
			<tr><td height="20px"></td></tr>
			<tr><td>10.</td><td colspan="4">Sumber referensi yang ada membantu kalian dalam matakuliah ini (Teks books/Catatan dosen, referensi online, dll) :</td></tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal10" id="soal10" value="1">Tidak Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal10" id="soal10" value="2">Cukup Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal10" id="soal10" value="3">Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal10" id="soal10" value="4">Sangat Memuaskan</td>
			</tr>
			
			<tr><td height="20px"></td></tr>
			<tr><td>11.</td><td colspan="4">Mahasiswa senang dan nyaman dalam mengikuti matakuliah ini :</td></tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal11" id="soal11" value="1">Tidak Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal11" id="soal11" value="2">Cukup Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal11" id="soal11" value="3">Memuaskan</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="radio" name="soal11" id="soal11" value="4">Sangat Memuaskan</td>
			</tr>
			</table>
		</div>

	</div>

	<div id="thanks" class="form-panel ui-helper-hidden">
		<div class="dd">
			<h2>Kusioner Complete</h2>
			<table><tr><td>Thanks!</td></tr></table>
		</div>
	</div>
	<button id="save" type="submit" hidden="hidden"><b style="color:white;">Kirim</b></button><button id="next" hidden="hidden"><b style="color:white;">Berikutnya</b></button><button id="back" hidden="hidden"><b style="color:white;">Kembali</b></button>
	<div style="clear:both"></div>
	</form>
</div>
</body>
<div id="copyright">
<label><b>Copyright &copy 2014 by ISTB</br>
Allright Reserved</br>
Power By FR Team</b></label>
</div>
</html>