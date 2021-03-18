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
$q_apply_records = "SELECT * from apply_bonus where promotion_id = $id order by apply_id";
$run_apply_records = mysqli_query($conn,$q_apply_records);
$total_rows_found = mysqli_num_rows($run_apply_records);

?>


<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PS CLUB</title>
  <link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
  <link rel="stylesheet" href="recharge.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>

    function goBack() {
      window.history.back();
    }
  </script>

  <style>

    /*text-indent:30px; to left the text in text fields*/
    .header
    {
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
<body id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">

<!-- Header for back button and login text at top -->
<div class="header">
<br>&emsp;
<img onclick="goBack()" alt="back" src="/img/arrow.png" width="25" height="25">
<b style="margin-left:20px;margin-bottom:10px;font-size:25px;color:white">Apply Record</b>
</div>


<?php
if($total_rows_found==0)
{
  echo "<center style='margin:5%;color:yellow'>No Data Found!</center>";
}

else
{
 
  while($row = mysqli_fetch_array($run_apply_records))
  {
  
    if($row[3]==0)
    {
      $status = "/img/recharge_wait.png";
      $status_tag = "Wait";
    }

    else
    {
      $status = "/img/recharge_done.png"; 
      $status_tag = "Success";
    }

    echo "<table style='margin:%;color:yellow;'>";
    echo "<tr>";

    echo "<td >";
    ?>
    <img style="float:left;" src="<?php echo $status;?>" width="50" height="50">
    <?php
    echo "</td>";

    echo "<td>";
    echo "&emsp;".($row[2]);  // amount
    echo "</td>";

    echo "<td>";
    echo "&emsp;".$status_tag;  // status_tag
    echo "</td>";
    
    echo "</tr>";
    echo "<br>";

    echo "</table>";
  }            
}      
?>
 



<br><br><br>
<!-- footer start -->
<div class="footer">

  <!-- home button in footer -->
  <button onclick="location.href='home.php';" style="outline:none;margin-left:10%;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:30px;color:#696969"></i></button>

  <!-- My account button in footer -->
  <button  onclick="location.href='my_account.php';" style="margin-right:10%;float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:30px;color:#696969"></i></button>
</div>

</body>
</html>
