<?php
session_start();
include("connection.php");
error_reporting(0);

$id = $_SESSION['id'];

$userphone = $_SESSION['phonenumber'];
 
if($userphone==true)
{

}

else
{
    header("location:login.php");
}

?>


<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PS CLUB</title>
    <link rel="icon" href="/img/site_logo.png" type="image/gif" sizes="32x32">
    <link rel="stylesheet" href="add_card.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
    function goto(){
  window.location.href = "bank_card.php";

}
        function footer_home_color() {
            document.getElementById("f_home").style.color = "#2196f3";
        }

        function footer_my_color() {
            document.getElementById("f_my").style.color = "#2196f3";
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


        function hr1() {
            document.getElementById("name").style.color = "red";
            document.getElementById("hr1").style.border = "1px dashed yellow";

            document.getElementById("ifsc").style.color = "grey";
            document.getElementById("hr2").style.border = "1px dashed grey";
            document.getElementById("bank").style.color = "grey";
            document.getElementById("hr3").style.border = "1px dashed grey";
            document.getElementById("upi").style.color = "grey";
            document.getElementById("hr4").style.border = "1px dashed grey";
            document.getElementById("mobile").style.color = "grey";
            document.getElementById("hr5").style.border = "1px dashed grey";
            document.getElementById("email").style.color = "grey";
            document.getElementById("hr6").style.border = "1px dashed grey";
        }

        function hr2() {
            document.getElementById("ifsc").style.color = "red";
            document.getElementById("hr2").style.border = "1px dashed yellow";

            document.getElementById("name").style.color = "grey";
            document.getElementById("hr1").style.border = "1px dashed grey";
            document.getElementById("bank").style.color = "grey";
            document.getElementById("hr3").style.border = "1px dashed grey";
            document.getElementById("upi").style.color = "grey";
            document.getElementById("hr4").style.border = "1px dashed grey";
            document.getElementById("mobile").style.color = "grey";
            document.getElementById("hr5").style.border = "1px dashed grey";
            document.getElementById("email").style.color = "grey";
            document.getElementById("hr6").style.border = "1px dashed grey";
        }

        function hr3() {
            document.getElementById("bank").style.color = "red";
            document.getElementById("hr3").style.border = "1px dashed yellow";

            document.getElementById("ifsc").style.color = "grey";
            document.getElementById("hr2").style.border = "1px dashed grey";
            document.getElementById("name").style.color = "grey";
            document.getElementById("hr1").style.border = "1px dashed grey";
            document.getElementById("upi").style.color = "grey";
            document.getElementById("hr4").style.border = "1px dashed grey";
            document.getElementById("mobile").style.color = "grey";
            document.getElementById("hr5").style.border = "1px dashed grey";
            document.getElementById("email").style.color = "grey";
            document.getElementById("hr6").style.border = "1px dashed grey";
        }

        function hr4() {
            document.getElementById("upi").style.color = "red";
            document.getElementById("hr4").style.border = "1px dashed yellow";

            document.getElementById("ifsc").style.color = "grey";
            document.getElementById("hr2").style.border = "1px dashed grey";
            document.getElementById("name").style.color = "grey";
            document.getElementById("hr1").style.border = "1px dashed grey";
            document.getElementById("bank").style.color = "grey";
            document.getElementById("hr3").style.border = "1px dashed grey";
            document.getElementById("mobile").style.color = "grey";
            document.getElementById("hr5").style.border = "1px dashed grey";
            document.getElementById("email").style.color = "grey";
            document.getElementById("hr6").style.border = "1px dashed grey";
        }

        function hr5() {
            document.getElementById("mobile").style.color = "red";
            document.getElementById("hr5").style.border = "1px dashed yellow";

            document.getElementById("ifsc").style.color = "grey";
            document.getElementById("hr2").style.border = "1px dashed grey";
            document.getElementById("name").style.color = "grey";
            document.getElementById("hr1").style.border = "1px dashed grey";
            document.getElementById("upi").style.color = "grey";
            document.getElementById("hr4").style.border = "1px dashed grey";
            document.getElementById("bank").style.color = "grey";
            document.getElementById("hr3").style.border = "1px dashed grey";
            document.getElementById("email").style.color = "grey";
            document.getElementById("hr6").style.border = "1px dashed grey";
        }

        function hr6() {
            document.getElementById("email").style.color = "red";
            document.getElementById("hr6").style.border = "1px dashed yellow";

            document.getElementById("ifsc").style.color = "grey";
            document.getElementById("hr2").style.border = "1px dashed grey";
            document.getElementById("name").style.color = "grey";
            document.getElementById("hr1").style.border = "1px dashed grey";
            document.getElementById("upi").style.color = "grey";
            document.getElementById("hr4").style.border = "1px dashed grey";
            document.getElementById("mobile").style.color = "grey";
            document.getElementById("hr5").style.border = "1px dashed grey";
            document.getElementById("bank").style.color = "grey";
            document.getElementById("hr3").style.border = "1px dashed grey";
        }
    </script>
</head>
<style>
    /*text-indent:30px; to left the text in text fields*/
    
    .header {
        background: blue;
        float: center;
        width: auto;
        height: 62px;
        margin: -10px;
    }
    /*container for footer buttons*/
    
    .footer {
        display: block;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        height: auto;
        background-color: white;
        color: grey;
        text-align: left;
    }
    /*apply to balance button in the middle*/
    
    .continue_btn {
        background: #2196f3;
        border: none;
        color: white;
        padding: 10px 10px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        border-radius: 2px;
    }
    
    .continue_btn:hover {
        /*when hover on login button change color*/
        background: #33A1C9;
    }
    /*buttons in the footer*/
    
    .footer_btn {
        background: white;
        border: none;
        color: white;
        padding: 10px 10px;
        text-align: center;
        text-decoration: none;
        font-size: 14px;
        border-radius: 2px;
        width: auto;
    }
    
    .footer_btn:hover {
        /*when hover on footer buttons change color*/
        background: #C0C0C0;
    }
    /*div which have centererd elements*/
    
    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100px;
        border: none;
    }
    
    .drop_down {
        background: #F5F5F5;
        width: 95%;
        height: 45px;
        box-shadow: 1px 1px 1px 1px #909090;
    }
