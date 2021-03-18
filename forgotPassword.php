<?php
include("connection.php");
error_reporting(0);
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PS CLUB</title>
  <link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
  <link rel="stylesheet" href="forgotPassword.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
  function phone_color(){
  document.getElementById("phone").style.backgroundImage = "url(/img/cell_phone2.png)";
  }

  function pwd_color(){
  document.getElementById("pwd").style.backgroundImage = "url(/img/key2.png)";
  }

  function otp_color(){
  document.getElementById("otp").style.backgroundImage = "url(/img/otp2.png)";
  }



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



  </script>
  </head>
  <style>
  /*icon color change to #954697*/

  /*text-indent:30px; to left the text in text fields*/
  .header{
  background:blue;
  float:center;
  width: auto;
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
  .continue_btn{
  background:#2196f3;
    border: none;
    color: white;
    padding: 14px 14px;
    text-align: center;
    text-decoration: none;
    font-size: 17px;
  border-radius: 2px;
  width:15%;

  }
  .continue_btn:hover{ /*when hover on login button change color*/
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

  /*reg & forgot pwd buttons*/
  .otp_btn{
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
  .otp_btn:hover{ /*hower effect on reg & forgot pwd buttons*/
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


  </style>

</head>
<body id="body_gradient" style="font-family: Roboto,sans-serif;">

<!-- Header for back button and login text at top -->
<div class="header">
<br>&emsp;
<img onclick="goBack()" src="/img/arrow.png" width="25" height="25">

<b style="margin-left:16px;margin-bottom:10px;font-size:20px;color:white;">Reset Password</b>
</div>

<center>
<form action="" method="POST">
<!-- phone number-->
<input id="phone" name="phone" onfocus="this.value='+91'" onclick="phone_color()" onkeypress="return onlyNumberKey(event)" style="background-image: url('/img/cell_phone.png');margin-top:30px;margin-left:%;outline:none;text-indent:45px" maxlength="13" autocomplete="off" type="text" placeholder="Mobile Number" required><br>

<!-- varification code-->
<input id="otp" name="otp" onclick="otp_color()" onkeypress="return onlyNumberKey(event)" style="background-image: url('/img/otp.png');margin-top:30px;margin-left:%;outline:none;text-indent:45px;width:75%;" maxlength="6" autocomplete="off" type="text" placeholder="Varification Code" required>
<button style="width:auto;outline:none;" class="otp_btn">OTP</button>

<!--New password-->
<input id="pwd" name="pass"  onclick="pwd_color()" style="background-image: url('/img/key.png');margin-top:30px;margin-left:%;outline:none;text-indent:45px" maxlength="10" autocomplete="off" type="password" placeholder="New Password" required><br>
<br><br>
<!-- Continue button -->
<input type="submit" name="submit" style="width:250px;outline:none;"  class="continue_btn" value="Continue">

 
 </form>
 </center>

<?php
if(isset($_POST['submit']))
{

  // storing form data into variables
  $phone = $_POST['phone'];
  $new_pwd = $_POST['pass'];

  //checking if number already exist or not
  $check_query = "SELECT * from users where phone_number='$phone'";
  $checking = mysqli_query($conn,$check_query);
  $rows_found = mysqli_num_rows($checking);

  if($rows_found==0)
  {
    //if 1 row found,means number exist.So show error message
    echo '<script>alert("User Not Found")</script>';

  }


  else
  {
    //checking form blocked account
    $check_flag = mysqli_query($conn,"SELECT * FROM users WHERE phone_number=$phone");
    $status = mysqli_fetch_assoc($check_flag);

    if($status['flag']==1)
    {
      $update = mysqli_query($conn,"UPDATE users set password='$new_pwd' where phone_number=$phone");

      if($update)
      {
        echo '<script type="text/javascript">',
        ' window.location.href = "login.php";',
        '</script>';
      }
      else
      {
        echo '<script>alert("Please Try Again Later!")</script>';

      }
    }
    else
    {
      
      echo '<script type="text/javascript">',
      ' window.location.href = "login.php";',
      '</script>';  
    }
  }


}
?>

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
