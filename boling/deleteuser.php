<?php
session_start();
include("dbconnect.php");

if(isset($_SESSION['username']))
{
if ($_POST['action'] && $_POST['uid']) {
  if ($_POST['action'] == 'Delete') {

    $userid = $_POST['uid'];
    $current_user = $_SESSION['username'];
    
      
      $sql = "DELETE FROM user WHERE id = '".$userid."' ";
      if (mysqli_query($conn, $sql)) 
      {
      echo "<script>window.alert('Succesfully delete data !')</script>";
       echo ("<script type='text/javascript'>window.location.href = 'adminhome.php'</script>"); 
        }
      

      else
      {
        echo "<script>window.alert('Failed delete data !')</script>";
        echo ("<script type='text/javascript'>window.location.href = 'adminhome.php'</script>");
      }


  
}}}


?>

