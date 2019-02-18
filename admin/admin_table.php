<?php
session_start();

if(isset($_SESSION['alog']))
{
include 'connection.php';
include 'header.php';
include 'admin_adm_nav.php';

$admin= mysqli_query($link,"select * from admin_details"); 

?>

<table>
<tr>
<th>FIRST NAME</th>
<th>LAST NAME</th>
<th>USER NAME</th>
<th>PASSWORD</th>
<th>ADMIN ID</th>
</tr>
<?php
$count=0;

while($row= mysqli_fetch_array($admin))
{
	echo "<tr><td>";
	?>
	
	<a href= "admin_info.php?id=<?php echo $row["id"];?> ">	
	
	<?php
	echo $row["first_name"]."</a></td><td>"; 
	echo $row["last_name"]."</td><td>"; 
	echo $row["user_name"]."</td><td>"; 
	echo $row["password"]."</td><td>"; 
	echo $row["admin_id"]."</td></tr>";
	$count= $count+1;
}

echo "</br>";
echo "</table>";

		
echo '<a href="admin_add.php">';
echo '<button type="button" class="add_button">ADD</button></a>';
echo '<a href="admin_del.php">';
echo '<button type="button" style="margin-left: 50px;">DELETE</button></a>';

include 'footer.php';
}
else
{
	session_destroy();
	header('location: admin_login.php');
}
?>