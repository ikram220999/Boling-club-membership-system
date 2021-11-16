<?php
session_start();
include("dbconnect.php");

if(isset($_SESSION['username']))
{
    $current_user = $_SESSION['username'];
    if($conn)
    {
      if(isset($_POST['submit']))
      {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $addr = $_POST['address'];
        $ic = $_POST['ic'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        $sql = "UPDATE user SET  fname ='".$fname."' , lastname ='".$lname."' , phone = '".$phone."' , email = '".$email."' , address = '".$addr."' , ic = '".$ic."' , username = '".$uname."', password = '".$pass."' WHERE username ='".$current_user."' ";

        if (mysqli_query($conn, $sql))   
            {
              echo "<script>window.alert('Succesfully update profile !')</script>";
              echo ("<script type='text/javascript'>window.location.href = 'profile.php'</script>");
            }
        else
            {
              echo "<script>window.alert('Failed !')</script>";
              echo ("<script type='text/javascript'>window.location.href = 'profile.php'</script>");
            } 



      }



    }

}
?>

