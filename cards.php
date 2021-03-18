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

  function goBack()
   {
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


</style>

</head>
<body id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">


<!-- Header for back button and login text at top -->
<div class="header">
  <br>&emsp;
  <img onclick="goBack()" alt="back" src="/img/arrow.png" width="25" height="25">

  <b style="margin-left:20px;margin-bottom:10px;font-size:25px;color:white">Bank Card</b>
</div>

<?php
    while($row = mysqli_fetch_array($run_bank_cards))
    {
      
      echo "<br>";
      echo "<table style='margin:%;color:yellow;' border='1px'>";
    
      echo "<tr>";

      echo "<th>";
      echo "NAME";
      echo "</th>";

      echo "<th>";
      echo "IFSC";
      echo "</th>";

      echo "<th>";
      echo "BANK NAME";
      echo "</th>";

      echo "<th>";
      echo "UPI ID";
      echo "</th>";
     
      echo "</tr>";
      echo "<tr>";


           
      echo "<td>";
      echo "&emsp;".($row['name']);  // name
      echo "</td>";

      echo "<td>";
      echo "&emsp;".($row['ifsc']);  // ifsc
      echo "</td>";

      echo "<td>";
      echo "&emsp;".($row['bank_name']);  // bank name
      echo "</td>";

      echo "<td>";
      echo "&emsp;".($row['upi_id']);  // upi
      echo "</td>";
     

      echo "</tr>";
      echo "</table>";
      
             
  }      

?>

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
