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
          
          /* .headvideo{
    height: 100vh;
}

.headvideo video{
    position: fixed;
    right: 0;
    bottom: 0;
    top: 0;
    left: 0;
    min-width: 100%;
    min-height: 100%;
    z-index: -1;
    background-attachment: fixed;
    
} */






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
        <!-- <section class="headvideo">
            <video src="../image/bvideo.mp4" type="video/mp4" autoplay muted loop></video> -->
       
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
                      else{
                          echo "<h1>session as not set</h1>";
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
                 <li><a href="index.php">HOME</a></li>
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
        <h1 style="text-align: center;">MENU</h1>
        
        <div class="menu">
            <div class="pizza">
                <div class="pic">

                <h1 class="glow">PIZZA</h1>
                         <!-- <img src="../image/menu-pizza.jpg" alt="pizza-pic"> -->
                </div>
                <div class="item">
               
                  <?php
                     $sql="select * from menu where type='pizza'";
                     $result=mysqli_query($conn,$sql);
               
                     if(mysqli_num_rows($result)>0)
                     { 
                     
                         while($row=mysqli_fetch_assoc($result))
                         {
                            // echo "<h1>id: ".$row['pid']." type :".$row['type']."  name: ".$row['name']."  price :".$row['price']."</h1><br>";

                            echo  '<div class="pbox">
                             <h1>'.$row['name'].'</h1>
                             <h3>price:'.$row['price'].' Rs</h3>
                             </div>';
                             
                         }

                         
                     }
               
                  ?>
<!--                 
                                    <div class="pbox">
                                    <h1>TANDOORI PIZZA</h1>
                                    <h3>price:120 Rs</h3>
                                    </div>
                                    <div class="pbox">
                                    <h1>TANDOORI PIZZA</h1>
                                    <h3>price:120 Rs</h3>
                                    </div> <div class="pbox">
                                    <h1>TANDOORI PIZZA</h1>
                                    <h3>price:120 Rs</h3>
                                    </div> <div class="pbox">
                                    <h1>TANDOORI PIZZA</h1>
                                    <h3>price:120 Rs</h3>
                                    </div> <div class="pbox">
                                    <h1>TANDOORI PIZZA</h1>
                                    <h3>price:120 Rs</h3>
                                    </div> <div class="pbox">
                                    <h1>TANDOORI PIZZA</h1>
                                    <h3>price:120 Rs</h3>
                                    </div> <div class="pbox">
                                    <h1>TANDOORI PIZZA</h1>
                                    <h3>price:120 Rs</h3>
                                    </div> <div class="pbox">
                                    <h1>TANDOORI PIZZA</h1>
                                    <h3>price:120 Rs</h3>
                                    </div> <div class="pbox">
                                    <h1>TANDOORI PIZZA</h1>
                                    <h3>price:120 Rs</h3>
                                    </div> -->
                </div>
            </div>

            <div class="margin">

            </div>
               
            <div class="pizza">
                <div class="pic">
                <h1 class="glow" >COFFEE</h1>
                <!-- <img src="../image/coffee.jpg" alt="pizza-pic"> -->
                </div>
                <div class="item">
                
                  <?php
                     $sql="select * from menu where type='coffee'";
                     $result=mysqli_query($conn,$sql);
               
                     if(mysqli_num_rows($result)>0)
                     { 
                     
                         while($row=mysqli_fetch_assoc($result))
                         {
                            // echo "<h1>id: ".$row['pid']." type :".$row['type']."  name: ".$row['name']."  price :".$row['price']."</h1><br>";

                            echo  '<div class="pbox">
                             <h1>'.$row['name'].'</h1>
                             <h3>price:'.$row['price'].' Rs</h3>
                             </div>';
                             
                         }

                         
                     }
               
                  ?>
                </div>
            </div>

            <div class="margin">

            </div>

            <div class="pizza">
                <div class="pic">
                <h1 class="glow" >MOMOS</h1>
                <!-- <img src="../image/momo.jpg" alt="momos-pic"> -->
                </div>
                <div class="item">
                
                  <?php
                     $sql="select * from menu where type='momos'";
                     $result=mysqli_query($conn,$sql);
               
                     if(mysqli_num_rows($result)>0)
                     { 
                     
                         while($row=mysqli_fetch_assoc($result))
                         {
                            // echo "<h1>id: ".$row['pid']." type :".$row['type']."  name: ".$row['name']."  price :".$row['price']."</h1><br>";

                            echo  '<div class="pbox">
                             <h1>'.$row['name'].'</h1>
                             <h3>price:'.$row['price'].' Rs</h3>
                             </div>';
                             
                         }

                         
                     }
               
                  ?>
                </div>
            </div>


        </div>

       


        
        <div class="footer">
             <div class="fleft">
               <div class="address">
                 <h3>Address : </h3>    
               <p>78,Shubhash marg<br>Ranipura Barwani (M.P.)<br>451551</p>
               </div>
               <div class="whatsapp">
                   <table>
                   <tr><td><img src="../image/whatsapp.jfif" alt="whatsapp-image" width="50px" height="50px"><td><td> <h4>+91-9755863592</h4></td></tr>
                   </table>
                </div>
                <h3>follow us on</h3>
                <div class="follow">
                    
                    <div class="facebook">
                   <a href="https://www.facebook.com"> <img src="../image/facebook.jfif" alt="whatsapp-image" width="50px" height="50px"></a>
                    </div>
                    <div class="instagram">
                    <a href="https://www.instagram.com"><img src="../image/instagram.jfif" alt="whatsapp-image" width="50px" height="50px"></a>
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
   <script>
       function sendemail()
{   
    console.log('email send');
    // var tempparams={
    //     from_name:document.getElementById('contact').value,
    //     to_name:"shreyansh gupta",
    //     message:document.getElementById('message').value
    // };


    // emailjs.send('service_0p3699m','template_hbpk6nc',tempparams);
}

   
   </script>

<!-- </section> -->
    </body>
</html>