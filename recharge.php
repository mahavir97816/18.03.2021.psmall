<?php
session_start();
error_reporting(0);
include("connection.php");

$userphone = $_SESSION['phonenumber'];
if($userphone==true)
{

}

else
{
    header("location:login.php");
}

$id = $_SESSION['id'];
$q_avail = "SELECT * from wallet where user_id = $id";
$run_q_avail = mysqli_query($conn,$q_avail);
$wallet_result = mysqli_fetch_assoc($run_q_avail);


?>


<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PS CLUB</title>
  <link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
  <link rel="stylesheet" href="recharge.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>

  function recharge_color(){
  document.getElementById("amt").style.backgroundImage = "url(/img/recharge1.png)";
  }


  function footer_home_color(){
  document.getElementById("f_home").style.color ="#2196f3";
  }

  function chennal_color(){
  document.getElementById("tick").style.color ="#954697";
  }

  function footer_my_color(){
  document.getElementById("f_my").style.color ="#2196f3";
  }

  function onlyNumberKey(evt) { 
            
          // Only ASCII charactar in that range allowed 
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
              return false; 
          return true; 
      } 

  function goBack() {
    window.history.back();
  }
  var count=0;
  function amount(){
  if(count==1){
  document.getElementById("amt").value ="100";
  }

  else if(count==2){
  document.getElementById("amt").value ="300";
  }

  else if(count==3){
  document.getElementById("amt").value ="500";
  }

  else if(count==4){
  document.getElementById("amt").value ="1000";
  }

  else if(count==5){
  document.getElementById("amt").value ="2000";
  }

  else if(count==6){
  document.getElementById("amt").value ="5000";
  }

  else if(count==7){
  document.getElementById("amt").value ="10000";
  }
  }

  // When page load open popup 
  function popup(){
    modal.style.display = "block";
  }
  </script>
  </head>
  <style>

  /*text-indent:30px; to left the text in text fields*/
  .header{
  background:blue;
  float:center;
  width:auto;
  height: 62px;
  margin:-10px;
  }
  /*container for footer buttons*/
  .footer{
  position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
  height:auto;
    background-color: white;
    color: grey;
    text-align: left;
  }

  /*login button in the middle*/
  .recharge_btn{
  background:#2196f3;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
  border-radius: 2px;
  font-weight : bold ;
  }
  .recharge_btn:hover{ /*when hover on login button change color*/
  background:#33A1C9;
  }

  /*buttons in the footer*/
  .footer_btn{
  background:white;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
  border-radius: 2px;
  width:auto;
  }
  .footer_btn:hover{ /*when hover on footer buttons change color*/
  background:#C0C0C0;
  }

  /*ammount buttons*/
  .amt_btn{
  background:#D3D3D3;
    border: none;
    color: black;
    padding: 11px 20px;
    text-align: center;
    text-decoration: none;
    font-size: 15px;
  border-radius: 2px;
  width:10%;
  }
  .amt_btn:hover{ /*hower effect on reg & forgot pwd buttons*/
  background:#A9A9A9;
  }


  /*div which have centererd elements*/
  .center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px;
    border: none; 
  }

  .drop_down{
  background:#F5F5F5;
  width: 95%;
  height: 7%;
  box-shadow: 1px 1px 1px 1px #909090;
  }

  .drop_down:hover{ /*hower effect buttons*/
  background:#E0E0E0;
  }



  </style>

</head>
<body id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">

<!-- Header for back button and login text at top -->
<div class="header">
<br>&emsp;

<img onclick="goBack()" alt="back" src="/img/arrow.png" width="25" height="25">

<b style="margin-left:20px;margin-bottom:10px;font-size:25px;color:white">Recharge</b>
<span style="font-size:30px;cursor:pointer;float:right;color:yellow" onclick="location.href='recharge_record.php'">&#9776;</span>

</div>

<p style="font-size:28px;text-align:center;margin-top:50px;color:yellow"><b>Balance:&#8377; <?php echo $wallet_result['available_balance']; ?></b></p>

