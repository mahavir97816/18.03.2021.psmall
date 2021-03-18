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
  $q_bank_cards = "SELECT * from bank_cards where wallet_id = $id ";
  $run_bank_cards = mysqli_query($conn,$q_bank_cards);
  $total_rows_found = mysqli_num_rows($run_bank_cards);

?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PS CLUB</title>
<link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
<link rel="stylesheet" href="withdraw.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
  function recharge_color(){
  document.getElementById("amt").style.backgroundImage = "url(/img/recharge1.png)";
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

  function show() {
    window.location.href="cards.php";
  }



</script>
</head>
<style>

  /*login button in the middle*/
.login_btn{
background:#2196f3;
  border: none;
  color: white;
  padding: 14px 10px;
  text-align: center;
  text-decoration: none;
  font-size: 14px;
border-radius: 2px;
width:auto;
font-weight:bold;
}
.login_btn:hover{ /*when hover on login button change color*/
background:#33A1C9;
}

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


</style>

</head>
<body id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">


<!-- Header for back button and login text at top -->
<div class="header">
  <br>&emsp;
  <img onclick="goBack()" alt="back" src="/img/arrow.png" width="25" height="25">

  <b style="margin-left:20px;margin-bottom:10px;font-size:25px;color:white">Bank Card</b>
  <span onclick="location.href='add_card.php';" style="font-size:30px;cursor:pointer;float:right;color:yellow;margin:10px" onclick="href='#';">&#43; </span>
</div>

<?php
  if($total_rows_found==0) 
  {
    echo "<center style='margin:5%;color:yellow'>No Data Found!</center>";
    $button_visibility ="hidden";
  }

  else
  {
    
    while($row = mysqli_fetch_array($run_bank_cards))
    {
  
      echo "<br>";
      echo "<table style='margin:%;color:yellow;'>";
    
      echo "<tr>";
      echo "<td>";
      ?>
      <img style="float:left;" src="/img/bank_card.png" width="50" height="50"></img>
      <?php
      echo "</td>";

      echo "<td>";
      echo "&emsp;&emsp;".($row[1]);  // name
      echo "</td>";
      
      echo "<td>";
      echo "&emsp;".($row[4]);  // upi
      echo "</td>";

      echo "<td>";
      echo "&emsp;&emsp;&emsp;";
      echo "</td>";      

      echo "</tr>";
      

      echo "</table>";
      
    }           
  }      

?>

<center>
<button <?php echo $button_visibility;?> onclick="show();" style="outline:none;" class="login_btn">Show Cards</button>
</center>

<br><br><br>
<!-- footer start -->
<div id="footer" class="footer" >
<!-- home button in footer -->
<button onclick="footer_home_color();location.href='home.php'" style="outline:none;margin-left:10%;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:30px;color:#696969"></i></button>

<!-- My account button in footer -->
<button  onclick="footer_my_color(); location.href='my_account.php';" style="margin-right:10%;float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:30px;color:#696969"></i></button>
</div>
</body>
</html>
