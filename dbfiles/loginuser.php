<?php
  session_start();
  require 'dbconnect.php';
  $err="";
  if(isset($_REQUEST['submit']))
  {
      $username=$_REQUEST['username'];
      $password=$_REQUEST['password'];
      $sql="select * from login_data where username='$username'";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0)
      {
              $row=mysqli_fetch_assoc($result);
              if($password==$row['password'])
              {
                  $name=$row['name'];
                  
                
                  $_SESSION["name"]=$name;
                  $_SESSION['password']=$password;
                  
                  
                  header("Location:../index/index.php");
                        
              }
              else
              {
                session_unset();
                session_destroy();
                header("Location:../index.php?err='invalid password'");
               
              }
      }
      else
      {
         session_unset();
                session_destroy();
               
        header("Location:../index.php?err='invalid username'");
      }
 
  }
?>