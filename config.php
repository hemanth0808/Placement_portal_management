<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$host="localhost";
    $user="root";
    $password="";
    $db='miniproject';
    $conn=mysqli_connect($host,$user,$password,$db);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>