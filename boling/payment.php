<?php
session_start();
include("dbconnect.php");

if(isset($_SESSION['username']))
{
    $current_user = $_SESSION['username'];

    if($conn)
    {

      if(isset($_SESSION['catid']))
      {

        $categ = $_SESSION['catid'];
        ?>
        <!DOCTYPE html>
        <html>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Membership Payment Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line">
        <link rel="stylesheet" type="text/css" href="css/payment.css">
        <link rel="icon" href="img/logoi.png" type="image/gif">

        <head>
          <header>

          </header>
        <body>
            
               
                
            
          <div class="cont">
            <div class="dd">
              <center>
                 <div class="loginform">
          
                <?php
                $sql = "SELECT * FROM category WHERE cat_id = '".$categ."' ";
                 $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)==1)
                {
                  while($row = mysqli_fetch_array($result))
                  {
                  
                    echo "<form method='post' action='payprocess.php'>";
                    echo "<div class='loginform'> ";
                    echo '<br><img class="mem" src="data:image;base64,'.base64_encode($row['cat_img']).'" alt= "Image" ><br>';
                    echo "<div class='rt' >";
                    echo "<br><h4><strong>Price of this ".$row['cat_name']." membership is </strong></h4><br>";
                    echo "<h1><strong>RM ".$row['cat_price']." / Day </strong></h1><br>";
                    echo "<br><br>";
                    echo " Start date : <input type='date' id='startdate' name='startdate'><br><br> ";
                    echo " End date : <input type='date' id='enddate' name='enddate'> ";
                    echo "</div><br><br><br>";
                    //echo "<button class='subs' type='button' id='but' value='cal' onclick='caldate()'>Calculate Fee</button><br>";
                    //echo "<h2 id='output'> <br><br></h2>";
                    echo "<input type='hidden' name='cate' value='".$row['cat_id']."'> ";
                    echo "<input type='hidden' name='pay' value='".$row['cat_price']."'> ";
                    
                    echo "<button type='submit' class='subs' name='actio' value='pay'>Confirm</button> <br><br>";
                    
                    
                    echo "<a href='membership.php' class='logout' >Back</a>";
                    echo "</div> ";
                    
                    echo "</form>";
                    
                  }
                }
                

                ?>

              

             


           

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
      



        $category = $_POST['asd'];
        $_SESSION['catid'] = $category;
        $categ = $_SESSION['catid'];

        ?>

        <!DOCTYPE html>
        <html>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Membership Payment Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line">
        <link rel="stylesheet" type="text/css" href="css/payment.css">
        <link rel="icon" href="img/logoi.png" type="image/gif">

        <head>
          <header>

          </header>
        <body>
            
               
                
            
          <div class="cont">
            <div class="dd">
              <center>
                 <div class="loginform">
          
                <?php
                $sql = "SELECT * FROM category WHERE cat_id = '".$categ."' ";
                 $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)==1)
                {
                  while($row = mysqli_fetch_array($result))
                  {
                  
                    echo "<form method='post' action='payprocess.php'>";
                    echo "<div class='loginform'> ";
                    echo '<br><img class="mem" src="data:image;base64,'.base64_encode($row['cat_img']).'" alt= "Image" ><br>';
                    echo "<div class='rt' >";
                    echo "<br><h4><strong>Price of this ".$row['cat_name']." membership is </strong></h4><br>";
                    echo "<h1><strong>RM ".$row['cat_price']." / Day </strong></h1><br>";
                    echo "<br><br>";
                    echo " Start date : <input type='date' id='startdate' name='startdate' ><br><br> ";
                    echo " End date : <input type='date' id='enddate' name='enddate' > ";
                    echo "</div><br><br><br>";
                    //echo "<button class='subs' type='button' id='but' value='cal' onclick='caldate()'>Calculate Fee</button><br>";
                    //echo "<h2 id='output'> <br><br></h2>";
                    echo "<input type='hidden' name='cate' value='".$row['cat_id']."'> ";
                    echo "<input type='hidden' name='pay' value='".$row['cat_price']."'> ";
                      echo "<button type='submit' class='subs' name='actio' value='pay'>Confirm</button><br><br> ";
                      
                   
                   
                    
                    
                    echo "<a href='membership.php' class='logout'>Back</a>";
                    echo "</div> ";
                    
                    echo "</form>";
                    
                  }
                }
                

                ?>

              

             


           

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
}  


?>

