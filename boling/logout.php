<?php


  session_start();
  include("dbconnect.php");

  if($conn)
  {
    // Destroy session
    session_destroy();
    // Redirect back to 'Homepage.php'
    echo "<script>window.alert('Succesfully logout')</script>";
    echo ("<script type='text/javascript'>window.location.href = 'login.html'</script>");
    exit();
    mysqli_close($conn); // MySQLi Procedural close
  }
  else
  {
    echo "Error Connecting to Database.";
  }
?>