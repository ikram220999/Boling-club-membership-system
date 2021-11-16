<?php
session_start();
include("dbconnect.php");

if(isset($_SESSION['username']))
{
    $current_user = $_SESSION['username'];
    $categ = $_SESSION['catid'];
    

    if($conn)
    {
      $stdate = $_POST['startd'];
      $endate = $_POST['endd'];
      $fees = $_POST['fees'];
      $current_date = date("m-d-Y");


      $sql = "INSERT INTO `membership`(`mem_joindate`, `mem_enddate`, `category`, `username`) VALUES ('".$stdate."','".$endate."','".$categ."','".$current_user."')";

      if (mysqli_query($conn, $sql))
              {
                  $sql2 = "SELECT mem_id FROM membership WHERE username='".$current_user."' ";

                  $result2=mysqli_query($conn,$sql2);

                  if (mysqli_num_rows($result2)==1) 
                  {
                    while($row2 = mysqli_fetch_array($result2))
                    {
                      $memid = $row2['mem_id'];

                      $sql3 = "INSERT INTO `payment`(`pay_date`, `pay_amount`, `member_id`) VALUES ('".$current_date."','".$fees."','".$memid."')";

                      if (mysqli_query($conn, $sql3)) 
                      {

                        $sql4 = "UPDATE user SET membershipid='".$memid."' WHERE username='".$current_user."' ";

                        if (mysqli_query($conn, $sql4)) 
                        {

                        unset($_SESSION['catid']);
                        echo "<script>window.alert('Success, You are now member !')</script>";
                        echo ("<script type='text/javascript'>window.location.href = 'profile.php'</script>");
                        }
                        else
                        {
                          echo "<script>window.alert('Failed !')</script>";
                          echo ("<script type='text/javascript'>window.location.href = 'payment.php'</script>");
                        }

                      }
                      else
                      {
                        echo "<script>window.alert('Failed, try again later !')</script>";
                        echo ("<script type='text/javascript'>window.location.href = 'payment.php'</script>");
                      }



                    }
                  }
                  else
                  {
                    echo "<script>window.alert('Error !')</script>";
                    echo ("<script type='text/javascript'>window.location.href = 'payment.php'</script>");
                  }
              }
              else
              {
                  echo "<script>window.alert('Failed to make payment !')</script>";
                  echo ("<script type='text/javascript'>window.location.href = 'payment.php'</script>");
              }


      
          
      
    }
}


?>

