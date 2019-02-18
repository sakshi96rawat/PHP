<?php
SESSION_START();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'header.php';
include 'admin_del.html';

if(isset($_POST["admin_del_button"]))
{
	mysqli_query($link,"delete from admin_details where admin_id='$_POST[aid]'");
	?>
	

	<div class="alert alert_center">
	Congratulations! Admin deleted.
	</div>
	</div>
	
	<?php
	header('refresh: 1; url= admin_table.php'); 
	
}
}
else
{
	session_destroy();
	header('location: admin_login.php');
}
?>
</body>
</html>