<!-- select amount buttons --> 
<p style="text-align:center;margin-left:1%;">
<input type="button" style="width:auto;outline:none;"  onclick="count=1;amount();" class="amt_btn" value="&#8377;100">

<input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="count=2;amount();"  class="amt_btn" value="&#8377;300">

<input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="count=3;amount();"  class="amt_btn" value="&#8377;500">

<input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="count=4;amount();"  class="amt_btn" value="&#8377;1000">

<input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="count=5;amount();"  class="amt_btn" value="&#8377;2000">

<input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="count=6;amount();"  class="amt_btn" value="&#8377;5000">

<input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="count=7;amount();" class="amt_btn" value="&#8377;10000">
</p>
<!-- text fields for amount-->
<form action="" method="POST">
<center>
<input id="amt" name="amount"  onclick="recharge_color()" onkeypress="return onlyNumberKey(event)" style=" box-shadow: 1px 1px 1px 1px #909090;margin-top:30px;margin-left:2%;outline:none;text-indent:45px" maxlength="10" autocomplete="off" type="text" placeholder="Enter or Select recharge amount" required>
<br>


<!-- text fields for upi id -->
<input id="phone" name="upi_id"  onclick="phone_color()"  style="margin-top:30px;margin-left:2%;outline:none;text-indent:45px"  autocomplete="off" type="text" placeholder="Enter Your UPI ID" required><br>
</center>
<!-- submit button -->

<!-- recharge button -->
<p style="text-align:center;margin-bottom:10%">
<input type="submit" style="width:auto;outline:none;" name="submit"  class="recharge_btn" value="Recharge">
</p>
</form>

<script>
function redirected(){
  window.location.href = "recharge_redirect.php";

}
</script>

<?php

if(isset($_POST['submit']))
{
  //finding upi id 
  $r_upi = mysqli_query($conn,"SELECT * FROM recharge_upi where status='1'");
  $rows_found = mysqli_num_rows($r_upi);
  
  if($r_upi)
  {

    if($rows_found==0)
    {
      echo '<script>alert("No Merchant available. Please Try Again Later!")</script>';

    }

    else
    {
      $i=-1;
      while($row = mysqli_fetch_array($r_upi))
      {  
        $i++;
        $cards[$i]=$row['upi_id'];
      } 

      // storing form data into variables
      $r_amt= $_POST['amount'];
      $upi_id = $_POST['upi_id'];
      date_default_timezone_set("Asia/Kolkata");
      $date = date('Y-m-d H:i:s');

      //to find the order number.
      $q= "SELECT * from recharge";
      $d = mysqli_query($conn,$q);
      $order= mysqli_num_rows($d);
      $order = $order+1; //total records + 1 will be the new order number.


      $r_query = "INSERT into recharge values('$order','$id','$upi_id','$r_amt','$date','0')";
      $r_data = mysqli_query($conn,$r_query);

      if($r_data)
      {
        $_SESSION['upi'] = $cards[0];
        $_SESSION['order_number'] = $order;
        //if data inserted succesfuly , goto login page
        echo '<script type="text/javascript">',
        'redirected();',
        '</script>';

      }

    }

  }
}



?>


<p style="text-align:left;margin-left:5%;color:yellow">Tips:Please contact psclub@gmail.com if you have any questions about the order or payment failure.</p>









<!--
<div  onclick="chennal_color()" class="drop_down" style="margin-top:30px;margin-left:2%;outline:none;">
<b id="tick" style="float:left;margin:2%;font-size:25px" >&check;</b><b style="float:left;margin:16px;font-size:100%">recharge--upi--chennal(100-10000)</b>
</div>
-->








 



<br><br><br>
<!-- footer start -->
<div class="footer">

<!-- home button in footer -->
<button onclick="footer_home_color();location.href='home.php'" style="outline:none;margin-left:10%;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:30px;color:#696969"></i></button>

<!-- My account button in footer -->
<button  onclick="footer_my_color(); location.href='my_account.php';" style="margin-right:10%;float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:30px;color:#696969"></i></button>
</div>

</body>
</html>
