<?php
  $status=false;
  session_start();
  require '../dbfiles/dbconnect.php';

  require '../dbfiles/dbconnect.php';
  $pid=0;
  $sql="select max(pid) from menu;";

  $result=mysqli_query($conn,$sql);

  if(mysqli_num_rows($result)>0)
  {
      $row=mysqli_fetch_assoc($result);
  
      $pid=$row['max(pid)'];
   
  }                                                                                        
                                                           
                                                                                                    
  if(isset($_REQUEST['submit']))
  {
      $type=$_REQUEST['type'];
      $name=$_REQUEST['name'];
      $price=$_REQUEST['price'];

      $pid=$pid+1;
    

     $sql="insert into menu value('$pid','$type','$name','$price')";

        if(mysqli_query($conn,$sql))
        {
            $status=true;
        }
        else
        {
            echo "query execution failed";
        }

  }
  
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Home
        </title>
        <style>
          body{
              color: white;
          }
.acontainer table{
           margin:auto;
           border: 1px solid black;
           padding: 20px;
       }
      .acontainer table input,select{
           padding:15px;
           margin-top: 5px;
           margin-bottom: 5px;
           text-align: center;
           
           border-radius: 20px;
       }
   
     #submit{
         margin-left: 80px;
         margin-top: 20px;
         margin-bottom: 20px;
         
     }

    .acontainer{
        margin: auto;
        width: max-content;
        background-color: rgba(44, 44, 44, .8);
        padding: 30px;
        margin-top: 10px;

    }

     .aform input{
         padding: 20px;
         background-color: rgba(44, 44, 44, .8);
         color: white;
     }
    .aform input:hover{
        background-color: #fcbd34;
        color:#2c2c2c;
        border-radius: 20px;
    }
   
    .aheading{
        text-align: center;
    }
   


/* 

            .glow {
    font-size: 80px;
    color: #fff;
    text-align: center;
    animation: glow 1s ease-in-out infinite alternate;
  }
  
  
@-webkit-keyframes glow {
    from {
      text-shadow: 0 1 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
    }
    
    to {
      text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
    }
  }

 */





</style>

        <link rel="stylesheet" href="../style/sstyle.css" type="text/css" >
        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
<script type="text/javascript">
(function() {
emailjs.init("user_anxL86FIL1lB3668WJ4Ti");
})();
</script> -->
<script>
   function waarning()
   {
       if(confirm("Are you sure that You want to logout :)"))
       {
          
           
           return true;
       }

    

       return false;
   }
</script>
</head>
    <body>
    <div class="top">
           <h1><marquee  direction="right">Welcome! to Yamuna EverFresh and FastFoods</marquee></h1>
           
        </div>

        <div class="header">
                 <div class="logo">
                      <img src="../image/logo.jpg" alt="showlogo" width="100px" height="135px" style="margin-left: 30px;">
                 </div>
                 <div class="yamuna">
                     <img src="../image/yamuna.jfif" alt="yamunamaharani" width="100px" height="135px">
                 </div>
                 <div class="date">
                     <?php
                      if(isset($_SESSION['name']))
                      {
                          $name=$_SESSION['name'];
                          echo "<h1 class='glow'>Welcome! $name</h1>";
                      }
                     ?>
                  <h1 id="dat"></h1>
                  <h1 id="time"></h1>
                <script>
                    function date()
                    {
                      const d = new Date();
                      date="Date: ";
                      var date = date+d.getDate()+" / "+d.getMonth()+" / "+d.getFullYear();
                    
                      return date;
                    }

                    function time()
                    {
                        const d= new Date();
                        var time="Time: ";
                        time=time+d.getHours()+" : "+d.getMinutes()+" : "+d.getSeconds();
                        
                        return time;
                    }
                document.getElementById("dat").innerHTML=date();
                document.getElementById("time").innerHTML=time();
                </script>
                 
                 </div>
       
        </div>
        <div class="navbar">
           
           <ul style="list-style-type: none;">
               <li><a href="../index/index.php">HOME</a></li>
               <li><a href="../18/samplebill.php">ORDER</a></li>
               <li><a href="../chats/samplesales.php">SALES</a></li>
               <li><a href="../dataitems/sampleadd.php">ADD-ITEMS</a></li>
               
               <li><a href="../index.php" onclick="return waarning()">LOGOUT</a></li>

           </ul>
      </div>
        <div class="slide">
            <marquee width="80%" direction="left" height="50px" class="marquee">
                special offer buy two get one tandoori pizza free.
                </marquee>
        </div>




        <div class="aheading">
   <h1 class="glow">ADD ITEM TO MENU LIST</h1>
</div>
<div class="acontainer">
   <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
       <table>
           <tr><td>ITEM ID</td><td><input type="number" placeholder="<?php echo $pid ?>" readonly></td></tr>
           <tr><td>ITEM TYPE</td><td><select name="type" id="type">
               <option value="pizza">pizza</option>
               <option value="momos">momos</option>
               <option value="coffee">coffee</option>
            
           </select></td></tr>
           <tr><td>ITEM NAME</td><td><input type="text" name="name" required></td></tr>
           <tr><td>ITEM PRICE</td><td><input type="number" name="price" required></td></tr>

        </table>
     <div class="aform">
        <input type="submit" value="ADD" name="submit" id="submit">
        <input type="reset" value="RESET" id="reset">
        
        </div>
    </form>
  <?php
     if($status==true)
     {
         echo'
     <h3 style="text-align:center; color:white">SUCCESS:ITEM ADDED TO MENU LIST</h3>
     '; 
    }
  
  ?>

    </div>
  <!-- <div class="home" style="margin-left: 700px; margin-top:30px;">
    <button style="width: 100px; height:30px; text-align:center; background-color:green;">
    <a href="../index/index.php" style="text-decoration: none; color:white">HOME</a>
    </button>
    </div> -->


















                
        <div class="footer">
             <div class="fleft">
               <div class="address">
                 <h3>Address : </h3>    
               <p>78,Shubhash marg<br>Ranipura Barwani (M.P.)<br>451551</p>
               </div>
               <div class="whatsapp">
                   <table style="margin-left:0px">
                   <tr><td><img src="../image/whatsapp.jfif" alt="whatsapp-image" width="50px" height="50px"></td><td> <h4>+91-9755863592</h4></td></tr>
                   </table>
                </div>
                <h3>follow us on</h3>
                <div class="follow">
                    
                    <div class="facebook">
                   <a href="https://www.facebook.com"> <img src="../image/facebook.jfif" alt="facebook-image" width="50px" height="50px"></a>
                    </div>
                    <div class="instagram">
                    <a href="https://www.instagram.com"><img src="../image/instagram.jfif" alt="instagram-image" width="50px" height="50px"></a>
                    </div>
                </div>
             </div>
             <div class="fright">
                 <h1 style="text-align:center;">Contact us</h1>
                 <div class="form" style="margin-left: 250px;">
                 <form method="POST">
                    
                          <input type="text" placeholder="email address" id="email" >
                          <input type="number" placeholder="contact number" id="contact" >
                   <textarea name="message" id="message" cols="35" rows="7" placeholder="message" id="message"></textarea>
                   <span class="send"><br>
                       <button type="submit" onclick="sendemail()">Send</button>
                       </span>
                 </form>
                 </div>
             </div>
         </div>

         <div class="lfooter">
         <h3>&copy; Copyright 2021-2022 Yamuna Fastfoods</h3>
         <h4 class="glow" style="font-size: 15px;">Design & Developed by Shreyansh</h4>
        
         </div>
         
         

    </body>
</html>