</style>
</head>

<body id="body_gradient" style="height:100%;font-family: Roboto,sans-serif;">


    <!-- Header for back button and login text at top -->
    <div class="header">
        <br>&emsp;
        <img onclick="goBack()" alt="back" src="/img/arrow.png" width="25" height="25">

        <b style="margin-left:20px;margin-bottom:10px;font-size:25px;color:white">Add Bank Card</b>
    </div><br><br>
    
   
    <form action="" method="GET">
        <lable id="name" style="font-size:18px;color:grey;margin-left:2%">Actual Name</lable>
        <center>
        <input required name="actual_name" autocomplete="off" style="font-size:16px;color:yellow;background:grey;outline:none;margin-top:0px" type="text">
        </center><br><br>    
        <lable id="ifsc" style="font-size:18px;color:grey;margin-left:2%">IFSC Code</lable>
        <center>
        <input required name="ifsc_code" autocomplete="off" style="font-size:16px;color:yellow;background:grey;outline:none;margin-top:0px" type="text">
       </center><br><br>
        <lable id="bank" style="font-size:18px;color:grey;margin-left:2%">Bank Name</lable>
        <center>
        <input required name="bank_name" autocomplete="off" style="font-size:16px;color:yellow;background:grey;outline:none;margin-top:0px" type="text">
        </center><br><br>
        <lable id="upi" style="font-size:18px;color:grey;margin-left:2%">UPI Account</lable>
        <center>
        <input required name="upi_id" autocomplete="off" style="font-size:16px;color:yellow;background:grey;outline:none;margin-top:0px" type="text">
        </center>
        <br><br>
       <center>
        <input style="outline:none" name="submit" type="submit" value="Continue" class="continue_btn">
        </center>
        </form>
       
        

<?php
if(isset($_GET['submit']))
{

   // storing form data into variables
   $name = $_GET['actual_name'];
   $ifsc = $_GET['ifsc_code'];
   $bank = $_GET['bank_name'];
   $upi = $_GET['upi_id'];
    
   
   
   $checking = "SELECT * from bank_cards where wallet_id=$id";
   $check_run = mysqli_query($conn,$checking);
   $total_records_found = mysqli_num_rows($check_run);
   
       if($total_records_found<2)
       {
            //to find the bank card id of the new user here we find the total records.
            $q= "SELECT * from bank_cards";
            $d = mysqli_query($conn,$q);
            $getid= mysqli_num_rows($d);
            $getid = $getid+1; //total records + 1 will be the new id of the new user.
                
            
            //inserting into the bank_cards table
            $qry = "INSERT INTO bank_cards Values('$getid','$name','$ifsc','$bank','$upi','$id')";
            $true = mysqli_query($conn,$qry);
            
            if($true)
            { 
                echo '<script type="text/javascript">',
            'goto();',
            '</script>';                        
            }

            else
            {
                echo '<script>alert("Please Try Again Later!")</script>';
                header("location:bank_card.php"); 
            }
        }

        else
        {
            echo '<script>alert("You Can Not Add More Than Two Bank Cards")</script>';
            header("location:bank_card.php"); 
        }
}
?>





    <br><br><br>
    <!-- footer start -->
    <div id="footer" class="footer">
        <!-- home button in footer -->
        <button onclick="footer_home_color();location.href='home.php'" style="outline:none;margin-left:10%;" class="footer_btn"><i id="f_home"  class="fa fa-home" style="font-size:30px;color:#696969"></i></button>

        <!-- My account button in footer -->
        <button onclick="footer_my_color(); location.href='my_account.php';" style="margin-right:10%;float:right;outline:none;" class="footer_btn"><i id="f_my" class="fa fa-user" style="font-size:30px;color:#696969"></i></button>
    </div>
</body>

</html>