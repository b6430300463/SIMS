<?php
$id = htmlspecialchars(trim($_POST["id"]));
$en_name = htmlspecialchars(trim($_POST["en_name"]));
$en_surname = htmlspecialchars(trim($_POST["en_surname"]));
$th_name = htmlspecialchars(trim($_POST["th_name"]));
$th_surname = htmlspecialchars(trim($_POST["th_surname"]));
$major_code = htmlspecialchars(trim($_POST["major_code"]));
$email = htmlspecialchars(trim($_POST["email"]));
if(empty($id) || !is_numeric($id) || empty($en_name) || empty($en_surname) || empty($th_name) || empty($th_surname) || empty($major_code) || empty($email)){
    if (!is_numeric($id)){
        echo "กรุณากรอก id เป็นตัวเลข</br>";
    }
    if (empty($id)) {
        echo "กรุณากรอกid</br>";
    }
    if( empty($en_name)){
        echo "กรุณากรอกชื่อภาษาอังกฤษ</br>";
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
    echo "<a href='insert_std_form.html'>Back</a>";
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "รูปแบบอีเมลไม่ถูกต้อง</br>";
    echo "<a href='insert_std_form.html'>Back</a>";
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
$sql="INSERT INTO `std_info` (`id`, `en_name`, `en_surname`, `th_name`, `th_surname`, `major_code`, `email`) VALUES ('$id', '$en_name', '$en_surname', '$th_name', '$th_surname', '$major_code', '$email')";

$result=mysqli_query($conn,$sql);
if($result){
    echo "New record created successfully!</br>";
    echo "<a href='student.php'>Back</a>";
}
else echo "Error: ".$sql."<br>".mysqli_error($conn);
mysqli_close($conn);
}
?>