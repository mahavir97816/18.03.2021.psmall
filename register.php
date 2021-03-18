<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>otp verification</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
<link rel="stylesheet" href="register.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">

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
  .login_btn{
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
<body id="body_gradient" style="font-family: Roboto,sans-serif;">
<!-- Header for back button and login text at top -->
<div class="header">
  <br>&emsp;
  <img onclick="goBack()" src="/img/arrow.png" width="25" height="25">

  <b style="margin-left:16px;margin-bottom:10px;font-size:20px;color:white;">Register</b>
</div>
<center> <div class="otp_msg"></div> </center>
<center>
		<!--html part start-->
			<form method="post">
			      <!-- phone number-->
  <input name="pnumber"  id="mob"   onkeypress="return onlyNumberKey(event)" style="background-image: url('/img/cell_phone.png');margin-top:30px;margin-left:px;outline:none;text-indent:45px" maxlength="13" autocomplete="off" type="text" placeholder="Mobile Number" required /><br>
			     <!-- otp-->
  <input id="otp"  onkeypress="return onlyNumberKey(event)" style="background-image: url('/img/otp.png');margin-top:30px;margin-left:px;outline:none;text-indent:45px;width:75%;" maxlength="6" autocomplete="off" type="text" placeholder="Varification Code" required />
  <input type="button" id="sendotp" value="OTP" class="btn btn-primary">
			    <br>			 			  
				 <!-- password-->
  <input id="pwd" name="passwd"  style="background-image: url('/img/key.png');margin-top:30px;margin-left:px;outline:none;text-indent:45px" maxlength="10" autocomplete="off" type="password" placeholder="Password" /><br>

<!-- recommendation code-->
<input id="rcode" name="reffral"  style="background-image: url('/img/gift_card.png');margin-top:30px;margin-left:px;outline:none;text-indent:45px" maxlength="10" autocomplete="off" type="text" placeholder="Recommendendation Code" /><br><br>

<input style="margin-left:25px;" type="checkbox" checked><b style="color:black;font-size=5px;">I read and agree to  </b><a href="home.html" style="text-decoration:none;color:purple;"> Terms & Conditions</a>
<br><br>
<!-- Register button -->
<button type="button" id="verifyotp" class="btn btn-primary">Register</button>

			</form>

				</center>	

				<br><br><br><br>
<!-- footer start -->
<div class="footer">

  <!-- home button in footer -->
  <button onclick="footer_home_color();location.href='home.php'" style="outline:none;margin-left:10%;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:30px;color:#696969"></i></button>

  <!-- My account button in footer -->
  <button  onclick="footer_my_color();location.href='my_account.php'" style="margin-right:10%;float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:30px;color:#696969"></i></button>


		<!-- html part ends-->

		<script type="text/javascript">
			
			$(document).ready(function(){


				function validate_mobile(mob){

					var pattern =  /^[6-9]\d{9}$/;

					if (mob == '') {

						return false;
					}else if (!pattern.test(mob)) {

						return false;
					}else{

						return true;
					}
				}


				//send otp function
				function send_otp(mob){

						var ch = "send_otp";
							
							$.ajax({

							url: "otp_process.php",
							method: "post",
							data: {mob:mob,ch:ch},
							dataType: "text",
							success: function(data){

								if (data == 'success') {
									
										timer();
									$('.otp_msg').html('<div class="alert alert-success">OTP sent successfully</div>').fadeIn();
										
										window.setTimeout(function(){
										$('.otp_msg').fadeOut();
									},1000)
										

								}else{

									$('.otp_msg').html('<div class="alert alert-danger">Error in sending OTP</div>').fadeIn();
										
										window.setTimeout(function(){
										$('.otp_msg').fadeOut();
									},1000)
								
								}
							}

						});
				}
				//end of send otp function


				//send otp function

				$('#sendotp').click(function(){

					var mob = $('#mob').val();

					

						if (validate_mobile(mob) == false) $('.otp_msg').html('<div class="alert alert-danger" style="position:absolute">Enter Valid mobile number</div>').fadeIn(); else 	send_otp(mob);

						window.setTimeout(function(){
							$('.otp_msg').fadeOut();
						},1000)
				
					});

				//end of send otp function


			//verify otp function starts

			$('#verifyotp').click(function(){

						
						var ch = "verify_otp";
						var otp = $('#otp').val();
						var pwd = $('#pwd').val();
						var rcode= $('#rcode').val();
						var mob = $('#mob').val();

						$.ajax({

							url: "otp_process.php",
							method: "post",
							data: {otp:otp,ch:ch,pwd:pwd,rcode:rcode,mob:mob},
							dataType: "text",
							success: function(data){

									if (data == "success") {

										goto_login();
																				
									}

									else if(data=="exist")
									{
										$('.otp_msg').html('<div class="alert alert-danger">Phone Aleady Exist</div>').show().fadeOut(4000);

									}

									else if(data=="wrong")
									{
										$('.otp_msg').html('<div class="alert alert-danger">Please Try Again Later!!</div>').show().fadeOut(4000);

									}
									
									else{

										$('.otp_msg').html('<div class="alert alert-danger">otp did not match</div>').show().fadeOut(4000);
									}
							}
						});
								

				});

			//end of verify otp function
			
			//goto login function
			function goto_login()
			{
				window.location.href="login.php"
			}

			//start of timer function

			function timer(){

					var timer2 = "00:31";
					var interval = setInterval(function() {


					  var timer = timer2.split(':');
					  //by parsing integer, I avoid all extra string processing
					  var minutes = parseInt(timer[0], 10);
					  var seconds = parseInt(timer[1], 10);
					  --seconds;
					  minutes = (seconds < 0) ? --minutes : minutes;
					  
					  seconds = (seconds < 0) ? 59 : seconds;
					  seconds = (seconds < 10) ? '0' + seconds : seconds;
					  //minutes = (minutes < 10) ?  minutes : minutes;
					  $('#sendotp').val(seconds);
					  $("#sendotp").attr("disabled", true);
					  //if (minutes < 0) clearInterval(interval);
					  if ((seconds <= 0) && (minutes <= 0)){
					  	clearInterval(interval);
						  $("#sendotp").removeAttr('disabled');
						  $('#sendotp').val('OTP');

					  } 
					  timer2 = minutes + ':' + seconds;
					}, 1000);

				}

				//end of timer


			});


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

  function goto_login(){
    window.location.href = "login.php";

  }

  function show_error(){
  document.getElementById("error_div").style.display ="block";
  }

  function check_num(){
  document.getElementById("check_div").style.display ="block";
  }

		</script>
</body>
</html>
