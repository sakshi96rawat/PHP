<?php
SESSION_START();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'admin_add.html';

if(isset($_POST["admin_add_details_button"]))
{
	mysqli_query($link,"insert into admin_details (id, first_name, last_name, user_name, password, admin_id) values('','$_POST[first_name]','$_POST[last_name]', '$_POST[user_name]','$_POST[password]','$_POST[admin_id]')");
	?>
	
	<div class="alert text_center">
	Congratulations! You are now an admin.
	<?php
	header('refresh: 1; url= admin_table.php'); ?>	
	
	</div>

	<?php
	}}
else
{
	session_destroy();
	header('location: admin_login.php');
}
?>

</body>
</html>