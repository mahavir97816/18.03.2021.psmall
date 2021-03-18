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
<input type="submit" name="find" class="logout_button" value="SHOW DATA">
</form>

<center>

<?php
  
  if(isset($_POST['find']))
  {
    $finding = mysqli_query($conn,"SELECT * FROM withdraw where status ='0' LIMIT 10");
    $records = mysqli_num_rows($finding);

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
        WITHDRAW ID
        </th>

        <th>
        UPI ID
        </th>

        <th>
        AMOUNT
        </th>

        <th>
        STATUS
        </th>
      
        </tr>

<?php
      while($row = mysqli_fetch_array($finding))
      {
       
        echo "<tr>"; 
        echo "<td>";
        echo "&emsp;".($row['withdraw_id']); //apply_id
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['upi_id']);  // promotion id or wallet id
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['amount']);  // amount
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
<input type="number" name="w_id" placeholder="withdraw id" style="outline:none" required>
<br><br>
<input type="submit" name="update" value="UPDATE" class="logout_button">
</form>

<?php

  $withdraw_id = $_POST['w_id'];


  if(isset($_POST['update']))
  {
    $status_update = mysqli_query($conn,"UPDATE withdraw SET status='1' where withdraw_id='$withdraw_id'");


    if($status_update)
    {
        echo '<script>alert("UPDATED!")</script>';

    }

    else
    {
      echo '<script>alert(" NOT UPDATED!")</script>';

    }

    

  
  }


?>





<p style="text-align:center;margin-top:30px;">
<a href="admin_logout.php" onclick="return confirm('Do you want to logout?')" style="width:70px;outline:none;" class="logout_button" >Logout</a>
</p>

<br><br><br>



</body>
</html>