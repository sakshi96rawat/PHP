<?php
session_start();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'header.php';
include 'admin_emp_nav.php';



    $emp= mysqli_query($link, "update emp_details set fname='$_POST[nfname]', mname='$_POST[nmname]', lname='$_POST[nlname]', image='$_POST[nimage]', birthday='$_POST[nbday]', gender='$_POST[ngender]', address='$_POST[naddress]', state='$_POST[nstate]', postcode='$_POST[npostcode]', country='$_POST[ncountry]', email='$_POST[nemail]', contact='$_POST[ncontact]', uname='$_POST[nuname]', password='$_POST[npass]', eid='$_POST[neid]', position='$_POST[npost]', department='$_POST[ndepart]', start_date='$_POST[nsdate]', status='$_POST[nstat]', bank_name='$_POST[nbname]', bank_branch='$_POST[nbbranch]', account_name='$_POST[naname]', account_num='$_POST[nanum]', reports='$_POST[nrep]', salary='$_POST[nsal]'  where id='$_POST[id]'");
		
	
		if($emp)
		{
			echo '<p class="left top" >Update successful</p>';
			header('refresh: 2; url= admin_emp_info.php?id='.$_POST['id']); 
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