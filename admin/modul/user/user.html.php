<?php
$option = $_GET['option'];
class HTML_user {
	function showListUser( $option, $task, $data, $posisi, $linkHalaman ) { 
		?>
		<div class="content-module-heading cf">
			<h3 class="fl">USER MANAGEMENT</h3>
		</div>
		<div class="content-module-main">
			<ul class="temporary-button-showcase">
				<li><a href="index.php?option=<?php echo $option; ?>&task=new" class="button round blue image-right ic-add text-upper">New</a></li>
			</ul>
			<table>
			<thead>
			<tr>
				<th style="width:5%;">No</th>
				<th>Nama User</th>
				<th style="width:18%;">username</th>
				<th class="ctr" style="width:20%;">Actions</th>
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
					<td class="ctr"><?php echo $no;?></td>
					<td><?php echo $row['nama'];?></td>
					<td><?php echo $row['username'];?></td>
					<td class="ctr">
						<a href="index.php?option=<?php echo $option; ?>&task=edit&id=<?php echo $row['id']; ?>" class="button round blue image-right ic-edit text-upper">Edit</a>
						<a href="index.php?option=<?php echo $option; ?>&task=del&id=<?php echo $row['id']; ?>" class="button round blue image-right ic-delete text-upper">Delete</a>
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

	function showFormUser( $option, $task, $id, $row ) {
		?>
		<script type="text/javascript">
		$(function() {
			if( $('#id').val() != 0 ) {
				$('#username').attr('disabled','disabled')
			}
			$("form").submit(function() {
				if ( $('#nama').val() == '' ) {
					alert('Nama tidak boleh kosong');
					$('#nama').focus();
					return false;
				} else if ( $('#username').val() == '' ) {
					alert('Username tidak boleh kosong');
					$('#username').focus();
					return false;
				} else if ( $('#id').val() == 0 && $('#password').val() == '' ) {
					alert('Password tidak boleh kosong');
					$('#password').focus();
					return false;
				}
				return true;
			});
		});
		</script>
		<div class="content-module-heading cf">
			<h3 class="fl"><?php echo strtoupper($task);?> USER</h3>
		</div>
		<div class="content-module-main">
			<form action="index.php?option=<?php echo $option; ?>&task=save" method="post">
			<fieldset>
				<?php if($_GET['warning'] == 'error') { ?>
					<p style="color:red; font-weight:bold;">Usernama Already Exist</p>
				<?php } ?>
				<p>
					<label for="simple-input">Nama</label>
					<input type="text" name="nama" id="nama" class="round default-width-input" value="<?php echo $row['nama']; ?>" />
				</p>
				<p>
					<label for="simple-input">Username</label>
					<input type="text" name="username" id="username" class="round default-width-input" value="<?php echo $row['username']; ?>"  />
				</p>
				<p>
					<label for="simple-input">Password</label>
					<input type="password" name="password" id="password" class="round default-width-input" />
				</p>
			</fieldset>
			<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
			<input type="submit" value="Save" class="round blue ic-right-arrow" />
			<input type="button" value="Back" onclick="goBack('<?php echo $_SERVER['PHP_SELF']; ?>?option=<?php echo $option;?>');" class="round dark ic-left-arrow" />
			</form>
		</div>
		<?php
	}
}
?>