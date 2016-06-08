<?php
$option = $_GET['option'];
class HTML_dosen {
	function showDosen( $option, $task, $data, $posisi, $linkHalaman ) { 
		?>
		<div class="content-module-heading cf">
			<h3 class="fl">MASTER DOSEN</h3>
		</div>
		<div class="content-module-main">
			<ul class="temporary-button-showcase">
				<li><a href="index.php?option=<?php echo $option; ?>&task=new" class="button round blue image-right ic-add text-upper">New</a></li>
			</ul>
			<table>
			<thead>
			<tr>
				<th style="width:5%;">No</th>
				<th style="width:15%;">Kode Dosen</th>
				<th>Nama Dosen</th>
				<th class="ctr" style="width:20%;">Actions</th>
			</tr>
			</thead>
			<tfoot>
			<tr>
				<td colspan="5" style="text-align:center;" class="table-footer">
					<?php echo $linkHalaman; ?>
				</td>
			</tr>
			</tfoot>
			<tbody>
			<?php
			$no = $posisi + 1;
			foreach( $data as $row ) {
				?>
				<tr>
					<td class="ctr"><?php echo $no;?></td>
					<td><?php echo $row['kode_dosen'];?></td>
					<td><?php echo $row['nama_dosen'];?></td>
					<td class="ctr">
						<a href="index.php?option=<?php echo $option; ?>&task=edit&id=<?php echo $row['id_dosen']; ?>" class="button round blue image-right ic-edit text-upper">Edit</a>
						<a href="index.php?option=<?php echo $option; ?>&task=del&id=<?php echo $row['id_dosen']; ?>" class="button round blue image-right ic-delete text-upper">Delete</a>
					</td>
				</tr>
				<?php
				$no++;
			}
			?>
			</tbody>
			</table>
		</div>
		<?php
	}

	function showFormDosen( $option, $task, $id, $row, $matkul, $count ) {
		?>
		<script type="text/javascript">
		$(function() {
			$("form").submit(function() {
				if ( $('#nama').val() == '' ) {
					alert('Nama Dosen tidak boleh kosong');
					$('#nama').focus();
					return false;
				} else if ( $('#kode').val() == '' ) {
					alert('Kode Dosen tidak boleh kosong');
					$('#kode').focus();
					return false;
				} else if ( $("#setClick").val() == 0 ) {
					alert('Matakuliah tidak boleh kosong');
					return false;
				}
				return true;
			});
		});
		function checkClick(values) {
			var selectClick = $("#setClick").val();
			if(document.getElementById('id_matkul'+values).checked==true) {
				var plus = parseFloat(selectClick) + 1;
				$("#setClick").val( plus );
			} else if(document.getElementById('id_matkul'+values).checked==false) {
				var mins = parseFloat(selectClick) - 1;
				$("#setClick").val( mins );
			}
		}
		</script>
		<div class="content-module-heading cf">
			<h3 class="fl"><?php echo strtoupper($task);?> DOSEN</h3>
		</div>
		<div class="content-module-main">
			<form action="index.php?option=<?php echo $option; ?>&task=save" method="post">
			<fieldset>
				<p>
					<label for="simple-input">Nama Dosen</label>
					<input type="text" name="nama" id="nama" class="round default-width-input" value="<?php echo $row['nama_dosen']; ?>" />
				</p>
				<p>
					<label for="simple-input">Kode Dosen</label>
					<input type="text" name="kode" id="kode" class="round default-width-input" value="<?php echo $row['kode_dosen']; ?>" />
				</p>
				<p>
					<table>
					<thead>
					<tr>
						<th class="ctr" style="width:5%;">#</th>
						<th style="width:45%;">Matakuliah</th>
						<th class="ctr" style="width:5%;">#</th>
						<th style="width:45%;">Matakuliah</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$kolom  = 2;
					$split     = explode(",",$row['id_matkul']);
					$total .= count($split);
					for($i = 0; $i < $count; $i++) {
						$a = mysql_fetch_array($matkul);
						if(in_array($a['id_matkul'],$split)){
							$sign = " checked='checked' ";
						} else {
							$sign = ' ';
						}
						if($i % $kolom == 0){ ?><tr><?php }
						?>
						<td><input type="checkbox" name="id_matkul[]" id="id_matkul<?php echo $i; ?>" value="<?php echo $a['id_matkul'];?>" <?php echo $sign; ?> onclick="checkClick('<?php echo $i; ?>')" /></td>
						<td><?php echo $a['mata_kuliah']; ?></td>
						<?php
			    		if(($i % $kolom) == ($kolom - 0) OR ($i + 0) == $count) {
							?></tr><?php
						}
					}
					?>
					</tbody>
					</table>
				</p>
			</fieldset>
			<input type="hidden" name="setClick" id="setClick" value="<?php echo $total ; ?>" />
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<input type="submit" value="Save" class="round blue ic-right-arrow" />
			<input type="button" value="Back" onclick="goBack('<?php echo $_SERVER['PHP_SELF']; ?>?option=<?php echo $option;?>');" class="round dark ic-left-arrow" />
			</form>
		</div>
		<?php
	}
}
?>