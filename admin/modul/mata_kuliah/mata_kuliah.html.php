<?php
$option = $_GET['option'];
class HTML_matakuliah {
	function showshowMataKuliah( $option, $task, $data, $posisi, $linkHalaman ) { 
		?>
		<div class="content-module-heading cf">
			<h3 class="fl">MASTER MATAKULIAH</h3>
			<span class="fr expand-collapse-text">Click to collapse</span>
			<span class="fr expand-collapse-text initial-expand">Click to expand</span>
		</div>
		<div class="content-module-main">
			<ul class="temporary-button-showcase">
				<li><a href="index.php?option=<?php echo $option; ?>&task=new" class="button round blue image-right ic-add text-upper">New</a></li>
			</ul>
			<table>
			<thead>
			<tr>
				<th style="width:5%;">No</th>
				<th style="width:15%;">Kode Matakuliah</th>
				<th>Nama Matakuliah</th>
				<th style="width:20%;">Actions</th>
			</tr>
			</thead>
			<tfoot>
			<tr>
				<td colspan="3" style="text-align:center;" class="table-footer">
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
					<td><?php echo $no;?></td>
					<td><?php echo $row['kode_matkul'];?></td>
					<td><?php echo $row['mata_kuliah'];?></td>
					<td>
						<a href="index.php?option=<?php echo $option; ?>&task=edit&id=<?php echo $row['id_matkul']; ?>" class="button round blue image-right ic-edit text-upper">Edit</a>
						<a href="index.php?option=<?php echo $option; ?>&task=del&id=<?php echo $row['id_matkul']; ?>" class="button round blue image-right ic-delete text-upper">Delete</a>
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

	function showFormMatKul( $option, $task, $id, $row ) {
		?>
		<script type="text/javascript">
		$(function() {
			$("form").submit(function() {
				if ( $('#nama').val() == '' ) {
					alert('Nama Matakuliah tidak boleh kosong');
					$('#nama').focus();
					return false;
				} else if ( $('#matkul').val() == '' ) {
					alert('Kode Matakuliah tidak boleh kosong');
					$('#matkul').focus();
					return false;
				}
				return true;
			});
		});
		</script>
		<div class="content-module-heading cf">
			<h3 class="fl"><?php echo strtoupper($task);?> MATAKULIAH</h3>
			<span class="fr expand-collapse-text">Click to collapse</span>
			<span class="fr expand-collapse-text initial-expand">Click to expand</span>
		</div>
		<div class="content-module-main">
			<form action="index.php?option=<?php echo $option; ?>&task=save" method="post">
			<fieldset>
				<p>
					<label for="simple-input">Kode Matakuliah</label>
					<input type="text" name="kode" id="matkul" class="round default-width-input" value="<?php echo $row['kode_matkul']; ?>" />
				</p>
				<p>
					<label for="simple-input">Nama Matakuliah</label>
					<input type="text" name="nama" id="nama" class="round default-width-input" value="<?php echo $row['mata_kuliah']; ?>" autofocus="autofocus" />
				</p>
				
			</fieldset>
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<input type="submit" value="Save" class="round blue ic-right-arrow" />
			<input type="button" value="Back" onclick="goBack('<?php echo $_SERVER['PHP_SELF']; ?>?option=<?php echo $option;?>');" class="round dark ic-left-arrow" />
			</form>
		</div>
		<?php
	}

}
?>