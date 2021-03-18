<?php
include("connection.php");
session_start();
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
$q_promotion_records = "SELECT * from promotion where wallet_id = $id";
$run_promotion_records = mysqli_query($conn,$q_promotion_records);
$total_rows_found = mysqli_num_rows($run_promotion_records);
$promotion_records = mysqli_fetch_assoc($run_promotion_records);

$new_apply=mysqli_query($conn,"SELECT * from apply_bonus;");
$apply_id = mysqli_num_rows($new_apply);
$apply_id=$apply_id+1000+1;

?>
  
  
  
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PS CLUB</title>
<link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
<link rel="stylesheet" href="recharge.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>

  function apply_color(){
  document.getElementById("apply").style.backgroundImage = "url(/img/recharge1.png)";
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

  function hr1()
  {
  document.getElementById("hr1").style.visibility="";
  document.getElementById("hr2").style.visibility="hidden";
  document.getElementById("code").style.color ="grey";
  document.getElementById("hr3").style.border ="1px dashed grey";
  document.getElementById("pcode").style.color ="yellow";

  document.getElementById("link").style.color ="grey";
  document.getElementById("hr4").style.border ="1px dashed grey";
  document.getElementById("plink").style.color ="yellow";
  }

  function hr2()
  {
  document.getElementById("hr2").style.visibility="";
  document.getElementById("hr1").style.visibility="hidden";
  document.getElementById("code").style.color ="grey";
  document.getElementById("hr3").style.border ="1px dashed grey";
  document.getElementById("pcode").style.color ="yellow";
  document.getElementById("link").style.color ="grey";
  document.getElementById("hr4").style.border ="1px dashed grey";
  document.getElementById("plink").style.color ="yellow";
  }

  function hr3()
  {
  document.getElementById("hr1").style.visibility="hidden";
  document.getElementById("hr2").style.visibility="hidden";
  document.getElementById("code").style.color ="yellow";
  document.getElementById("hr3").style.border ="1px dashed yellow";
  document.getElementById("pcode").style.color ="red";
  document.getElementById("link").style.color ="grey";
  document.getElementById("hr4").style.border ="1px dashed grey";
  document.getElementById("plink").style.color ="yellow";
  }


  function hr4()
  {
  document.getElementById("hr1").style.visibility="hidden";
  document.getElementById("hr2").style.visibility="hidden";

  document.getElementById("link").style.color ="yellow";
  document.getElementById("hr4").style.border ="1px dashed yellow";
  document.getElementById("plink").style.color ="red";
  document.getElementById("code").style.color ="grey";
  document.getElementById("hr3").style.border ="1px dashed grey";
  document.getElementById("pcode").style.color ="yellow";
  }

</script>
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

  /*apply to balance button in the middle*/
  .apply_btn{
  background:#2196f3;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
  border-radius: 2px;
  }
  .apply_btn:hover{ /*when hover on login button change color*/
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
  .link_btn{
  background:#D3D3D3;
    border: none;
    color: black;
    padding: 11px 20px;
    text-align: center;
    text-decoration: none;
    font-size: 15px;
  border-radius: 2px;
  width:auto;
  }
  .link_btn:hover{ /*hower effect on reg & forgot pwd buttons*/
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



  .levels{

  width: 100%;
  height: 7%;
  }

  .level1{
  float:left;
  width: 50%;
  height: 100%;
  }

  .level2{
  float:right;
  width: 50%;
  height: 100%;

  }

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
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
    background-color: yellow;
    color: black;
  }

  .modal-body {padding: 2px 16px;}

  .modal-footer {
  text-align:center;
  margin-top:20px;
    padding: 2px 16px;
    background-color: yellow;
    color: white;
  }


  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }


</style>

</head>
<body id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">

<!-- Header for back button and login text at top -->
<div class="header">
  <br>&emsp;
  <img onclick="goBack()" alt="back" src="/img/arrow.png" width="25" height="25">

  <b style="margin-left:20px;margin-bottom:10px;font-size:25px;color:white">Promotion</b>
  <span style="font-size:30px;cursor:pointer;float:right;color:yellow" onclick="location.href='apply_record.php'">&#9776;</span>

</div>

<div id="error_div" style="background:red;float:center;display:none;;margin-top:12px;">
<p style="color:white;font-size:20px;margin:10px;">
Insufficient Balance!!
</p>
</div>

<p style="font-size:28px;text-align:center;margin-top:50px;color:yellow"><b>Bonus: &#8377;<?php echo $promotion_records['bonus']; ?></b></p>

<!-- apply to balance button -->
<p style="text-align:center;margin-top:30px;">
<input id="myBtn" type="button" style="width:auto;outline:none;"  class="apply_btn" value="apply to Balance">
</p>
<br>

<div  class="levels">
<div onclick=" hr1()" class="level1" style="text-align:center;color:yellow;">
<b id="level1" style="text-decoration:none;"> Level 1</b>
</div>

<div onclick=" hr2()" class="level2" style="text-align:center;color:yellow">
<b id="level1" style="text-decoration:none;"> Level 2</b>
</div>
</div>
<hr id="hr1" style="border:1px dashed yellow;width:48%;float:left;visibility:">
<hr id="hr2" style="border:1px dashed yellow;width:48%;float:right;visibility:hidden">

<br>
<div style="width:100%;height:10%">
<div style="float:left;width:50%;height:100%">
<p style="text-align:center;color:grey">Total People</p>
<p style="text-align:center;color:yellow"><b><?php echo $promotion_records['refrals']; ?></b></p>
</div>

<div style="float:right;width:50%;height:100%">
<p style="text-align:center;color:grey">Contribution</p>
<p style="text-align:center;color:yellow"><b>&#8377; <?php echo $promotion_records['refrals']*128; ?>  </b></p>
</div>
</div>
<br>

<div onclick="hr3()" style="background:;width:100%;height:10%">
<p  id="code" style="font-size:14px;color:grey">My Promotion Code</p>
<p id="pcode" style="font-size:16px;color:yellow"><?php echo $promotion_records['promotion_id']; ?>
<hr id="hr3" style="border:1px dashed grey;width:100%;">
</p>
</div>
<br>
<br>

<div onclick="hr4()" style="background:;width:100%;height:10%">
<p  id="link" style="font-size:14px;color:grey">My Promotion link</p>
<p id="plink" style="font-size:16px;color:yellow">http://localhost/insert/register.php?reffral=<?php echo $promotion_records['promotion_id']; ?>
<hr id="hr4" style="border:1px dashed grey;width:100%;">
</p>
</div>





<!-- open link buttons  -->
<p style="text-align:center;margin-top:10%;">
<input type="button" style="width:auto;outline:none;"  class="link_btn" value="Open Link">
</p>
<br><br>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Apply To Balance</h2>
    </div>
        
   <div class="modal-body" style="background:black;">
   <center>
<form action="" method="GET">
     
      <input id="apply" name="amt" onclick="apply_color()" onfocus="this.value=''" onkeypress="return onlyNumberKey(event)" style="margin-top:30px;margin-left:20px;outline:none;text-indent:45px" maxlength="13" autocomplete="off" type="text" placeholder="Bonus" required>
     <br><br> 

      
      <input style="outline:none" type="submit" name="submit" value="CONFIRM" class="apply_btn">
</form>
</center>
    </div>
  </div>

</div>

<?php
if(isset($_GET['submit']))
{
  $amount = $_GET['amt'];
  $p_id = $promotion_records['promotion_id'];
  $bonus = $promotion_records['bonus'];

  if($amount<=$bonus && $amount>=100)
  {
    
    $apply = mysqli_query($conn,"INSERT INTO apply_bonus values('$apply_id','$p_id','$amount','0')");

    if($apply)
    {
      $remaining_bonus = $promotion_records['bonus']-$amount;
      mysqli_query($conn,"UPDATE promotion set bonus='$remaining_bonus' where promotion_id=$id");
      
      echo '<script type="text/javascript">',
      'window.history.back();',
      '</script>';
    }

    else
    {
      echo '<script type="text/javascript">',
      'show_error"();',
      '</script>';
    }
  }
}


?>
 


<script>
  function goto_apply()
  {
  window.location.href = "login.php";
  }
  function show_error()
  {
  document.getElementById("error_div").style.display="block";
  }
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  document.getElementById("apply").value="";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
  document.getElementById("apply").value="";
    }
  }

</script>
<br><br>

<!-- footer start -->
<div class="footer">
  <!-- home button in footer -->
  <button onclick="footer_home_color();location.href='home.php'" style="outline:none;margin-left:10%;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:30px;color:#696969"></i></button>
  <!-- My account button in footer -->
  <button  onclick="footer_my_color(); location.href='my_account.php';" style="margin-right:10%;float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:30px;color:#696969"></i></button>
</div>

</body>
</html>
