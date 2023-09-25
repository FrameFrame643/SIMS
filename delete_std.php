<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$id = $_GET["id"];
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM `std_info`  WHERE id ='$id'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    echo "</br>";
    echo "<a href='student.php'>Back</a>";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  ?>
  