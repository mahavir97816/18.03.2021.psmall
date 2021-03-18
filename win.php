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
  $q_avail = "SELECT * from wallet where user_id = $id";
  $run_q_avail = mysqli_query($conn,$q_avail);
  $wallet_result = mysqli_fetch_assoc($run_q_avail);

  date_default_timezone_set("Asia/Kolkata");

  $h = date('H');
  $m = date('i');
  $s = date('s');

  $y = date('Y');
  $month = date('m');
  $day = date('d');
?>

<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ps Club</title>
    <link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
    <link rel="stylesheet" href="win.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>

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

      /*recharge button color change on hover function*/
      function recharge_color(){
      document.getElementById("recharge1").style.color ="#954697";
      document.getElementById("recharge").src = "/img/recharge1.png";
      }

      function recharge_color1(){
      document.getElementById("recharge1").style.color ="black";
      document.getElementById("recharge").src = "/img/recharge.png";
      }

      function hr1(){
      document.getElementById("hr1").style.visibility ="";
      document.getElementById("hr2").style.visibility ="hidden";
      }

      function hr2(){
      document.getElementById("hr2").style.visibility ="";
      document.getElementById("hr1").style.visibility ="hidden";
      }






    </script>

    <!-- style section start -->
    <style>
      /*input fields icon color change to #954697*/
      /*text-indent:30px; to left the text in text fields*/
      /* yellow color for icons #FFD700*/


      /* The Modal (background) */
      .modal {
      z-index: 1; /* Sit on top */
      display:none;
      position:fixed;
      top:50%;
      left:50%;
      transform:translate(-50%,-50%);
      width:80%;
      height:auto;
        overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      }

      /* Modal Content */
      .modal-content {
        position: relative;
        background-color: black;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 99%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        animation-name: animatecenter;
        animation-duration: 0.5s
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
        padding: 2px 10px;
        background-color: #5cb85c;
        color: white;
      }

      .modal-body {padding: 2px 16px;}

      @keyframes animatecenter {
        from {-50%; opacity:0}
        to {50%; opacity:1}
      }

      /*increment/decrement buttons in modal*/
      .contract_btn{
      background:yellow;
        border: none;
        color: black;
        text-align: center;
        text-decoration: none;
        font-size: 15px;
      border-radius: 2px;
      font-weight:bold;
      margin:0px;
      height:38px;
      }
      .contract_btn:hover{ /*hower effect on bet buttons*/
      background:yellow;
      color:black;
      }

      /*cancel & confirm button in modal*/
      .modal_footer_btn{
      background:black;
        border: none;
        color: yellow;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        font-size: 15px;
      border-radius: 2px;
      font-weight:bold;
      margin:5px;
      }
      .modal_footer_btn:hover{ /*hower effect on  buttons*/
      background:#181818;
      }
    </style>

  </head>
<body id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">

<!--header div -->
  <div class="header">
    <br>
    <b style="margin:20px;color:white;font-size:20px;">Available balance:&#8377; <?php echo $wallet_result['available_balance']; ?></b><br>

    <button onclick="location.href='recharge.php'" style="Margin:20px;position:relative" class="recharge_button">Recharge</button>
    <button  class="rules_btn">Read Rules</button>
  </div>

<!--parity sapre and hr div -->
  <div style="width:100%;height:50px;margin-top:5px">
    <div onclick="hr1()" style="width:50%;height:50px;float:left">
    <p style="text-align:center;margin-top:15px;color:yellow"><b>Parity</b></p>
    </div>
    <div onclick="hr2()" style="width:50%;height:50px;float:right">
    <p style="text-align:center;margin-top:15px;color:yellow"><b>Sapre</b></p>
    </div>
    </div>
    <hr id="hr1" style="margin-top:0px;color:yellow;border: 1px dashed yellow;width:48%;float:left;">
  <hr id="hr2" style="visibility:hidden;margin-top:0px;color:yellow;border: 1px dashed yellow;width:48%;float:right;">

