<?php
include("connection.php");
session_start();
error_reporting();
$userphone = $_SESSION['phonenumber'];
if($userphone==true)
{

}

else
{
  header("location:login.php");
}
$query = "SELECT *from users where phone_number='$userphone'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$id = $_SESSION['id'];

$q_avail = "SELECT * from wallet where user_id = $id";
$run_q_avail = mysqli_query($conn,$q_avail);
$wallet_result = mysqli_fetch_assoc($run_q_avail);

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Ps Club</title>
<link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
<link rel="stylesheet" href="my_account.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
  function footer_home_color(){
  document.getElementById("f_home").style.color ="#2196f3";
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

  /*recharge button color change on hover function*/
  function recharge_color(){
  document.getElementById("recharge1").style.color ="#954697";
  document.getElementById("recharge").src = "/img/recharge1.png";
  }

  function recharge_color1(){
  document.getElementById("recharge1").style.color ="black";
  document.getElementById("recharge").src = "/img/recharge.png";
  }

  /*withdraw button color change on hover function*/
  function withdraw_color(){
  document.getElementById("withdraw1").style.color ="#954697";
  document.getElementById("withdraw").src = "/img/withdraw1.png";
  }

  function withdraw_color1(){
  document.getElementById("withdraw1").style.color ="black";
  document.getElementById("withdraw").src = "/img/withdraw.png";
  }

  /*transaction button color change on hover function*/
  function transaction_color(){
  document.getElementById("transaction1").style.color ="#954697";
  document.getElementById("transaction").src = "/img/transaction1.png";
  }

  function transaction_color1(){
  document.getElementById("transaction1").style.color ="black";
  document.getElementById("transaction").src = "/img/transaction.png";
  }


  /*bank card button color change on hover function*/
  function card_color(){
  document.getElementById("card1").style.color ="#954697";
  document.getElementById("card").src = "/img/card1.png";
  }

  function card_color1(){
  document.getElementById("card1").style.color ="black";
  document.getElementById("card").src = "/img/card.png";
  }

  /*Promotion button color change on hover function*/
  function promotion_color(){
  document.getElementById("promotion1").style.color ="#954697";
  document.getElementById("promotion").src = "/img/gift_card2.png";
  }

  function promotion_color1(){
  document.getElementById("promotion1").style.color ="black";
  document.getElementById("promotion").src = "/img/gift_card.png";
  }

  /*win button color change on hover function*/
  function win_color(){
  document.getElementById("win1").style.color ="#954697";
  document.getElementById("win").src = "/img/win1.png";
  }

  function win_color1(){
  document.getElementById("win1").style.color ="black";
  document.getElementById("win").src = "/img/win.png";
  }

  /*secure button color change on hover function*/
  function secure_color(){
  document.getElementById("secure1").style.color ="#954697";
  document.getElementById("secure").src = "/img/secure1.png";
  }

  function secure_color1(){
  document.getElementById("secure1").style.color ="black";
  document.getElementById("secure").src = "/img/secure.png";
  }

  /*about button color change on hover function*/
  function about_color(){
  document.getElementById("about1").style.color ="#954697";
  document.getElementById("about").src = "/img/about1.png";
  }

  function about_color1(){
  document.getElementById("about1").style.color ="black";
  document.getElementById("about").src = "/img/about.png";
  }



</script>

<!-- style section start -->
<style>
  /*iput fields icon color change to #954697*/
  /*text-indent:30px; to left the text in text fields*/

  /*Blue container for user info*/
  .header{
  background:#2196f3;
  display: run-in;
  width: auto;
  height: 35%;
  border-radius:4px;
  }

  /*Image holder div for user profile*/
  .image_holder{
  background:#2196f3;
  width: 4%;
  height: 25%;
  margin:15px;
  border-radius:20px;
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
  .logout_button{
  background:#003300;
    border: none;
    color: white;
    padding: 10px 14px;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
  border-radius: 2px;
  font-family:sans-serif;

  }
  .logout_button:hover{ /*when hover on login button change color*/
  background:#006600;
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
  width:auto
  }
  .footer_btn:hover{ /*when hover on footer buttons change color*/
  background:#C0C0C0;
  }

  /*reg & forgot pwd buttons*/
  .reg_btn{
  background:#D3D3D3;
    border: none;
    color: black;
    padding: 11px 15px;
    text-align: center;
    text-decoration: none;
    font-size: 15px;
  border-radius: 2px;
  width:10%;
  }
  .reg_btn:hover{ /*hower effect on reg & forgot pwd buttons*/
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
  width: auto;
  height: 7%;
  }

  .drop_down:hover{ /*hower effect buttons*/
  background:#E0E0E0;
  }


</style>

</head>
<body id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">

<div class="header">

<div class="image_holder">
<img style="margin-top:10px" src="/img/man.png" height="50px" width="50px"></img> 
</div><b>
<p style="color:white;margin:20px"> User: <?php echo $result['user_id']; ?><br><br>Mobile: <?php echo $userphone; ?><br><br>Available balance: &#8377;<?php echo $wallet_result['available_balance']; ?><b><br><br>
</p>
</div>

<hr style="color:grey">


<div onmouseover="recharge_color()" onmouseout="recharge_color1()" onclick="location.href='recharge.php';" class="drop_down">
<img id="recharge" style="margin:8px" src="/img/recharge.png" height="30px" width="30px"></img> <b id="recharge1" style="float:right;margin:10px" >Recharge</b>
</div>

<div onmouseover="withdraw_color()" onmouseout="withdraw_color1()" onclick="location.href='withdraw.php';" class="drop_down" style="margin-top:10px;">
<img id="withdraw" style="margin:8px" src="/img/withdraw.png" height="30px" width="30px"></img> <b id="withdraw1" style="float:right;margin:10px" >Withdrawal</b>
</div>
<!--
<div onmouseover="transaction_color()" onmouseout="transaction_color1()" class="drop_down" style="margin-top:10px;">
<img id="transaction" style="margin:8px" src="/img/transaction.png" height="30px" width="30px"></img> <b id="transaction1" style="float:right;margin:10px" >Transaction</b>
</div>
-->
<div onclick="location.href='bank_card.php';" onmouseover="card_color()" onmouseout="card_color1()" class="drop_down" style="margin-top:10px;">
<img id= "card" style="margin:8px" src="/img/card.png" height="30px" width="30px"></img> <b id="card1" style="float:right;margin:10px" >Bank Card</b>
</div>

<div onmouseover="promotion_color()" onmouseout="promotion_color1()" onclick="location.href='promotion.php';" class="drop_down" style="margin-top:10px;">
<img id="promotion" style="margin:8px" src="/img/gift_card.png" height="30px" width="30px"></img> <b id="promotion1" style="float:right;margin:10px" >Promotion</b>
</div>

<div onmouseover="win_color()" onmouseout="win_color1()" class="drop_down" style="margin-top:10px;" onclick="location.href='win.php'">
<img id="win" style="margin:8px" src="/img/win.png" height="30px" width="30px"></img> <b id="win1" style="float:right;margin:10px" >Play & Win</b>
</div>

<div onmouseover="secure_color()" onmouseout="secure_color1()" onclick="location.href='forgotPassword.php'" class="drop_down" class="drop_down" style="margin-top:10px;">
<img id="secure" style="margin:8px" src="/img/secure.png" height="30px" width="30px"></img> <b id="secure1" style="float:right;margin:10px">Security</b>
</div>

<div onmouseover="about_color()" onmouseout="about_color1()" class="drop_down" style="margin-top:10px;">
<img id="about" style="margin:8px" src="/img/about.png" height="30px" width="30px"></img> <b id="about1" style="float:right;margin:10px">About Us</b>
</div>

<p style="text-align:center;margin-top:30px;">
<a href="logout.php" onclick="return confirm('Do you want to logout?')" style="width:70px;outline:none;" class="logout_button" >Logout</a>
</p>

<br><br><br>




<!-- footer start -->
<div class="footer">


<!-- home button in footer -->
<button onclick="footer_home_color();location.href='home.php'" style="outline:none;margin-left:10%;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:30px;color:#696969"></i></button>

<!-- My account button in footer -->
<button  onclick="footer_my_color();location.href='my_account.php'" style="margin-right:10%;float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:30px;color:#696969"></i></button>

</div>

</body>
</html>