<?php
session_start();
include("dbconnect.php");

if(isset($_SESSION['username']))
{
    $current_user = $_SESSION['username'];
    $categ = $_SESSION['catid'];
    $act = $_POST['actio'];

    if($conn)
    {
      switch ($act)
      {
      case 'pay':
          $_SESSION['catid'] = $categ;
          if(!empty($_POST['startdate']) && (!empty($_POST['enddate'])))
          {
            $stdate = strtotime($_POST['startdate']);
            $endate = strtotime($_POST['enddate']);
            $pay = $_POST['pay'];

            $diffdate = ($endate - $stdate)/(60*60*24);
            $price = $pay * $diffdate;
            
            ?>

            <!DOCTYPE html>
            <html>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Membership Payment Page</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line">
            <link rel="stylesheet" type="text/css" href="css/payprocess.css">
            <link rel="icon" href="img/logoi.png" type="image/gif">

            <head>
              <header>

              </header>
            <body>
                
                   
                    
                
              <div class="cont">
                <div class="dd">
                  <center>
                     <div class="loginform">
                      
                      <img src="img/tick.png"><br><br>
                      <table>
                        <tr>
                          <th>Start Date</th>
                          <th>End Date</th>
                        </tr>
                    <?php

                      echo "<tr>";
                      echo "<td>".$_POST['startdate'] . "</td>";
                      echo "<td>" .$_POST['enddate']. "<br></td>";

                      
                      echo "</tr>";


                    ?>
            </table>
            <br>
            <div class="fee">
                Your membership fees is 
            </div><br>
            <?php
            
            echo "<div class='price'>RM " .$price. "</div><br>";
             echo "<br>";     
            ?>
                
              <form method="post" action="confirmpay.php"> 
              <a href="payment.php" class="logout">Cancel</a>

              <?php 
              echo "<input type='hidden' name='fees' value='".$price."'>";
              echo "<input type='hidden' name='startd' value='".$_POST['startdate']."'>";
              echo "<input type='hidden' name='endd' value='".$_POST['enddate']."'>";
              echo "<input type='hidden' name='cate' value='".$categ."'>";

              ?>
              <button type="submit" class="subs" type="button">Pay</button>
              </form>
              

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
          else 
          {
            echo "<script>window.alert('Please enter date correctly !!')</script>";
            echo "<script> window.location.href='payment.php' </script>";
            die;
          }
      }
    }
}


?>

