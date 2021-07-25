<?php
  $hostname="localhost";
  $username="root";
  $password="";
  $dbname="yamuna_fast_food";

  $conn=mysqli_connect($hostname,$username,$password,$dbname);

  if(!$conn)
  {

      echo "error in connecting to db";
  }

  
?>