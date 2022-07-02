<?php
  session_start();
  require '../dbfiles/dbconnect.php';
  
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Home
        </title>
        <style>
body{
   background-color: lightcoral;
}

.left
{
     width: 60%;
     background-color: lightseagreen;
   
}
.right
{
    width: 40%;
    border:1px solid black;
    margin-left: 5px;
    width: 100%;
    height: 900px;
    background-color: lightgreen;
}
.main{
    display:flex;
    padding: 10px;
}
.header{
    text-align: center;
}
 table, td,tr,th{
                padding: 20px;
                
                border-collapse:collapse;
                text-align: center;
                margin: auto;
}

.data tr{
    background-color: rgba(44, 44, 44, .8);
}

.data tr:hover{
    background-color:#fcbd34;
    color: #2c2c2c;
}

fieldset{
    margin-top: 10px;
}

input{
    padding:5px;
    border-radius:20px;
}

            h1{
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




<?php

$sql="select * from order_data";
$day=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"); 
$pizza=array(0,0,0,0,0,0,0);  
$momos=array(0,0,0,0,0,0,0);  
$coffee=array(0,0,0,0,0,0,0);  


$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{    

while($row=mysqli_fetch_assoc($result))
{

   $str=strtolower($row['day']);
   // echo $str."  ".$row['pizza']."<br>"; 
  
   if(strcmp("sunday",$str)==0)
   {
       $pizza[0]=$pizza[0]+(int)$row['pizza'];
       $momos[0]=$momos[0]+(int)$row['momos'];
       $coffee[0]=$coffee[0]+(int)$row['coffee'];
       
   }
   if(strcmp("monday",$str)==0)
   {
   
       $pizza[1]=$pizza[1]+(int)$row['pizza'];
       $momos[1]=$momos[1]+(int)$row['momos'];
       $coffee[1]=$coffee[1]+(int)$row['coffee'];
   }  if(strcmp("tuesday",$str)==0)
   {
       $momos[2]=$momos[2]+(int)$row['momos'];
       $coffee[2]=$coffee[2]+(int)$row['coffee'];
       $pizza[2]=$pizza[2]+(int)$row['pizza'];
   }  if(strcmp("wednesday",$str)==0)
   {
       $momos[3]=$momos[3]+(int)$row['momos'];
       $coffee[3]=$coffee[3]+(int)$row['coffee'];
       $pizza[3]=$pizza[3]+(int)$row['pizza'];
   }  if(strcmp("thrusday",$str)==0 ||strcmp("thursday",$str)==0)
   {
       $momos[4]=$momos[4]+(int)$row['momos'];
       $coffee[4]=$coffee[4]+(int)$row['coffee'];
       $pizza[4]=$pizza[4]+(int)$row['pizza'];
   }  if(strcmp("friday",$str)==0)
   {
       $momos[5]=$momos[5]+(int)$row['momos'];
       $coffee[5]=$coffee[5]+(int)$row['coffee'];
       $pizza[5]=$pizza[5]+(int)$row['pizza'];
   }  if(strcmp("saturday",$str)==0)
   {
       $momos[6]=$momos[6]+(int)$row['momos'];
       $coffee[6]=$coffee[6]+(int)$row['coffee'];
       $pizza[6]=$pizza[6]+(int)$row['pizza'];
   } 
   
}
}
echo "<h1 class='glow' style='font-size:30px'>WEEKLY SALES STATISTICS</h1>";
echo '<table class="data"><tr><th>DAY</th><th>PIZZA-SALES</th><th>COFFEE-SALES</th><th>MOMOS-SALES</th></tr>';
for($i=0;$i<7;$i++)
{
echo '
<tr><td>'.$day[$i].'</td><td>'.$pizza[$i].'</td><td>'.$coffee[$i].'</td><td>'.$momos[$i].'</td></tr>';
}

echo '</table>';
?>


  





                
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