<?php 
require_once('../../includes/initialize.php'); 
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php include_layout_template('admin_header.php'); ?>
		<h2>Menu</h2>
		<div id="admin_container">
			<ul>
				<li><a href="section_list.php">Section Admin</a></li>
				<li><a href="page_admin.php">Page Admin</a></li>
			</ul>
		</div>
	</div>
<?php include_layout_template('admin_footer.php'); ?>