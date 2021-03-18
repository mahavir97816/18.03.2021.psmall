<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PS CLUB</title>
<link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
<link rel="stylesheet" href="withdraw.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--
<p>"the value for number is: "  <script type="text/javascript">
        document.write(token=1)
      </script></p>
-->
<script>

function footer_home_color(){
document.getElementById("f_home").style.color ="#2196f3";
}

function chennal_color(){
document.getElementById("tick").style.color ="#954697";
}

function footer_my_color(){
document.getElementById("f_my").style.color ="#2196f3";
}

function goBack() {
  window.history.back();
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
display:block;
position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
height:auto;
   background-color: white;
   color: grey;
   text-align: left;
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



/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  margin-left:3%;
  padding-top: 150px; /* Location of the box */
  top: 0;
  width: 90%; /* Full width */
  height: auto; /* Full height */
  overflow: auto; /* Enable scroll if needed */


}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}


</style>
</head>
<body onload="popup()" id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">


<!-- Header for back button and login text at top -->
<div class="header">
<br>&emsp;
<img onclick="goBack()" alt="back" src="/img/arrow.png" width="25" height="25">
<br>

<p style="text-align:center;color:yellow;font-size:30px;">Welcome</p>



<!--
<video autoplay muted loop id="myVideo">
  <source src="/img/bg.mp4" type="video/mp4">
</video> 
-->
<center>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Notice</h2>
    </div>
    <div class="modal-body">
    <p>Dear PS Club members: Happy New Year 2021, club recharge and withdrawal work 7 * 24 hours. Please don’t trust the link sent to you by strangers. They may send you a virus or fake website. If you click into it, your funds may losses. Please look for the only website of the PS Club: www.psclubs.com, Our in-depth cooperation with the government will always protect your financial security. If you have any questions, please prepare relevant screenshots and send an email to PS club psclub.help@gmail.com<p>


    </div>
    
  </div>

</div>
</center>


<script>
// Get the modal
var modal = document.getElementById("myModal");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Whenp page load open popup 
function popup(){
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
 document.getElementById("apply").value="";
}
</script>



<!-- footer start -->
<div id="footer" class="footer" >
<!-- home button in footer -->
<button onclick="footer_home_color();location.href='home.php'" style="outline:none;margin-left:10%;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:30px;color:#696969"></i></button>

<!-- My account button in footer -->
<button  onclick="footer_my_color(); location.href='my_account.php';" style="margin-right:10%;float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:30px;color:#696969"></i></button>
</div>
</body>
</html>
