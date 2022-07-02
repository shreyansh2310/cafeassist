<?php
  require 'dbfiles/loginuser.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
              Yamuna login
        </title>
        <style>
            body{
                background-image: url(image/login3.jpg);
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-size: cover; 
            }
            .parent
            {
                display: flex;
            }
            .left{
                width: 60%;
                color: aliceblue;
                text-align: center;
                margin-top: 0%;
               margin-right: 270px; 
            }
           .left h1{
               font-size: 100px;
               
           }
           .left h2{
               font-size: 50px;
           }
            .right{
                width: 40%;
                margin-right: 150px;
                margin-top: 50px;
            }
            .container{
                width: 300px;
                height: 450px;
                background-color: rgba(30, 30, 30,.5);
                margin-top: 25%;
                border-radius: 30px;
            }
            .header{
                text-align: center;
                padding:20px;
          
            }
            .header h1{
                color: whitesmoke;
            }
            .main{
                text-align: center;
                margin-top: 10px;
            }
            .container:hover{
                box-shadow: 7px 7px 10px 7px white ;
            }
/*  
            .main input,button{
                width: 70px;
                height: 45px;
                border-radius: 25px;
                background-color: aquamarine;
               
                font-size: 20px;
            
            } */
            .main input,button{
                font-size: 20px;
                border-radius: 30px;
                padding: 10px;
                margin-top: 20px;
               color: whitesmoke;
                background-color: rgba(30, 30, 30, .5);
             
             }
             .main button{
             margin-top: 30px;
             width: 150px;
            margin-bottom:20px;
             }
             .main button:hover{
                 background-color:#fcbd34;
                 color:#2c2c2c;
             }
            h3{
                color:whitesmoke;
                text-align: center;
            }
        
        </style>
    </head>
    <body>
        <div class="parent">

       
        <div class="left">
           <h1>Welcome!</h1>
           <h2>Yamuna Everfresh &<br>Fast Foods</h2>
        </div>
        <div class="right">
        <div class="container">
            <div class="header">
                <h1>LOGIN</h1>
            </div>
            <div class="main">
                <form action="dbfiles/loginuser.php" method="POST">
                <?php
                              if(isset($_REQUEST['err']))
                              {
                              echo '<h3> *'.$_REQUEST['err'].'</h3>';
                              }
                           ?>
                    <span>
                          <input type="text" placeholder="username" name="username" required>
                          
                    </span>
                    <span>
                        <input type="password" placeholder=" password" name="password" required>
                    </span>
                  <br>
                    <button class="col" name="submit">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>

    </div>
    </body>
</html>