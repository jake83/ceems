<?php 
require_once('../../includes/initialize.php'); 

if (!$session->is_logged_in()) { redirect_to("login.php"); }

if(isset($_GET['page'])) {
	$section_obj = new Section();
	$section = $section_obj->get_info($_GET['page']);		
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$section = new Section();
	if($_REQUEST['section_update_x']) {
		$section->update_section();
	} elseif ($_REQUEST['section_add_x']) {
		$section->insert_section();
	} else {
		$message .= "There was an error with your submission."
	}
}

?>

<?php include_layout_template('admin_header.php'); ?>
		<ul id="crumb">
			<li><a href="index.php">Home</a></li>
			<li>&gt; <a href="section_list.php">Sections</a></li>
			<li>&gt; Section Admin</li>
		</ul>
		
		<div id="admin_container">
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="section">
			<table>
				<tr>
					<td><label for="pagenum">Page Number:</label></td>
					<td>
						<input type="text" name="pagenum" maxlength="3" value="<?php if(isset($_GET['page'])) echo $_GET['page']; ?>" />
					</td>
				</tr>
				<tr>
					<td><label for="name">Name:</label></td>
					<td>
						<input type="text" name="name" maxlength="40" value="<?php if(isset($section)) echo $section['name']; ?>" />
					</td>
				</tr>
				<tr>
					<td><label for="page_enabled">Enabled:</label></td>
					<td>
						<input type="checkbox" name="section_enabled" value="1" <?php if(isset($section) && $section['enabled'] == 1) echo "checked" ?> />
					</td>
				</tr>
				<tr>
				<?php if(isset($section)) { ?>
					<td><label for="submitpage">Update Section:</label></td>
					<td>
						<input type="image" src="../images/submit.gif" name="section_update" value=1 />
						<?php // <a href="" id="page" name="page_update">UPDATE</a> ?>
					</td>
				<?php } else { ?>
					<td><label for="submitpage">Add Section:</label></td>
					<td>
						<input type="image" src="../images/submit.gif" name="section_add" value=1 />
						<?php // <a href="" id="submitpage" name="page_add">SUBMIT</a> ?>
					</td>
				<?php } ?>
				</tr>
			</table>
			</form>
		</div>
		
	</div>
<?php include_layout_template('admin_footer.php'); ?>