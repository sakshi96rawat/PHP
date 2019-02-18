<?php
SESSION_START();
include 'connection.php';
include 'admin_login.html';


if(isset($_POST["admin_login_button"]))
{
	$count=0;
	$user= mysqli_query($link,"select * from admin_details where user_name='$_POST[user_name]' && password='$_POST[password]'"); 
	$count=mysqli_num_rows($user);
	
	if($count==0)
	{
		?>
		<div class="alert">
		<b> Invalid </b> Username or Password
		</div>
		<?php
	}
	
	else
	{
		$_SESSION['alog']= $_POST['user_name'];
		header("Location: admin_dashboard.php");
	}
}
?>