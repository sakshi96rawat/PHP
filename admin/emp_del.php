<?php
session_start();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'header.php';
include 'emp_del.html';

if(isset($_POST["emp_del_button"]))
{
	mysqli_query($link,"delete from emp_details where eid='$_POST[eid]'");
	?>
	

	<div class="alert alert_center">
	Congratulations! Employee deleted.
	</div>
	
	<?php
	header('refresh: 1; url= admin_emp_table.php'); 
	
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