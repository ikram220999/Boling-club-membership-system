<?php
session_start();
include("dbconnect.php");

if(isset($_SESSION['username']))
    {
    $current_user = $_SESSION['username'];
    if(isset($_SESSION['catid']))
    {
    unset($_SESSION['catid']);
    }
    if($conn)
    {
?>

<!DOCTYPE html>
<html>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Membership Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line">
<link rel="stylesheet" type="text/css" href="css/membership.css">
<link rel="icon" href="img/logoi.png" type="image/gif">

<head>
  <header>

  </header>
<body>
    
       
        
    
  <div class="cont">
    <div class="dd">
      <center>
         <div class="loginform">
  
        <br><br><br>
        <form method="POST" action="payment.php">
        <div class="app-paper">
          <div class="mema">
           
           <img src="img/gold1.png"><br>
           <h4><strong>Gold Package</strong><br><br>
           Price : RM 1.00 / Day</h4><br><br><br>


            <button class="subs" type="submit" name="asd" value="1">Subscribe</button>
          </div>
          <div class="memb">

            <img src="img/premium1.png"><br>
            <h4><strong>Premium Package</strong><br><br>
           Price : RM 1.50 / Day</h4><br><br><br>

            <button class="subs" type="submit" name="asd" value="2">Subscribe</button>
          </div>
          <div class="memc">

            <img src="img/vip1.png"><br>
            <h4><strong>VIP Package</strong><br><br>
           Price : RM 2.00 / Day</h4><br><br><br>
            <button class="subs" type="submit" name="asd" value="3">Subscribe</button>
          </div>
        </div>
          </form>
          <br><br>
          <a href="profile.php"><button class="logout">Back</button></a>

      

     


   

          </div>    
      </center>
    </div>
    </div>
  </div>
</body>
<footer>
  <center>
  <p class="ft">
Copyright&#169; 2021 by Strikers
</p></center>
</footer>


</html>

<?php
  }

}


?>

