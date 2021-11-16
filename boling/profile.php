<?php
session_start();
include("dbconnect.php");

if(isset($_SESSION['username']))
    {
    $current_user = $_SESSION['username'];
    if($conn)
    {
?>

<!DOCTYPE html>
<html>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Profile Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line">
<link rel="stylesheet" type="text/css" href="css/profile.css">
<link rel="icon" href="img/logoi.png" type="image/gif">

<head>
  <header>
    
  </header>
<body>
    
       
        
    
  <div class="cont">
    <div class="dd">
      <center>
        <br><br><br><br>
         <div class="loginform">
  
        <br><center><h2>My Profile</h2><br></center>
        <?php
        $sql = "SELECT * FROM user WHERE  username='".$current_user."' limit 1";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1)
        {
          while($row = mysqli_fetch_array($result))
          {
           echo '<img class="" src="'.$row['userimg'].'" alt= "Image" height="120" width="120" ><br><br>';
              echo "<table class='tbl1'>";
             echo "<tr>";
            echo "<td class='aa'>Name :</td> ";
           echo "<td>".$row['fname']."&nbsp;".$row['lastname']."</td>";
            echo "</tr><tr>";
            echo "<td class='aa'>Address :</td> ";
            echo "<td>".$row['address']."</td>";
            echo "</tr><tr>";
             echo "<td class='aa'>No tel. :</td> ";
            echo "<td>".$row['phone']."</td>";
            echo "</tr><tr>";
            echo "<td class='aa'>Email :</td> ";
            echo "<td>".$row['email']."</td>";
            echo "</tr><tr>";
            echo "<td class='aa'>Identity Card :</td> ";
            echo "<td>".$row['ic']."</td>";
            echo "</tr><tr>";
            echo "<td class='aa'>Username :</td> ";
            echo "<td>".$row['username']."</td>";
            echo "</tr><tr>";
             echo "<td class='aa'>Password :</td> ";
            echo "<td>".$row['password']."</td>";
            echo "</tr>";
            echo "</table><br><br>";

            $member = $row['membershipid'];

            if($member > 0){

            $sql2 = "SELECT * FROM membership WHERE username ='".$current_user."' limit 1";
              $result2 = mysqli_query($conn,$sql2);
              if(mysqli_num_rows($result2)==1)
              {
                while($row2 = mysqli_fetch_array($result2))
                {
                  $var = $row2['category'];

                  $sql3 = "SELECT * FROM category WHERE cat_id ='".$var."' limit 1";
                    $result3 = mysqli_query($conn,$sql3);
                    if(mysqli_num_rows($result3)==1)
                    {
                      while($row3 = mysqli_fetch_array($result3))
                      {


                        echo '<img class="meme" src="data:image;base64,'.base64_encode($row3['cat_img']).'" alt= "Image" ><br>';
                                echo " <table class='tbl2'><tr><td><strong>Start Date</strong></td><td><strong>End Date</strong></td></tr><tr><td> ".$row2['mem_joindate']."</td><td> ".$row2['mem_enddate']." </td></tr></table><br><br><br><br>";
                      ?>

                      <div class="df">
                      <a href="logout.php"><button class="logout">Logout</button></a>
                    <a href="updateprof.php"><button class="update">Update</button></a>
                      </div>
                      <?php
                      }
                    }


                }
              }
            }
            else
            {
              echo "<img class='memee' src='img/subscribe.png'> ";
            
            ?>
                    <div class="df">
                      <a href="logout.php"><button class="logout">Logout</button></a>
                    <a href="membership.php"><button class="member">Membership</button></a>
                    <a href="updateprof.php"><button class="update">Update</button></a>
                      </div>
                      <br><br>
            
            <?php
          }
        }

        ?>
        

   

          </div>    
      </center>
    </div>
    </div>
  </div>
  <br><br><br><br>
  <footer>
  <center>
  <p class="ft">
Copyright&#169; 2021 by Strikers 
</p></center>
</footer>
</body>



</html>

<?php
  }

}}
?>

