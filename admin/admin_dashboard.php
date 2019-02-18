<?php
session_start();

if(isset($_SESSION['alog']))
{
include "header.php";
include "admin_db_nav.php";
?>


<p id="dashboard_text" class="top left" style="font-family: calibri">
Welcome! <?php echo $_SESSION['alog']; ?> <br><br>Here you can manage your account and even create new admin accounts. Take a look through the details of the employee's and change details as per the requirement.
</p>

<?php
include "footer.php";
}
else
{
	session_destroy();
	header('location: admin_login.php');
}
?>