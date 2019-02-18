<?php
session_start();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'header.php';
include 'admin_adm_nav.php';


    $admin= mysqli_query($link, "update admin_details set first_name='$_POST[nfname]', middle_name='$_POST[nmname]', last_name='$_POST[nlname]', image='$_POST[nimage]', birthday='$_POST[nbday]', gender='$_POST[ngender]', address='$_POST[naddress]', state='$_POST[nstate]', postcode='$_POST[npostcode]', country='$_POST[ncountry]', email='$_POST[nemail]', contact='$_POST[ncontact]', user_name='$_POST[nuname]', password='$_POST[npass]', admin_id='$_POST[naid]', position='$_POST[npost]', department='$_POST[ndepart]', start_date='$_POST[nsdate]', status='$_POST[nstat]', bank_name='$_POST[nbname]', bank_branch='$_POST[nbbranch]', account_name='$_POST[naname]', account_num='$_POST[nanum]', reports='$_POST[nrep]', salary='$_POST[nsal]'  where id='$_POST[id]'");
		
	
		if($admin)
		{
			echo '<p class="left top" >Update successful</p>';
			header('refresh: 2; url= admin_info.php?id='.$_POST['id']); 
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