<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design for Bootstrap</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript"  src="js/customjs.js"></script>
 
</head>

  <!-- Start your project here-->
<body>

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

<div class="wrapper-editor">

  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
      	<th class="th-sm">ID

        </th>
        <th class="th-sm">Name

        </th>
        <th class="th-sm">User Name

        </th>
        <th class="th-sm">Password

        </th>
         <th class="th-sm">Actions

        </th>
      </tr>
    </thead>
    <tbody>
    	<?php   while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row["id"]; ?> </td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["username"]; ?></td>
        <td><?php echo $row["password"]; ?></td>
        <td>
             <?php echo "<a href=\"update.php?id=".$row['id']."\" class=\"btn btn-info btn-rounded btn-sm buttonEdit\">Edit</a>";  ?>
             <?php echo "<a href=\"delete.php?id=".$row['id']."\" class=\"btn btn-danger btn-sm btn-rounded buttonDelete\">Delete</a>";  ?>
        </td>
      </tr>
  <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>User Name</th>
        <th>Password</th>
        <th>Actions</th>
      </tr>
    </tfoot>
  </table>
  <div class="add-new-record">
  	 <?php echo "<a href=\"add-new-record.html\" class=\"btn btn-info btn-rounded btn-sm\">ADD NEW <i class=\"fas fa-plus-square ml-1\"></i></a>";  ?>
  </div>

            
</div>
<?php } ?>
</body>
</html>