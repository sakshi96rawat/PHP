<?php
session_start();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'header.php';
include 'report_del.html';

if(isset($_POST["rep_del_button"]))
{
	mysqli_query($link,"delete from reports where rname='$_POST[rname]'");
	?>
	

	<div class="alert alert_center">
	Congratulations! Report deleted.
	</div>
	</div>
	
	<?php
	header('refresh: 1; url= reports.php'); 
	
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