<!-- container for timer and related text -->
<div class="timer_holder">
    <!--Period number holder -->
    <div style="height:75px;width:50%;background:none;float:left">
    <b style="font-size:30px;color:yellow;">&#127942;</b><b style="font-size:20px;color:yellow;">Period</b><br><br>
    <b id="round" style="font-size:30px;color:yellow;margin:10px;"> </b>
    </div>

   <!--countdown text holder -->
   <div style="height:75px;width:50%;background:none;float:right">
    <b style="font-size:20px;color:yellow;float:right;margin-right:5px">Count Down</b><br>

    <!--cloak holder holder -->
    <div style="float:right;background:;margin-top:0px;width:100%;height:30px">
    <span style="text-align:center;border-radius:4px;height:100%;width:50px;background:grey;float:right;margin-right:5px;"><b id="mins" style="font-size:30px;color:yellow;"></b></span>


    <span style="text-align:center;border-radius:4px;height:100%;width:20px;float:right;margin-right:5px;"><b style="font-size:30px;color:yellow;">:</b></span>
    <span  style="text-align:center;border-radius:4px;height:100%;width:50px;background:grey;float:right;margin-right:5px;"><b id="secs" style="font-size:30px;color:yellow;"></b></span>


    </div>
    </div>
</div>

<!-- color button holder -->
 <div class="color_holder">
    <button id="join_green" onclick="num=11;join_green()" style="margin:10px;float:left;position:relative;" class="green_button">Join Green</button>
    <button id="join_voilet" onclick="num=12;join_voilet()" style="margin-left:6%;margin-right:6%;position:relative" class="voilet_button">Join Voilet</button>
    <button id="join_red" onclick="num=13;join_red()" style="margin:10px;float:right;position:relative" class="red_button">Join Red</button>
 </div>

<!-- paragraph which holds the number buttons -->
<p style="text-align:center;margin-left:1%;">

  <button id="0" onclick="num=0;join_0();"  style="width:50px;outline:none;" class="bet_btn">0</button>

  <button id="1" onclick="num=1;join_1();" style="width:50px;outline:none;" class="bet_btn">1</button>

  <button id="2" onclick="num=2;join_2();"  style="width:50px;outline:none;" class="bet_btn">2</button>

  <button id="3" onclick="num=3;join_3();"  style="width:50px;outline:none;" class="bet_btn">3</button>

  <button id="4" onclick="num=4;join_4();"  style="width:50px;outline:none;" class="bet_btn">4</button>

  <button id="5" onclick="num=5;join_5();"  style="width:50px;outline:none;" class="bet_btn">5</button>

  <button id="6" onclick="num=6;join_6();"  style="width:50px;outline:none;" class="bet_btn">6</button>

  <button id="7" onclick="num=7;join_7();"  style="width:50px;outline:none;" class="bet_btn">7</button>

  <button id="8" onclick="num=8;join_8();"  style="width:50px;outline:none;" class="bet_btn">8</button>

  <button id="9" onclick="num=9;join_9();"  style="width:50px;outline:none;" class="bet_btn">9</button>
</p>

  <!--parity record -->
<div style="width:100%;height:50px;margin-top:0px;background:none">
    <p style="text-align:center;margin-left:1%;">
    &#127942;<br>
    <b style="font-size:20px;color:yellow;margin:10px;">Parity Record</b>
    </p>
    </div>
    <hr style="border:1px dashed yellow;margin-top:0px;">

    <table style="width:100%;color:yellow;text-align:center">
    <tr>
    <th>Period</th>
    <th>Price</th>
    <th>Number</th>
    <th>Color</th>
    </tr>

    <tr>
    <td>xxxxxx</td>
    <td>xxxxxx</td>
    <td>xxxxxx</td>
    <td>xxxxxx</td>
    </tr>

    <tr>
    <td>xxxxxx</td>
    <td>xxxxxx</td>
    <td>xxxxxx</td>
    <td>xxxxxx</td>
    </tr>
    </table>
    <hr style="border:1px dashed yellow;margin-top:0px;">
</div>

<!-- my parity record -->
<div style="width:100%;height:50px;margin-top:0px;background:none">
  <p style="text-align:center;margin-left:1%;">
  <br>
  <center style="color:yellow;">My Parity Record</center>
  </p>
  <?php
  
    $selecting = mysqli_query($conn,"SELECT * FROM transactions where wallet_id ='$id' LIMIT 10");
    $records = mysqli_num_rows($selecting);

    if($records==0)
    {
      echo "<center style='color:white'> NO DATA FOUND!</center>";
    }

    else
    {
        ?>
        <div style="overflow-x:auto;">
      <center>
        <table style='margin:%;color:yellow;' border="2px">
        <tr>

        <th>
        Serial
        </th>

        <th>
        Period
        </th>

        <th>
        Selection
        </th>

        <th>
        Amount
        </th>

        <th>
        Status
        </th>
      
        </tr>

<?php
$s=1;
      while($row = mysqli_fetch_array($selecting))
      {

        echo "<tr>"; 

        echo "<td>";
        echo "&emsp;".$s;
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['period']);  // period
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['selection']);  
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['amount']);  // upi id
        echo "</td>";

        echo "<td>";
        echo "&emsp;".($row['status']);  // status
        echo "</td>";
      

        echo "</tr>";
        $s++;
      }
      echo "</table>";  
      echo "</div>";
        
    }         
    
        
