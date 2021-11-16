<?php
session_start();
include("dbconnect.php");

if($conn)
{
	$role = "user";
	$membership = 0;
  $target_dir = "images/";
  $uploadOK = 1;
  $target_file = $target_dir . basename($_FILES["uimage"]["name"]);
  //$imageFileType = strlower(pathinfo($target_file, PATHINFO_EXTENSION));

  if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["uimage"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;

      

  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


  if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["uimage"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["uimage"]["name"])). " has been uploaded.";

    $sql = "INSERT INTO user(fname,lastname,gender,address,phone,email,ic,role,username,password,userimg,membershipid) VALUES('".$_POST['fname']."','".$_POST['lname']."','".$_POST['radiogender']."','".$_POST['address']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['ic']."','".$role."','".$_POST['uname']."','".$_POST['pass']."','".$target_file."','".$membership."')";
          
   
              if (mysqli_query($conn, $sql))
              {
                  echo "<script>window.alert('Succesfully registered !')</script>";
                  echo ("<script type='text/javascript'>window.location.href = 'login.html'</script>");
              }
              else
              {
                  echo "<script>window.alert('Failed registered !')</script>";
                  echo ("<script type='text/javascript'>window.location.href = 'register.html'</script>");
              }
        
        }
      
     

   else {
    echo "Sorry, there was an error uploading your file.";
  }
   
}

}

}
 else
      {
          echo "<script>window.alert('Failed connect !')</script>";
          echo ("<script type='text/javascript'>window.location.href = 'register.html'</script>");
      }



?>

