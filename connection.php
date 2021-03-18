<?php

$servername = "remotemysql.com";
$username = "asKiQhaRJh";
$password = "TqRXAJuaws";
$dbname = "asKiQhaRJh";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{

}

else
{
die("connection failed because".mysqli_connect_error());
}




?>
