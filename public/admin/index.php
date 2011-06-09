<?php 
require_once('../../includes/initialize.php'); 
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php include_layout_template('admin_header.php'); ?>
	<h2>Menu</h2>
		<ul>
			<li><a href="section_admin.php?section=367">Section Admin</a></li>
			<li><a href="page_admin.php">Page Admin</a></li>
		</ul>
	</div>
<?php include_layout_template('admin_footer.php'); ?>