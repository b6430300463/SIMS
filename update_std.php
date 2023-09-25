<?php
$id = trim($_POST["id"]);
$old_id=trim($_POST["old_id"]);
$en_name = trim($_POST["en_name"]);
$en_surname = trim($_POST["en_surname"]);
$th_name = trim($_POST["th_name"]);
$th_surname = trim($_POST["th_surname"]);
$major_code = trim($_POST["major_code"]);
$email = trim($_POST["email"]);

if(empty($id) || !is_numeric($id) || empty($en_name) || empty($en_surname) || empty($th_name) || empty($th_surname) || empty($major_code) || empty($email)){
  if (empty($id)) {
      echo "กรุณากรอกid</br>";
  }
  if (!is_numeric($id)){
    echo "กรุณากรอก id เป็นตัวเลข</br>";
  }
  if( empty($en_name)){
      echo "กรุณากรอกชื่อภาษาอังกฤษ/br>";
  }
  if( empty($en_surname)){
      echo "กรุณากรอกนามสกุลภาษาอังกฤษ</br>";
  }
  if( empty($th_name)){
      echo "กรุณากรอกชื่อภาษาไทย</br>";
  }
  if( empty($th_surname)){
      echo "กรุณากรอกนามสกุลภาษาไทย</br>";
  }
  if( empty($major_code)){
      echo "กรุณากรอกสาขา</br>";
  }
  if( empty($email)){
      echo "กรุณากรอกอีเมลล์</br>";
  }
  echo "<a href='update_std_form.php? id=$old_id'>Back</a>";
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "รูปแบบอีเมลไม่ถูกต้อง</br>";
    echo "<a href='update_std_form.php'>Back</a>";
} else {

$servername="localhost";
$username="root";
$password="";
$dbname="students";
// create connection
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection failed ".mysqli_connect_error());
}

$sql = "UPDATE `std_info` SET `id`='$id', `en_name`='$en_name', `en_surname`='$en_surname', `th_name`='$th_name', `th_surname`='$th_surname', `major_code`='$major_code', `email`='$email' WHERE `id`='$old_id'";

$result=mysqli_query($conn,$sql);

if ($result) {
    echo "Record updated successfully";
    echo "<br>ID : $id</br>";
    echo "<a href='student.php'>Back</a>";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
}
?>
  