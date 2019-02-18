<?php
session_start();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'reports_add.html';

if(isset($_POST["reports_add_button"]))
{
	mysqli_query($link,"insert into reports (id, rname, rstatus, rsdate, decr, rsby) values('','$_POST[rname]','$_POST[rstatus]', '$_POST[rsdate]','$_POST[decr]','$_POST[rsby]')");
	?>
	
	<div class="alert text_center">
	Congratulations! Report submitted successfully.
	<?php
	header('refresh: 1; url= reports.php'); ?>	
	
	</div>

	<?php
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