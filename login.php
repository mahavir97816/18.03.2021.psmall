<?php
session_start();
include("connection.php");
error_reporting();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PS CLUB</title>
<link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
function phone_color(){
document.getElementById("phone").style.backgroundImage = "url(/img/cell_phone2.png)";
}

function pwd_color(){
document.getElementById("pwd").style.backgroundImage = "url(/img/key2.png)";
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

function show_error(){
document.getElementById("error_div").style.display ="block";
}

</script>
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
.login_btn{
background:#2196f3;
  border: none;
  color: white;
  padding: 14px 14px;
  text-align: center;
  text-decoration: none;
  font-size: 14px;
border-radius: 2px;
width:15%;
}
.login_btn:hover{ /*when hover on login button change color*/
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


</style>

</head>
<body id="body_gradient">

<!-- Header for back button and login text at top -->
<div class="header">
<br>&emsp;
<img onclick="goBack()" src="/img/arrow.png" width="25" height="25">

<b style="margin-left:20px;margin-bottom:10px;font-size:25px;color:white">Login</b>
</div>

<div id="error_div" style="background:red;float:center;display:none;;margin-top:12px;">
<p style="color:white;font-size:20px;margin:10px;">
Mobile Number or Password Wrong!
</p>
</div>


<form action="" method="post">
<!-- text fields for password & number -->
<ceter>
<input id="phone" name="pnumber"  onclick="phone_color()" onkeypress="return onlyNumberKey(event)" style="margin-top:30px;margin-left:2%;outline:none;text-indent:45px" maxlength="10" autocomplete="off" type="text" placeholder="Mobile Number" required><br>
<input id="pwd" name="passwd" onclick="pwd_color()" style="margin-top:30px;margin-left:2%;outline:none;text-indent:50px;" maxlength="10" autocomplete="off" type="password" placeholder="Password" required><br>
</center>
<!-- login button -->

<p style="text-align:center;margin-top:30px;">
<input type="submit" style="font-weight:bold;font-size:17px;width:250px;outline:none;" name="submit" class="login_btn" value="Login">
</p>

</form>

<?php
if(isset($_POST['submit']))
{
  $phone = $_POST['pnumber'];
  $passwd = $_POST['passwd']; 

   //checking the username and passwords from database
  $query = "SELECT * from users where phone_number='$phone' && password='$passwd'";
  $data = mysqli_query($conn,$query);
  $total = mysqli_num_rows($data);
  $result = mysqli_fetch_assoc($data);
  

  if($result['flag']==1 && $total==1)
  {
    session_regenerate_id();
    $_SESSION['phonenumber'] = $result['phone_number'];
    $_SESSION['id']=$result['user_id'];
    $_SESSION['pass'] = $result['password'];

    session_write_close();


    
    
    header('location:my_account.php');
  }

  else 
  {
    
    echo '<script type="text/javascript">',
    'show_error();',
    '</script>';

  }

}

else
{
  echo "<script>aleart('Please Try Again Later!!');</script>";
}
  


?>




<!-- register button -->
<p style="text-align:center;"><input type="button" style="width:auto;outline:none;" onclick="location.href='register.php';" class="reg_btn" value="Register">

<!-- Forgot Password button -->
<input type="button" style="width:auto;outline:none;" onclick="location.href='forgotPassword.php';"  class="reg_btn" value="Forgot Password?"></p>

<br><br><br>
<!-- footer start -->
  <div class="footer">
  <!-- home button in footer -->
  <button onclick="footer_home_color();location.href='home.php'" style="outline:none;margin-left:10%;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:30px;color:#696969"></i></button>
  <!-- My account button in footer -->
  <button  onclick="location.href='my_account.php';" style="margin-right:10%;float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:30px;color:#696969"></i></button>

  </div>







</body>
</html>
