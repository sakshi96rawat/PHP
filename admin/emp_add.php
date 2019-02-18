<?php
session_start();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'emp_add.html';

if(isset($_POST["submit3"]))
{
	mysqli_query($link,"insert into emp_details (id, fname, lname, uname, password, eid, salary) values('','$_POST[fname]','$_POST[lname]','$_POST[uname]','$_POST[password]','$_POST[eid]','$_POST[salary]')");
	?>
	
	<div class="alert text_style">
	Congratulations! Details submitted successfully.
	<?php
	header('refresh: 1; url= admin_emp_table.php'); ?>	
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