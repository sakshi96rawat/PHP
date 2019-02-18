<?php
session_start();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'header.php';
include 'admin_emp_nav.php';

$emp= mysqli_query($link,"select * from emp_details"); 

?>

<table>
<tr>
<th>FIRST NAME</th>
<th>LAST NAME</th>
<th>EMP ID</th>
<th>SALARY</th>
</tr>

<?php
$count= 0;

while($row= mysqli_fetch_array($emp))
{
	echo "<tr>";
	echo "<td>"; ?>
	
	<a href= "admin_emp_info.php?id=<?php echo $row["id"];?> ">	
	
	<?php
	
	echo $row["fname"]; 
	echo "</a>";
	echo "</td>";
	echo "<td>"; echo $row["lname"]; echo "</td>";
	echo "<td>"; echo $row["eid"]; echo "</td>";
	echo "<td>"; echo $row["salary"]; echo "</td>";
	echo "</tr>";
	
	$count= $count+1;
}

echo "</br>";
echo "</table>";

echo '<a href="emp_add.php" target="">';
echo '<button type="button" class="add_button">ADD</button></a>';
echo '<a href="emp_del.php">';
echo '<button type="button" style="margin-left: 50px;">DELETE</button></a>';

include 'footer.php';
}
else
{
	session_destroy();
	header('location: admin_login.php');
}
?>