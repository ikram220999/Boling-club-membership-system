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
<title>Update Profile Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line">
<link rel="stylesheet" type="text/css" href="css/updateprof.css">
<link rel="icon" href="img/logoi.png" type="image/gif">

<head>
  <header>
    
  </header>
<body>
    
       
        
    
  <div class="cont">
    <div class="dd">
      <center>
         <div class="loginform">
  
        <br><center><h2>Update Profile</h2><br><br><br></center>
        <?php
        $sql = "SELECT * FROM user WHERE  username='".$current_user."' limit 1";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1)
        {
          while($row = mysqli_fetch_array($result))
          {
          
             echo "<form method='post' action='saveprof.php'> ";
             echo "First Name : <input type='text' name='fname' value='".$row['fname']."' required>&nbsp;&nbsp;&nbsp;";
             echo "Last Name : <input type='text' name='lname' value='".$row['lastname']."' required><br><br>";
             echo "Telephone no. : <input type='phone' name='phone' value='".$row['phone']." 'required> &nbsp;&nbsp;&nbsp;&nbsp;";
             echo "Email : <input type='Email' name='email' value='".$row['email']."' required> <br><br>";
             echo "Address : <input class='adr' type='textarea' name='address' value='".$row['address']."' required> <br><br>";
             echo "Identity card no : <input type='text' name='ic' value='".$row['ic']."' required> <br><br>";
             echo "Username : <input type='text' name='uname' value='".$row['username']."' required> &nbsp;&nbsp;"; 
             echo "Password : <input type='text' name='pass' value='".$row['password']."' required><br><br><br><br><br>";


            echo "<a href='profile.php'class='back'>Cancel</a>&nbsp;&nbsp;&nbsp;";
            echo "<button type='submit' name='submit' class='sv'>Save</button>";
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
?>

