<div id="admin_bottom">

    <footer>
	    <div id="footer_promo">
			<h2 class="grid_20">
				<?php isset($sel_page['footerpromo']) ? print $sel_page['footerpromo'] : print "CeeMS - Ceefax style CMS"; ?>
			</h2>
		</div>
	    <nav>
		    <ul>
			    <li class="grid_5" id="red"><a href="index.php">Home</a></li>
			    <li class="grid_5" id="green"><a href="section_admin.php">Sections</a></li>
			    <li class="grid_5" id="yellow"><a href="page_admin.php">Pages</a></li>
			    <li class="grid_5" id="aqua"><a href="user_admin.php">Users</a></li>
		    </ul>
	    </nav>
    </footer>

</div>

</body>

<script type="text/javascript" src="../javascripts/script_admin.js"></script>
<?php
	if (isset($_GET['page'])) {
		echo "<script type='text/javascript'>";
		echo "pageChanger({$pagecount})";
		echo "</script>";
	} 
?>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>