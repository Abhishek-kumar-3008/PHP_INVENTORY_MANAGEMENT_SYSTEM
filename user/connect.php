<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname="php_ims";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}else{
    // echo "connection succesfull";
}
?>
