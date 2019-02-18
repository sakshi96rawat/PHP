<?php
session_start();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'header.php';
include 'admin_rep_nav.php';

$id=$_GET['id'];

$rep= mysqli_query($link, "select * from reports where id=$id"); 

	
if(isset($_POST['upload']))
{
	$file_name= $_FILES['nreport']['name'];
	$file_type= $_FILES['nreport']['type'];
	$file_size= $_FILES['nreport']['size'];
	$file_temp= $_FILES['nreport']['tmp_name'];
	$file_store= "upload/".$file_name;
	
	move_uploaded_file($file_temp, $file_store);
}


while($row=mysqli_fetch_array($rep))
{	
		echo '<form style="font-family: corbel" action="reports_update.php" enctype="multipart/form/data" method="POST">';
				
		echo '<input type="hidden" name="id" value="'.$row["id"].'"';
		echo '<p>';
		echo '<div class="left" style="margin-bottom: 50px; margin-top: 50px; font-size: 30px;">REPORT DETAILS</div>';
		echo '<div style="float: left; margin-left: 50px">';
		echo '<div class="left">Report Name :  <input class="text_button" style="margin-left: 42px" type="text" name="nrname" value="'.$row["rname"].'"></div>';
		echo '<div class="left">Status :  <input class="text_button"  style="margin-left: 88px" type="text" name="nrstatus" value="'.$row["rstatus"].'"></div>';
		echo '<div class="left">Submission Date :  <input class="text_button" style="margin-left: 18px" type="date" name="nrsdate" value="'.$row["rsdate"].'"></div>';
		echo '<div class="left">Description :  <input class="text_button" style="margin-left: 52px; width: 700px" type="text" name="ndecr" value="'.$row["decr"].'"></div>';
		
		echo '<div class="left">Report :  <input style="margin-top: 20px; margin-left: 80px; display: inline-block; width: 500px;" type="text" value="'.$row["report"].'"><input style="margin-top: 0px; margin-left: 5px" type="file" name="nreport"></div>';
		echo '<div class="left">Submitted By :  <input class="text_button" style="margin-left: 35px" type="text" name="nrsby" value="'.$row["rsby"].'"></div>';
		echo '</div></p>';
		
		
		echo '<input class="left" name="upload" type="submit" style="margin-bottom: 140px; margin-left: 55%; width: 150px">';
		
		
		echo '</p>';
		echo '</form>';
		
	
}


include 'footer.php';
}
else
{
	session_destroy();
	header('location: admin_login.php');
}
?>