?>
</center>
</div>


<!-- The Modal 0 -->
<div id="myModal0" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header" style="background:yellow;" id="modal-header">
        <h2 id="pop_heading" style="color:black">Select 0 </h2>
      </div>
      <div class="modal-body"><br>
  <b style="color:yellow">Contract Money</b>
  <br>
  <br>

  <!-- select amount buttons --> 
  <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt').value ='10';" class="contract_btn" value="&#8377;10">

  <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt').value ='100';"  class="contract_btn" value="&#8377;100">

  <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt').value ='1000';"  class="contract_btn" value="&#8377;1000">

  <form action="" method="POST">
  <input id="bet_amt" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
  </center>

  <br><br>


  <input type="checkbox" name="selection" checked value="0" >
  <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

  <br><br>

  <div style="float:right;width:99%;height:auto;background:;"> 
  <input type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
  <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
  </form>
  </div>
  <br><br><br>
      </div>
    </div>

</div>


<!-- The Modal 1 -->
<div id="myModal1" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
    <div class="modal-header" style="background:yellow;" id="modal-header">
        <h2 id="pop_heading" style="color:black">Select 1 </h2>
      </div>
      <div class="modal-body"><br>
  <b style="color:yellow">Contract Money</b>
  <br>
  <br>

  <!-- select amount buttons --> 
  <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt1').value ='10';" class="contract_btn" value="&#8377;10">

  <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt1').value ='100';"  class="contract_btn" value="&#8377;100">

  <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt1').value ='1000';"  class="contract_btn" value="&#8377;1000">

  <form action="" method="POST">
  <input id="bet_amt1" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
  </center>

  <br><br>


  <input type="checkbox" name="selection" checked value="1" >
  <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

  <br><br>

  <div style="float:right;width:99%;height:auto;background:;"> 
  <input type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
  <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
  </form>
  </div>
  <br><br><br>
      </div>
    </div>

</div>



<!-- The Modal2 -->
<div id="myModal2" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:yellow;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 2 </h2>
        </div>
        <div class="modal-body"><br>
    <b style="color:yellow">Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt2').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt2').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt2').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
    <input id="bet_amt2" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="2" >
    <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>

<!-- The Modal 3-->
<div id="myModal3" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:yellow;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 3 </h2>
        </div>
        <div class="modal-body"><br>
    <b style="color:yellow">Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt3').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt3').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt3').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
    <input id="bet_amt3" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="3" >
    <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>

<!-- The Modal 4 -->
<div id="myModal4" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:yellow;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 4 </h2>
        </div>
        <div class="modal-body"><br>
    <b style="color:yellow">Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt4').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt4').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt4').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
    <input id="bet_amt4" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="4" >
    <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal 5 -->
<div id="myModal5" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:yellow;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 5 </h2>
        </div>
        <div class="modal-body"><br>
    <b style="color:yellow">Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt5').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt5').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt5').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
    <input id="bet_amt5" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="5" >
    <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal 6 -->
<div id="myModal6" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:yellow;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 6 </h2>
        </div>
        <div class="modal-body"><br>
    <b style="color:yellow">Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt6').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt6').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt6').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
    <input id="bet_amt6" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="6" >
    <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


 <!-- The Modal 7 -->
<div id="myModal7" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:yellow;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 7 </h2>
        </div>
        <div class="modal-body"><br>
    <b style="color:yellow">Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt7').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt7').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt7').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
    <input id="bet_amt7" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="7" >
    <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal 8 -->
<div id="myModal8" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:yellow;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 8 </h2>
        </div>
        <div class="modal-body"><br>
    <b style="color:yellow">Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt8').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt8').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt8').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
    <input id="bet_amt8" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="8" >
    <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal 9-->
