<?php
include("connection.php");
session_start();
error_reporting(0);
$id = $_SESSION['admin_id'];

 
if($id==true)
{

}

else
{
    header("location:admin_login.php");
}



?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Ps Club</title>
<link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
<!--<link rel="stylesheet" href="my_account.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
</script>
  
<!-- style section start -->
<style>
  /*iput fields icon color change to #954697*/
  /*text-indent:30px; to left the text in text fields*/

input[type=text] {
background-position: 20px; 
background-size: 30px 30px;
background-repeat: no-repeat;
font-size: 16px;
width: 95%;
padding: 10px 15px;
margin-top: 20px;
margin-right: 10px;
box-sizing: border-box;
border: 2px white;
color:black;
}

#body_gradient {
  background-image: linear-gradient(to right,#434343 , #000000);
}


input[type=number] {
background-position: 20px; 
background-size: 30px 30px;
background-repeat: no-repeat;
font-size: 16px;
width: 95%;
padding: 10px 15px;
margin-top: 20px;
margin-right: 10px;
box-sizing: border-box;
border: 2px white;
color:black;
}
  /*login button in the middle*/
  .logout_button{
  background:yellow;
    border: none;
    color: black;
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


</style>
 
</head>
<body id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">
<center>
<form action="" method="post">
<input type="text" name="upi" placeholder="enter upi id" style="outline:none" required>
<br><br>
<input type="submit" name="find" class="logout_button" value="FIND DATA">
</form>

<center>
 
<?php
  
  if(isset($_POST['find']))
  {
    $upi = $_POST['upi'];
    $inserting = mysqli_query($conn,"SELECT * FROM recharge where upi_id ='$upi' && status='0' LIMIT 20");
    $records = mysqli_num_rows($inserting);

    if($records==0)
    {
      echo "NO DATA FOUND!";
    }

    else
    {
        ?>
        <div style="overflow-x:auto;">

        <table style='margin:%;color:yellow;' border='1px'>
        <tr>

        <th>
        ORDER_NUMBER
        </th>

        <th>
        WALLET_ID
        </th>

        <th>
        UPI_ID
        </th>

        <th>
        AMOUNT
        </th>

        <th>
        DATE
        </th>

        <th>
        STATUS
        </th>
      
        </tr>

<?php
      while($row = mysqli_fetch_array($inserting))
      {
        /*
        echo "<br>";
        echo "<table style='margin:%;color:yellow;' border='1px'>";
      
        echo "<tr>";

        echo "<th>";
        echo "ORDER_NUMBER";
        echo "</th>";

        echo "<th>";
        echo "WALLET_ID";
        echo "</th>";

        echo "<th>";
        echo "UPI_ID";
        echo "</th>";

        echo "<th>";
        echo "AMOUNT";
        echo "</th>";

        echo "<th>";
        echo "DATE";
        echo "</th>";

        echo "<th>";
        echo "STATUS";
        echo "</th>";
      
        echo "</tr>";
        */

        echo "<tr>"; 
        echo "<td>";
        echo "&emsp;".($row['order_number']);  // order number
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['wallet_id']);  // wallet id
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['upi_id']);  // upi id
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['recharege_amount']);  // amount
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['date']);  // date
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['status']);  // status
        echo "</td>";
      

        echo "</tr>";
      }
      echo "</table>";  
      echo "</div>";
        
    }         
    
        
}
?>

<form action="" method="post">
<input type="number" name="order_number" placeholder="order number" style="outline:none" required>
<input type="number" name="amt" placeholder="enter amount" style="outline:none" required>
<input type="number" name="wallet_id" placeholder="wallet id" style="outline:none" required>

<br><br>
<input type="submit" name="update" value="UPDATE" class="logout_button">
</form>

<?php

  $order = $_POST['order_number'];
  $amount = $_POST['amt'];
  $wallet = $_POST['wallet_id'];

  $get_balance= mysqli_query($conn,"SELECT * FROM wallet where wallet_id='$wallet'");
  $balance = mysqli_fetch_assoc($get_balance);
  $new_balance = $balance['available_balance'];

  $new_balance = $new_balance + $amount;

  if(isset($_POST['update']))
  {
    $status_update = mysqli_query($conn,"UPDATE recharge SET status='1' where order_number='$order'");


    if($status_update)
    {
      $wallet_update = mysqli_query($conn,"UPDATE wallet SET available_balance='$new_balance' where wallet_id='$wallet'");

      if($wallet_update)
      {
        echo '<script>alert("WALLET AND STATUS UPDATED!")</script>';

      }

      else
      {
        echo '<script>alert("WALLET NOT UPDATED!")</script>';

      }

    }

    else
    {
      echo '<script>alert("STATUS NOT UPDATED!")</script>';


    }
  }


?>


<p style="text-align:center;margin-top:30px;">
<a href="admin_logout.php" onclick="return confirm('Do you want to logout?')" style="width:70px;outline:none;" class="logout_button" >Logout</a>
</p>

<br><br><br>



</body>
</html>