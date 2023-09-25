<?php
$oldid=htmlspecialchars(trim($_POST["oldid"]));
$id=htmlspecialchars(trim($_POST["id"]));
$en_name=htmlspecialchars(trim($_POST["en_name"]));
$en_surname=htmlspecialchars(trim($_POST["en_surname"]));
$th_name=htmlspecialchars(trim($_POST["th_name"]));
$th_surname=htmlspecialchars(trim($_POST["th_surname"]));
$major_code=htmlspecialchars(trim($_POST["major_code"]));
$email=htmlspecialchars(trim($_POST["email"]));


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (empty($id) || empty($en_name) || empty($en_surname) || empty($th_name) || empty($th_surname) || empty($major_code) || empty($email)) {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบทุกช่อง'); window.location.href = 'update_std_form.php?id=" . $oldid . "';</script>";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('รูปแบบอีเมล์ไม่ถูกต้อง'); window.location.href = 'update_std_form.php?id=" . $oldid . "';</script>";
} else {
    $sql = "UPDATE `std_info` SET `id`='$id', `en_name`='$en_name', `en_surname`='$en_surname', `th_name`='$th_name', `th_surname`='$th_surname', `major_code`='$major_code', `email`='$email' WHERE `id`='$oldid'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        echo "</br>";
        echo "<a href='student.php'>Back</a>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
  
  mysqli_close($conn);
  ?>
  