<div id="myModal9" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:yellow;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select 9 </h2>
        </div>
        <div class="modal-body"><br>
    <b style="color:yellow">Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt9').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt9').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt9').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
    <input id="bet_amt9" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="9" >
    <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal 11 -->
<div id="myModal11" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:green;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select Green </h2>
        </div>
        <div class="modal-body"><br>
    <b style="color:yellow">Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt11').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt11').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt11').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
    <input id="bet_amt11" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="11" >
    <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal12 -->
<div id="myModal12" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:#9900CC;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select Purple </h2>
        </div>
        <div class="modal-body"><br>
    <b style="color:yellow">Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt12').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt12').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt12').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
    <input id="bet_amt12" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="12" >
    <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>


<!-- The Modal 13 -->
<div id="myModal13" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <div class="modal-header" style="background:red;" id="modal-header">
          <h2 id="pop_heading" style="color:black">Select Red </h2>
        </div>
        <div class="modal-body"><br>
    <b style="color:yellow">Contract Money</b>
    <br>
    <br>

    <!-- select amount buttons --> 
    <center>
  <input type="button" style="width:auto;outline:none;"  onclick="document.getElementById('bet_amt13').value ='10';" class="contract_btn" value="&#8377;10">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt13').value ='100';"  class="contract_btn" value="&#8377;100">

    <input type="button" style="width:auto;outline:none;margin-left:1%;margin-top:30px;" onclick="document.getElementById('bet_amt13').value ='1000';"  class="contract_btn" value="&#8377;1000">

    <form action="" method="POST">
    <input id="bet_amt13" value="10" name="bet" type="text" style="width:50%;height:40px;outline:none;color:black;text-align:center;background:yellow;font-size:30px;box-sizing:border-box;border:2px black;" readonly>
    </center>

    <br><br>


    <input type="checkbox" name="selection" checked value="13"  checked>
    <label style="color:yellow">I agree</label><a style="text-decoration:none;font-size:14px;" href=""> PRESALE RULE</a>

    <br><br>

    <div style="float:right;width:99%;height:auto;background:;"> 
    <input  type="submit" name="confirm"  style="float:right;outline:none;color:blue;" class="modal_footer_btn" value="CONFIRM"> 
    <button onclick="exit_pop()" style="float:right;outline:none;color:grey;" class="modal_footer_btn">CANCEL</button>
    </form>
    </div>
    <br><br><br>
        </div>
      </div>

</div>

<!-- php for joining -->
<?php
  if(isset($_POST['confirm']))
  {
    $amount = $_POST['bet'];
    $past = (60*60*$h)+(60*$m)+$s;
    $current = $past /180+1;

    if($wallet_result['available_balance']>=$amount)
  {
      if(!isset($_POST['selection']))
      {
        echo '<script>alert("Please Agree to our PRESALE RULES")</script>';

      }
      else
      {
        $select =$_POST['selection'];

          $bal=$wallet_result['available_balance'];
          $remain = $bal-$amount;
          $upd = mysqli_query($conn,"UPDATE wallet SET available_balance='$remain' where wallet_id='$id'");

      
        if($upd)
        {
          //finding new id for transaction
          $t = mysqli_query($conn,"SELECT * FROM transactions");
          $t_id = mysqli_num_rows($t);
          $t_id = $t_id+1;

        //inserting
          $sql = mysqli_query($conn,"INSERT INTO transactions VALUES('$t_id','$current','$select','$amount','$id','0')");

          if($sql)
          {
            echo '<script>alert("success")</script>';
            echo "<script>window.location.href='my_account.php';</script>";
          }

          else
          {
            echo '<script>alert("Please Try Again Later!")</script>';

          }

        }

        else
        {
          echo '<script>alert("Please Try Again Later!")</script>';

        }
      }
    }

    else
    {
      echo '<script>alert("Insufficient Balance!Please Recharge")</script>';
      echo "<script>window.location.href='recharge.php';</script>";
    }
  }
?>


  

