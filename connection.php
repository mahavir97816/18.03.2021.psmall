<?php

$servername = "remotemysql.com";
$username = "tJJPWbfdfz";
$password = "8ZcA840G10";
$dbname = "tJJPWbfdfz";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{

}

else
{
die("connection failed because".mysqli_connect_error());
}




?>
