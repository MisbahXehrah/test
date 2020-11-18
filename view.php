<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql_query = "SELECT * FROM user";
$result = $conn->query($sql_query);

if ($result->num_rows > 0) {
  
?>
<table border="1">
   <tr>
      <th>
      id
      </th>
      <th>
      Name
      </th>
      <th>
      Username
      </th>
       <th>
      Actions
      </th>
   </tr>
      <?php   while($row = $result->fetch_assoc()) {
      ?>
   <tr>
      <td><?php echo $row["id"]; ?> </td>
      <td><?php echo $row["name"]; ?> </td>
      <td><?php echo $row["username"]; ?> </td>
     <?php echo "<td><a href=\"delete.php?id=".$row['id']."\">Delete</a></td>";  ?>
      <?php echo "<td><a href=\"update.php?id=".$row['id']."\">Edit</a></td>";  ?>
   </tr>
 <?php } ?>
</table>

<?php

 
} else {
  echo "Data nahi hai bhai";
}

?>
<div>
	<h1>Insert New Record</h1>
	<form name="form" method="post" action="insert.php"> 
	<input type="hidden" name="new" value="1" />
	<p><input type="text" name="name" placeholder="Enter Name" required /></p>
	<p><input type="text" name="username" placeholder="Enter Username" required /></p>
	<p><input type="text" name="pass" placeholder="Enter Password" required /></p>
	<p><input name="submit" type="submit" value="Submit" /></p>
	</form>
</div>

<!-- <div>
	<h1>Insert New Record</h1>
	<form name="form" method="post" action="update.php"> 
	<input type="hidden" name="new" value="1" />
	<p><input type="text" name="name" placeholder="Enter Name" required /></p>
	<p><input type="text" name="username" placeholder="Enter Username" required /></p>
	<p><input type="text" name="pass" placeholder="Enter Password" required /></p>
	<p><input name="submit" type="submit" value="Submit" /></p>
	</form>
</div>
 -->

<?php
$conn->close();
?>