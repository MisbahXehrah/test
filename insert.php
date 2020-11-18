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
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
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
if(isset($_POST['new']) && $_POST['new']==1){
    $name =$_REQUEST['name'];
    $uname = $_REQUEST['username'];
    $pass =$_REQUEST['pass']; 
    $ins_query="insert into user
    (`name`,`username`,`password`)values
    ('$name','$uname','$pass')";
   $result= mysqli_query($conn,$ins_query)
    or die(mysql_error());
if ($result) {
    echo '<div class="Status">';
    echo "<script>alert('Record Added Successfully');</script>";
    echo '</div>';
    echo '<div class="ViewBtn-wrapper">';
    echo "<br><a href=\"index.php\" class=\"btn btn-success btn-md btn-rounded buttonView\">View Record</a>";
    echo '</div>';
  header("Location:add-new-record.html");

}

}
mysqli_close($conn);
?>
