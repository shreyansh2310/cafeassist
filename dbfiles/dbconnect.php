<?php
  $hostname="localhost";
  $username="root";
  $password=""; #please add the database password before running the project
  $dbname="yamuna_fast_food";

  $conn=mysqli_connect($hostname,$username,$password,$dbname);

  if(!$conn)
  {

      echo "error in connecting to db";
  }
