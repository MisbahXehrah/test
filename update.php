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

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Get ID
$id = $_GET['id'];

//Query to display selected record
$sql_query = "SELECT * FROM user WHERE id='".$id."'";
$result = $conn->query($sql_query);
$row = mysqli_fetch_assoc($result);

//Display Record
if ($result->num_rows > 0) {
?>

<div class="card add-new">

  <h5 class="card-header info-color white-text text-center py-4">
    <strong>UPDATE</strong>
  </h5>

	<form class="text-center" style="color: #757575;" name="form" method="post" action=""> 
    <input type="hidden" name="new" value="1" />
    <div class="md-form">
      <input type="text" name="fname" placeholder="Enter Name" class="form-control" value="<?php echo $row["name"];?>" required />
    </div>
    <div class="md-form">
      <input type="text" name="fusername" placeholder="Enter Username" class="form-control" value="<?php echo $row["username"]; ?>" required />
    </div>
    <div class="md-form">
      <input type="text" name="fpass" placeholder="Enter Password" class="form-control" value="<?php echo $row["password"]; ?>" required />
    </div>
    <div class="md-form">
      <input name="submit" type="submit" value="Submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"/>
    </div>
    </form>

	<!-- <a href="index.php">View Record</a> -->
</div>

<?php

//Query to update record
	// try{
		if(isset($_POST['new']) && $_POST['new']==1)
		{
			$id=$_REQUEST['id'];
			$name =$_REQUEST['fname'];
			$uname = $_REQUEST['fusername'];
			$pass =$_REQUEST['fpass'];

			$update="update user set name='".$name."',
			username='".$uname."', password='".$pass."' where id='".$id."'";
			mysqli_query($conn,$update)
			or die(mysql_error());
			echo '<div class="Status">';
			echo "Record Updated Successfully";
			echo '</div>';
			echo '<div class="ViewBtn-wrapper">';
			echo "<br><a href=\"index.php\" class=\"btn btn-success btn-md btn-rounded buttonView\">View Record</a>";
			echo '</div>';
		}

	// catch (Exception $e) {
	//     echo $e->getMessage();
	// }

}

else{
	echo 'No data.';
}
mysqli_close($conn);
?>

</body>
</html>