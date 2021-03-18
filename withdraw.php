<?php
include("connection.php");
session_start();
error_reporting(0);

$userphone = $_SESSION['phonenumber'];
$key = $_SESSION['pass'];
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

$checking = "SELECT * from bank_cards where wallet_id=$id";
$check_run = mysqli_query($conn,$checking);
$total_cards_found = mysqli_num_rows($check_run);

?>
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
  function insufficient_balance(){
  document.POSTElementById("insufficient_balance").style.display ="block";
  }

  function less(){
  document.POSTElementById("less").style.display ="block";
  }


  function wrong(){
  document.POSTElementById("wrong").style.display ="block";
  }

    function recharge_color(){
    document.POSTElementById("amt").style.backgroundImage = "url(/img/recharge1.png)";
    }
    function goBack() {
      window.history.back();
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

    /*apply to balance button in the middle*/
    .withdrawal_btn{
    background:#2196f3;
      border: none;
      color: white;
      padding: 10px 10px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
    border-radius: 2px;
    }

    .withdrawal_btn:hover{ /*when hover on login button change color*/
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

    .drop_down{
    background:#F5F5F5;
    width: 95%;
    height: 45px;
    }

  </style>

</head>
<body id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">
 
<!-- Header for back button and login text at top -->
<div class="header">
<br>&emsp;
<img onclick="goBack()" alt="back" src="/img/arrow.png" width="25" height="25">

<b style="margin-left:20px;margin-bottom:10px;font-size:25px;color:white">Withdrawal</b>
<span style="font-size:30px;cursor:pointer;float:right;color:yellow" onclick="location.href='withdrawal_record.php';">&#9776; </span>
</div>

<div id="insufficient_balance" style="background:red;float:center;display:none;height:40px;margin-top:12px;">
  <p style="color:white;font-size:20px;margin:10px;">
  INSUFFICIENT BALANCE!!
  </p>
</div>

<div id="less" style="background:red;float:center;display:none;height:40px;margin-top:12px;">
  <p style="color:white;font-size:20px;margin:10px;">
  Amount Must Be Greater than &#8377;230
  </p>
</div>

<div id="wrong" style="background:red;float:center;display:none;height:40px;margin-top:12px;">
  <p style="color:white;font-size:20px;margin:10px;">
  Wrong Password!!
  </p>
</div>


<p style="font-size:28px;text-align:center;margin-top:50px;color:yellow"><b>Balance:&#8377; <?php echo $wallet_result['available_balance']; ?></b></p>

<!-- text field for amount-->
<form action="" method="POST">
<center>
<input id="amt" name="amt"  onclick="recharge_color()" style="margin-top:30px;margin-left:2%;outline:none;text-indent:45px" maxlength="10" autocomplete="off" type="text" placeholder="Enter withdrawal amount" required>
</center>
<p style="color:grey;margin-left:4%"><b>Payout</b></p>

<center>
<div class="drop_down" style="margin-top:30px;margin-left:2%;outline:none;">
<b style="float:left;margin:16px;font-size:100%"> &check; upi-withdrawal(330-50000)</b>
</div>
</center>
<br>

<?php
  $i=-1;
  while($row = mysqli_fetch_array($check_run))
  {  
    $i++;
      $cards[$i]=$row['name'];
      $i++;
      $cards[$i]=$row['upi_id'];
  }            
      
?>

<center>
<select  id="myselect" name="myselect" class="drop_down" style="font-weight:bold;color:red;background:white;margin-top:1px;margin-left:2%;outline:none;font-size:15px;" required>

  <option hidden  <?php  
  if($total_cards_found==0)
  {
    echo "selected";
  }

  else
  {
    
  }?>>&emsp;&emsp;BANK CARD</option>

  //showing card 1 if exist
  <option value="1" style="color:green;" <?php  
  if($total_cards_found==0)
  {
    echo "hidden";
  }

  else
  {
    echo "selected";

  }?>>

  <?php

  echo "<table style='margin:%;color:yellow;'>";

  echo "<tr>";

  echo "<td>";
  echo "&emsp;";
  echo "</td>";

  echo "<td>";
  print_r( $cards[0] ); //name given in card 1
  echo "</td>";

  echo "<td>";
  echo "&emsp;";
  echo "</td>";

  echo "<td>";
  print_r( $cards[1] ); //upi given in card 1
  echo "</td>";

  echo "</tr>";


  echo "</table>";

  ?>

  </option>
  //showing card 2 if exist
  <option value="2" style="color:green;" <?php  
  if($total_cards_found<2)
  {
    echo "hidden";
  }

  else
  {
    
  }?>>
  <?php
  echo "<table style='margin:%;color:yellow;'>";

  echo "<tr>";

  echo "<td>";
  echo "&emsp;";
  echo "</td>";

  echo "<td>";
  print_r( $cards[2] ); //name in card 2
  echo "</td>";

  echo "<td>";
  echo "&emsp;";
  echo "</td>";

  echo "<td>";
  print_r( $cards[3] ); //upi in card 2
  echo "</td>";

  echo "</tr>";


  echo "</table>";

  ?>
  </option>

  //if card not exist asking to add.
  <option style="color:green;" <?php  
  if($total_cards_found==0)
  {
    echo "";
  }

  else
  {
    echo "hidden";

  }?> > &emsp;Please Add A Bank Card To Withdraw!</option>
</select>
</center>





<script>
  var ind = document.POSTElementById("myselect").selectedIndex;

if(ind==3)
{
  window.location.href = "login.php";

}
</script>
<br>
<lable id="pass" style="color:grey;font-size:15px;float:left;margin-left:3%">Enter your login Password</lable><br>
<center>
<input id="password" name="pwd" style="margin-top:2px;margin-left:2%;outline:none;backgroundImage:'url(/img/recharge1.png)';color:yellow;padding:10px 10px;background:none;" autocomplete="off" type="text" required>
<br><br>
<input type="submit" name="submit" style="outline:none" class="withdrawal_btn" value="Withdrawal"> 
</center>
</form>

<?php
if(isset($_POST['submit']))
{
  $amount = $_POST['amt'];
  $select= $_POST['myselect'];
  $balance = $wallet_result['available_balance'];
  $pass = $_POST['pwd'];
  if($balance>0 && $balance>=$amount)
  {
    if($amount>=230)
    {
      if($pass == $key)
      {
        if($select==1)
        {
          $upi_id = $cards[1];
        }

        else if($select==2)
        {
          $upi_id = $cards[3];
        }

        else
        {
          echo '<script type="text/javascript">',
          ' window.location.href = "withdrawal_record.php";',
          '</script>';
        }

        $new = mysqli_query($conn,"SELECT * from withdraw");
        $rows_found = mysqli_num_rows($new);
        $rows_found = $rows_found+1001;
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d H:i:s');
      
        $sql =mysqli_query($conn,"INSERT INTO withdraw values('$rows_found','$upi_id','$amount','$id','$date','0')");
        if($sql)
        {
          $remaining_balance = $wallet_result['available_balance']-$amount;
          mysqli_query($conn,"UPDATE wallet set available_balance='$remaining_balance' where wallet_id=$id");
        
          
          echo '<script type="text/javascript">',
        ' window.location.href = "withdrawal_record.php";',
        '</script>';
        }

        else
        {
          echo '<script>alert("Please Try Again Later!")</script>';
          
        }
      }

      else
      {
        echo '<script>alert("Wrong Password!")</script>';
        /*
        echo '<script type="text/javascript">',
        'wrong();',
        '</script>';
        */
      }
    }

    else 
    {
      echo '<script>alert("Amount Must be Greater than RS. 230")</script>';
      /*
      echo '<script type="text/javascript">',
      'less();',
      '</script>';  */
    }
  }

  else
  {
    echo '<script>alert("Insufficient Balance!!")</script>';
    /*
  echo '<script type="text/javascript">',
  'insufficient_balance();',
  '</script>';  */
  }

}



?>
<br><br><br>


<!-- footer start -->
<div id="footer" class="footer" >
<!-- home button in footer -->
<button onclick="location.href='home.php'" style="outline:none;margin-left:10%;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:30px;color:#696969"></i></button>

<!-- My account button in footer -->
<button  onclick="location.href='my_account.php';" style="margin-right:10%;float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:30px;color:#696969"></i></button>
</div>
</body>
</html>
