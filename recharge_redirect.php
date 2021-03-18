<?php
session_start();
include("connection.php");
error_reporting(0);
$userphone = $_SESSION['phonenumber'];

if($userphone==true)
{

}

else
{
    header("location:login.php");
}


$id = $_SESSION['id'];
$order = $_SESSION['order_number'];
$r_upi = $_SESSION['upi']; 


$q= "SELECT * from recharge where order_number = $order";
$d = mysqli_query($conn,$q);
$result = mysqli_fetch_assoc($d);

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PS CLUB</title>
<link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>

/*text-indent:30px; to left the text in text fields*/
.header{
background:blue;
float:center;
width: auto;
height: 62px;
margin:-10px;
}


</style>

</head>
<body id="body_gradient">

<!-- Header for back button and login text at top -->
<div class="header">
<br>

<b style="margin-left:20px;margin-bottom:10px;font-size:25px;color:white">UPI Transfer</b>
</div>

<center style="font-size:22px;margin:20px;"><img src="/img/upi.jpg" height="150px" width="300px"></img></center>
<center style="color:grey;font-size:18px;margin:px;">Order Number: <?php echo $result['order_number'];?> </center>
<center style="color:Yellow;font-size:18px;margin:20px;">Tip:Use Your UPI App to Copy and Paste the Following UPI Account Number and Amount to Transfer to it.</center>
<center style="font-weight:bold;color:Red;font-size:18px;margin:20px;">Please Do Not Modify Your Transfer Amount, Otherwise We Will Not Be Able To Recharge!</center>



<div style="background:#E5E5E5;float:left;width:50%;">
<p style="text-align:left;margin:5px">UPI</p>
</div>
<div style="background:#E5E5E5;float:right;width:50%;">
<p id="upi" style="text-align:right;margin:5px"><?php echo $r_upi; ?></p>
</div>
<div style="background:#E5E5E5;float:left;width:50%;">
<p style="text-align:left;margin:5px">Amount</p>
</div>
<div style="background:#E5E5E5;float:right;width:50%;">
<p id="amt" style="text-align:right;margin:5px">&#8377; <?php echo $result['recharege_amount'];?></p>
</div>

<script>


    var trig = setInterval(timer,1000);
    var counter=0;
    var min=4;
    var sec=60;

    function timer()
    {
        
        sec=--sec;
        
        if(sec===0)
        {
            min=--min;
            sec=59;
            counter=++counter;
        }
       

        if(counter===5)
        {
        sec=0;
        min=0;
        clearInterval(trig);
        window.location.href="my_account.php";

     }

     
        document.getElementById("timer").innerHTML = min+" m "+sec+"s";
        
        
    }
</script>
<br><br><br>
<center>
<p id="timer" style="color:yellow;font-weight:bold;font-size:25px"></p>
</center>





<br><br><br>



</body>
</html>
