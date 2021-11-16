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
<title>Admin Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line">
<link rel="stylesheet" type="text/css" href="css/adminhome.css">
<link rel="icon" href="img/logoi.png" type="image/gif">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<head>
  
<body>
    <header>

  </header>
       <br><br>
        
    
  <div class="cont">
    <div class="dd">
      <center>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
         <div class="loginform" >
          <br>
        <h2>User List</h2>
        <br>
        <?php
        $sql = "SELECT `id`,`fname`, `lastname`, `address`, `phone`, `ic`,`email`,`username`, `password`, `membershipid` FROM `user` WHERE `role`='user' ";
         $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result))
        {
          ?>
          <table cellpadding="0" cellspacing="0" border="2">
                <tr>
                  
                  <td><strong>No.</strong></td>
                  <td><strong>First Name</strong></td>
                  <td><strong>Last Name</strong></td>
                  <td><strong>Telephone</strong></td>
                  <td><strong>Identity Card</strong></td>
                  <td><strong>Email</strong></td>
                  <td><strong>Address</strong></td>
                  <td><strong>Membership Status</strong></td>
                  <td><strong>Action</strong></td>
                
                </tr>
          <?php
          $count = 1;
          while($row = mysqli_fetch_array($result))
          {
            ?>
              
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $row['fname']; ?></td>
                  <td><?php echo $row['lastname']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
                  <td><?php echo $row['ic']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['address']; ?></td>

                  <td><?php 

                    $uid = $row['id'];

                    $sql3 = "SELECT * FROM membership WHERE mem_id='".$row['membershipid']."' ";
                    $result3 = mysqli_query($conn,$sql3);
                    if(mysqli_num_rows($result3)==1)
                    {
                      while($row3 = mysqli_fetch_array($result3))
                      { 
                          $sql2 = "SELECT * FROM category WHERE cat_id = '".$row3['category']."' ";
                          $result2 = mysqli_query($conn,$sql2);
                          if(mysqli_num_rows($result2)==1)
                          {
                            while($row2 = mysqli_fetch_array($result2))
                            { 

                            echo '<center><img class="mem" src="data:image;base64,'.base64_encode($row2['cat_img']).'" alt= "Image" ></center><br>'; 
                            }
                          }
                      }  
                    }
                          
          
        


                   
                  

                  echo "<td><form method='post' action='viewuser.php'>
                  <input type='submit' class='view' name='action' value='View'>";
                  echo "<input type='hidden' name='uid' value=".$uid."></form>"; 
                  
                  echo "<form method='post' action='deleteuser.php'>
                  <input type='submit' class='del' name='action' value='Delete'>";
                  echo "<input type='hidden' name='uid' value=".$uid."></form>";
                  echo "</tr>";
              
?>
            <?php
            $count++;
          }
          echo "</table>";

            ?>
            <br><br>
              <a href="logout.php"><button class="back">Logout</button></a>
              <br><br><br>
            <?php
        }
        else
          echo "kambing";

        ?>

      

     


   

          </div>    
      </center>
    </div>
    </div>
  <br><br><br><br><br><br><br><br>
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

}


?>

