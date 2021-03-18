<?php
include("connection.php");
session_start();
error_reporting();

$admin_id = $_SESSION['admin_id'];
$dept = $_SESSION['dept'];

if($dept==0)
{
mysqli_query($conn,"UPDATE recharge_dept set status='0' where admin_id = '$admin_id'");
mysqli_query($conn,"UPDATE recharge_upi set status='0' where admin_id = '$admin_id'");
session_destroy();
header("location:admin_login.php");
}

else if($dept==1)
{
mysqli_query($conn,"UPDATE promotion_dept set status='0' where admin_id = '$admin_id'");
session_destroy();

header("location:admin_login.php");
}

else if($dept==2)
{
mysqli_query($conn,"UPDATE withdraw_dept set status='0' where admin_id = '$admin_id'");
session_destroy();

header("location:admin_login.php");
}


?>