<script>
  var num="";
  var ind=10;
  var h= <?php echo $h; ?>;
  var m= <?php echo $m; ?>;
  var s= <?php echo $s; ?>;
  var past_seconds=(60*60*h)+(60*m)+s;
  var current_round=past_seconds/180+1;

  var period = parseInt(current_round);

  document.getElementById("round").innerHTML=period;

  // conditions
    switch(m)
    {
    case 0:
    var next_round=180-s;
    break;

    case 1:
    var next_round=120-s;
    break;

    case 2:
    var next_round=60-s;
    break;

    case 3:
    var next_round=180-s;
    break;

    case 4:
    var next_round=120-s;
    break;

    case 5:
    var next_round=60-s;
    break;

    case 6:
    var next_round=180-s;
    break;

    case 7:
    var next_round=120-s;
    break;

    case 8:
    var next_round=60-s;
    break;

    case 9:
    var next_round=180-s;
    break;

    case 10:
    var next_round=120-s;
    break;

    case 11:
    var next_round=60-s;
    break;

    case 12:
    var next_round=180-s;
    break;

    case 13:
    var next_round=120-s;
    break;

    case 14:
    var next_round=60-s;
    break;

    case 15:
    var next_round=180-s;
    break;

    case 16:
    var next_round=120-s;
    break;

    case 17:
    var next_round=60-s;
    break;

    case 18:
    var next_round=180-s;
    break;

    case 19:
    var next_round=120-s;
    break;

    case 20:
    var next_round=60-s;
    break;

    case 21:
    var next_round=180-s;
    break;

    case 22:
    var next_round=120-s;
    break;

    case 23:
    var next_round=60-s;
    break;

    case 24:
    var next_round=180-s;
    break;

    case 25:
    var next_round=120-s;
    break;

    case 26:
    var next_round=60-s;
    break;

    case 27:
    var next_round=180-s;
    break;

    case 28:
    var next_round=120-s;
    break;

    case 29:
    var next_round=60-s;
    break;

    case 30:
    var next_round=180-s;
    break;

    case 31:
    var next_round=120-s;
    break;

    case 32:
    var next_round=60-s;
    break;

    case 33:
    var next_round=180-s;

    break;case 34:
    var next_round=120-s;
    break;

    case 35:
    var next_round=60-s;
    break;

    case 36:
    var next_round=180-s;
    break;

    case 37:
    var next_round=120-s;
    break;

    case 38:
    var next_round=60-s;
    break;

    case 39:
    var next_round=180-s;
    break;


    case 40:
    var next_round=120-s;
    break;

    case 41:
    var next_round=60-s;
    break;

    case 42:
    var next_round=180-s;
    break;

    case 43:
    var next_round=120-s;
    break;

    case 44:
    var next_round=60-s;
    break;

    case 45:
    var next_round=180-s;
    break;

    case 46:
    var next_round=120-s;
    break;

    case 47:
    var next_round=60-s;
    break;

    case 48:
    var next_round=180-s;
    break;

    case 49:
    var next_round=120-s;
    break;

    case 50:
    var next_round=60-s;
    break;

    case 51:
    var next_round=180-s;
    break;

    case 52:
    var next_round=120-s;
    break;

    case 53:
    var next_round=60-s;
    break;

    case 54:
    var next_round=180-s;
    break;

    case 55:
    var next_round=120-s;
    break;

    case 56:
    var next_round=60-s;
    break;

    case 57:
    var next_round=180-s;
    break;58
    case 4:
    var next_round=120-s;
    break;

    case 59:
    var next_round=60-s;
    break;

    case 60:
    var next_round=180-s;
    break;
  }

  var timeInSecs;
  var ticker;
  function startTimer(secs) 
  {
    timeInSecs = parseInt(secs);
    ticker = setInterval("tick()", 1000); 
  }

  function tick( ) 
  {
    var secs = timeInSecs;
    if(secs<=30 && secs>0)
    {
      timeInSecs--; 
      document.getElementById("join_green").style.background = "#C8C8C8";
      document.getElementById("join_voilet").style.background = "#C8C8C8";
      document.getElementById("join_red").style.background = "#C8C8C8";
      document.getElementById("0").style.background = "#C8C8C8";
      document.getElementById("1").style.background = "#C8C8C8";
      document.getElementById("2").style.background = "#C8C8C8";
      document.getElementById("3").style.background = "#C8C8C8";
      document.getElementById("4").style.background = "#C8C8C8";
      document.getElementById("5").style.background = "#C8C8C8";
      document.getElementById("6").style.background = "#C8C8C8";
      document.getElementById("7").style.background = "#C8C8C8";
      document.getElementById("8").style.background = "#C8C8C8";
      document.getElementById("9").style.background = "#C8C8C8";

      document.getElementById("join_green").disabled = true;
      document.getElementById("join_voilet").disabled = true;
      document.getElementById("join_red").disabled = true;
      document.getElementById("0").disabled = true;
      document.getElementById("1").disabled = true;
      document.getElementById("2").disabled = true;
      document.getElementById("3").disabled = true;
      document.getElementById("4").disabled = true;
      document.getElementById("5").disabled = true;
      document.getElementById("6").disabled = true;
      document.getElementById("7").disabled = true;
      document.getElementById("8").disabled = true;
      document.getElementById("9").disabled = true;
    }

    else if (secs > 0) 
    {
      timeInSecs--; 
    }

    else 
    {
      clearInterval(ticker);
      startTimer(3*60);
      reload1();
    }

    var days= Math.floor(secs/86400); 
    secs %= 86400;
    var hours= Math.floor(secs/3600);
    secs %= 3600;
    var mins = Math.floor(secs/60);
    secs %= 60;
    var sec_load=( (mins < 10) ? "0" : "" ) + mins;
    document.getElementById("secs").innerHTML =sec_load;

    var min_load=( (secs < 10) ? "0" : "" ) + secs;
    document.getElementById("mins").innerHTML = min_load;

  }

  startTimer(next_round); 
  
  function reload1()
  {
    window.setTimeout(function () {
    window.location.reload();
  }, 300);

  }



