<?php 
require_once('../../includes/initialize.php'); 
if (!$session->is_logged_in()) { redirect_to("login.php"); }

if(isset($_GET['section'])) {
	$section_num = $_GET['section'];
}

if(isset($_POST['submit'])) {
	$section = new Section();
	$section->insert_section();
}

?>

<?php include_layout_template('admin_header.php'); ?>
	<h2>Section Admin</h2>
		<p><a href="index.php">Home</a></p>
		
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="section">
		<table>
			<tr>
				<td><label for="pagenum">Section Number</label></td>
				<td>
					<input type="text" name="pagenum" maxlength="3" />
				</td>
			</tr>
			<tr>
				<td><label for="name">Name</label></td>
				<td>
					<input type="text" name="name" maxlength="40" />
				</td>
			</tr>
			<tr>
				<td colspan="2">Enabled: <input type="checkbox" name="section_enabled" value="1" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="submit_section" /></td>
			</tr>
		</table>
		</form>
		
	</div>
<?php include_layout_template('admin_footer.php'); ?>