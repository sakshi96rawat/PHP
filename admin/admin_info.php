<?php
session_start();

if(isset($_SESSION['alog']))
{

include 'connection.php';
include 'header.php';
include 'admin_adm_nav.php';

$id=$_GET['id'];

$admin= mysqli_query($link, "select * from admin_details where id=$id"); 

if(isset($_POST['upload']))
{
	$file_name= $_FILES['nimage']['name'];
	$file_type= $_FILES['nimage']['type'];
	$file_size= $_FILES['nimage']['size'];
	$file_temp= $_FILES['nimage']['tmp_name'];
	$file_store= "upload/".$file_name;
	
	move_uploaded_file($file_temp, $file_store);
}

while($row=mysqli_fetch_array($admin))
{	
		echo '<form  style="font-family: corbel" action="admin_update.php" enctype="multipart/form/data" method="POST">';
				
		echo '<input type="hidden" name="id" value="'.$row["id"].'"';
		echo '<p>';
		echo '<div class="left head" style="margin-bottom: 50px; margin-top: 50px; font-size: 30px;">PERSONAL DETAILS</div>';
		echo '<div style="float: left; margin-left: 50px">';
		echo '<div class="left">First Name :  <input class="text_button" style="margin-left: 42px" type="text" name="nfname" value="'.$row["first_name"].'"></div>';
		echo '<div class="left">Middle Name :  <input class="text_button"  style="margin-left: 25px" type="text" name="nmname" value="'.$row["middle_name"].'"></div>';
		echo '<div class="left">Last Name :  <input class="text_button" style="margin-left: 43px" type="text" name="nlname" value="'.$row["last_name"].'"></div>';
		echo '<div class="left">Address :  <input class="text_button" style="margin-left: 60px; width: 300px" type="text" name="naddress" value="'.$row["address"].'"></div>';
		echo '<div class="left">State :  <input class="text_button" style="margin-left: 80px; width: 150px" type="text" name="nstate" value="'.$row["state"].'"></div>';
		echo '<div class="left">PostCode :  <input class="text_button" style="margin-left: 52px; width: 80px" type="number" name="npostcode" value="'.$row["postcode"].'"></div>';
		echo '<div class="left">Country :  <input class="text_button" style="margin-left: 60px" type="text" name="ncountry" value="'.$row["country"].'"></div>';
		echo '</div></p>';
		
		echo '<p><div style="float: right; margin-right: 150px; margin-top: -30px">';
		echo '<div>Image :  <input class="text_button"  style="margin-left: 80px; width: 100px; height: 150px;" type="text" value="'.$row["image"].'"></div>';
		echo '<div><input style="margin-left: 100px" type="file" name="nimage"></div>';
		
		echo '<div>Birthday :  <input class="text_button" style="margin-left: 67px; width: 80px" type="date" name="nbday" value="'.$row["birthday"].'"></div>';
		echo '<div>Gender :  <input class="text_button" style="margin-left: 78px; width: 80px" type="text" name="ngender" value="'.$row["gender"].'"></div>';
		echo '<div >E-Mail :  <input class="text_button" style="margin-left: 80px; width: 250px" type="text" name="nemail" value="'.$row["email"].'"></div>';
		echo '<div >Contact Number :  <input class="text_button" style="margin-bottom: 80px; width: 100px" type="number" name="ncontact" value="'.$row["contact"].'"></div>';
		echo '</div></p>';
		
		
		echo '<hr class="divider_line" style="margin-left: -20px">';
		
	
		echo '<div style="float: left">';
		echo '<div class="left" style="margin-bottom: 50px; margin-top: 50px; font-size: 30px;">ACCOUNT DETAILS</div>';
		echo '<div style="margin-left: 50px">';
		echo '<div class="left">User Name :  <input class="text_button" style="margin-left: 45px" type="text" name="nuname" value="'.$row["user_name"].'"></div>';
		echo '<div class="left">Password :  <input class="text_button"  style="margin-bottom: -30px; margin-left: 55px" type="password" name="npass" value="'.$row["password"].'"></div>';
		echo '</div>';
		
		echo '<hr class="divider_line" style="margin-left: 135px">';
		
		
		
		echo '<div class="left" style="margin-bottom: 50px; margin-top: 60px; font-size: 30px;">COMPANY DETAILS</div>';
		echo '<div style="float: left; margin-left: 50px">';
		echo '<div class="left">Admin ID :  <input class="text_button" style="margin-left: 55px; width: 100px" type="number" name="naid" value="'.$row["admin_id"].'"></div>';
		echo '<div class="left">Position :  <input class="text_button" style="margin-left: 67px" type="text" name="npost" value="'.$row["position"].'"></div>';
		echo '<div class="left">Department :  <input class="text_button"  style="margin-left: 43px" type="text" name="ndepart" value="'.$row["department"].'"></div>';
		echo '<div class="left">Status :  <input class="text_button" style="margin-left: 80px; width: 70px" type="text" name="nstat" value="'.$row["status"].'"></div>';
		echo '<div class="left">Start Date :  <input class="text_button" style="margin-left: 55px; width: 100px" type="date" name="nsdate" value="'.$row["start_date"].'"></div>';
		echo '<div class="left">Reports :  <input class="text_button" style="margin-left: 70px; width: 100px" type="text" name="nrep" value="'.$row["reports"].'"></div>';
		echo '</div>';
		
		echo '<div style="float: right; margin-left: 190px; margin-top: 30px">';
		echo '<div>Bank Name :  <input class="text_button"  style="margin-left: 55px; width: 250px" type="text" name="nbname" value="'.$row["bank_name"].'"></div>';
		echo '<div>Bank Branch :  <input class="text_button" style="margin-left: 50px; width: 100px" type="text" name="nbbranch" value="'.$row["bank_branch"].'"></div>';
		echo '<div>Account Name :  <input class="text_button" style="margin-left: 38px" type="text" name="naname" value="'.$row["account_name"].'"></div>';
		echo '<div>Account Number :  <input class="text_button" style="margin-left: 23px" type="number" name="nanum" value="'.$row["account_num"].'"></div>';
		echo '<div>Salary :  <input class="text_button" style="margin-left: 92px; width: 100px; margin-bottom: 50px" type="text" name="nsal" value="'.$row["salary"].'"></div>';
		echo '</div>';
		
		
		echo '<input name="upload" class="left" type="submit" style="margin-bottom: 130px; margin-left: 60%; width: 150px">';
		
		
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