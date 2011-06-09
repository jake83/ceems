<?php 
require_once('../../includes/initialize.php'); 

if (!$session->is_logged_in()) { redirect_to("login.php"); }

if(isset($_GET['page'])) {
	$pagenum = $_GET['page'];
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$page = new Page();
	$page->insert_page();
}

?>

<?php include_layout_template('admin_header.php'); ?>
		<ul id="crumb">
			<li><a href="index.php">Home</a></li>
			<li>> Page Admin</li>
		</ul>
		
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="page">
		<table>
			<tr>
				<td><label for="pagenum">Page Number:</label></td>
				<td>
					<input type="text" name="pagenum" maxlength="3" />
				</td>
			</tr>
			<tr>
				<td><label for="pageorder">Page Order:</label></td>
				<td>
					<input type="text" name="pageorder" maxlength="3" />
				</td>
			</tr>
			<tr>
				<td><label for="name">Name:</label></td>
				<td>
					<input type="text" name="name" maxlength="40" />
				</td>
			</tr>
			<tr>
				<td><label for="content">Content:</label></td>
				<td>
					<textarea name="content" rows="10"></textarea>
				</td>
			</tr>
			<tr>
				<td><label for="footerpromo">Footer Message:</label></td>
				<td>
					<input type="text" name="footerpromo" maxlength="40"></textarea>
				</td>
			</tr>
			<tr>
				<td><label for="page_enabled">Enabled:</label></td>
				<td>
					<input type="checkbox" name="page_enabled" value="1" />
				</td>
			</tr>
			<tr>
				<td><label for="submitpage">Add Page:</label></td>
				<td>
					<a href="" id="submitpage" name="submitpage">SUBMIT</a>
					<?php # <input type="image" src="../images/submit.gif" name="submitpage" value=1 /> ?>
				</td>
			</tr>
		</table>
		</form>
		
	</div>
<?php include_layout_template('admin_footer.php'); ?>