// Get the modal
    var modal0 = document.getElementById("myModal0");
    var modal1 = document.getElementById("myModal1");
    var modal2 = document.getElementById("myModal2");
    var modal3 = document.getElementById("myModal3");
    var modal4 = document.getElementById("myModal4");
    var modal5 = document.getElementById("myModal5");
    var modal6 = document.getElementById("myModal6");
    var modal7 = document.getElementById("myModal7");
    var modal8 = document.getElementById("myModal8");
    var modal9 = document.getElementById("myModal9");
    var modal11 = document.getElementById("myModal11");
    var modal12 = document.getElementById("myModal12");
    var modal13 = document.getElementById("myModal13");

// Get the <span> element that closes the modal
   var span = document.getElementsByClassName("close")[0];



  function exit_pop() 
  {
    modal0.style.display = "none";
    modal1.style.display = "none";
    modal2.style.display = "none";
    modal3.style.display = "none";
    modal4.style.display = "none";
    modal5.style.display = "none";
    modal6.style.display = "none";
    modal7.style.display = "none";
    modal8.style.display = "none";
    modal9.style.display = "none";
    modal11.style.display = "none";
    modal12.style.display = "none";
    modal13.style.display = "none";
  }


  window.onclick = function(event) 
  {
    if (event.target == modal) 
    {
      modal0.style.display = "none";
      modal1.style.display = "none";
      modal2.style.display = "none";
      modal3.style.display = "none";
      modal4.style.display = "none";
      modal5.style.display = "none";
      modal6.style.display = "none";
      modal7.style.display = "none";
      modal8.style.display = "none";
      modal9.style.display = "none";
      modal11.style.display = "none";
      modal12.style.display = "none";
      modal13.style.display = "none";    
    }
  }

//join functions
  function join_0()
  {
    modal0.style.display="block";
  }

  function join_1()
  {
  modal1.style.display="block";
  }
  function join_2()
  {
  modal2.style.display="block";
  }
  function join_3()
  {
  modal3.style.display="block";

  }
  function join_4()
  {
  modal4.style.display="block";

  }
  function join_5()
  {
  modal5.style.display="block";
  }
  function join_6()
  {
  modal6.style.display="block";
  }

  function join_7()
  {
  modal7.style.display="block";
  }
  function join_8()
  {
  modal8.style.display="block";
  }
  function join_9()
  {
  modal9.style.display="block";
  }

  function join_green()
  {
  modal11.style.display="block";
  }

  function join_voilet()
  {
  modal12.style.display="block";
  }

  function join_red()
  {
  modal13.style.display="block";
  }


</script>
<br><br><br><br><br><br><br>
<br><br><br><br><br>


  <!-- footer start -->
<div class="footer"> 

  <!-- home button in footer -->
  <button onclick="location.href='home.php'" style="outline:none;margin-left:10%;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:30px;color:#696969"></i></button>

  <!-- My account button in footer -->
  <button  onclick="location.href='my_account.php'" style="margin-right:10%;float:right;outline:none;"  class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:30px;color:#696969"></i></button>

</div>
</body>
</html>