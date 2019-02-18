<?php
session_start();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'header.php';
include 'admin_rep_nav.php';


    $rep= mysqli_query($link, "update reports set rname='$_POST[nrname]', rstatus='$_POST[nrstatus]', rsdate='$_POST[nrsdate]', report='$_POST[nreport]', decr='$_POST[ndecr]', rsby='$_POST[nrsby]' where id='$_POST[id]'");
		
	
		if($rep)
		{
			echo '<p class="left top" >Update successful</p>';
			header('refresh: 2; url= reports_info.php?id='.$_POST['id']); 
		}
		else
		{
			echo "Unable to update";
		}


include 'footer.php';
}
else
{
	session_destroy();
	header('location: admin_login.php');
}
?>