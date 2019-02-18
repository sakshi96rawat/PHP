<?php
session_start();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'header.php';
include 'admin_rep_nav.php';


$rep= mysqli_query($link,"select * from reports"); 
?>


<table>
<tr>
<th>REPORT NAME</th>
<th>STATUS</th>
<th>DESCRIPTION</th>
</tr>

<?php
$count=0;

while($row= mysqli_fetch_array($rep))
{
	echo "<tr><td>";
	?>
	
	<a href= "reports_info.php?id=<?php echo $row["id"];?> ">	
	
	<?php
	echo $row["rname"]."</a></td><td>"; 
	echo $row["rstatus"].'</td><td>'; 
	echo $row["decr"]."</td>"; 
	$count= $count+1;
}

echo "</br>";
echo "</table>";

		
echo '<a href="reports_add.php" target="">';
echo '<button type="button" class="add_button">ADD</button></a>';
echo '<a href="report_del.php">';
echo '<button type="button" style="margin-left: 50px;">DELETE</button></a>';

include 'footer.php';
}
else
{
	session_destroy();
	header('location: admin_login.php');
}
?>