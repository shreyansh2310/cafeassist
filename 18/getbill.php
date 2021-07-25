 <!DOCTYPE html>
 <html>
 <head>
  <!-- <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
  <script>

function generatepdf()
{

   const element = document.getElementById('pdf');

   html2pdf()

   .from(element)
   .save();

}
  </script> -->

 </head>
 <body>
   

<?php

  require '../dbfiles/dbconnect.php';
  
   if($_SERVER['REQUEST_METHOD']=='GET')
   {
     
       if(isset($_GET['submit']))
       {
      
           $uname=$_GET['uname'];
           $ucontact=$_GET['ucontact'];

           if($uname!="")
           {
           echo '<div id="pdf"></div>';

             echo '<div class="container" style="padding:10px; border: 2px solid white; width:fit-content; margin:auto; color:white; background-color:rgba(44,44,44,.8);">
              <h1 class="header" style="text-align:center">YAMUNA FASTFOODS<br>BILL INVOICE</h1>';
              echo '<table>';
              echo '<tr><th>NAME :</th><td>'.$uname.'</td> <th>TIME :</th><td>'.date('H : i : sa').'</td></tr>';
              echo '<tr><th>CONTACT :</th><td>'.$ucontact.' </td><th>DATE :</th><td>'.date('d/F/y').'</td></tr>';
                 echo '</table>';
                 echo "<br>";
         echo '  <table style="border:1px solid black; margin:auto; font-size:15px">
                 <tr><th>ORDER-ITEM</th><th>QUANTITY</th><th>PRICE</th><th>AMOUNT</th></tr>';
  
         $sql="select * from menu";
         $total=0;
         $pizza=0;
         $momos=0;
         $coffee=0;
         $result=mysqli_query($conn,$sql);
         
         function value($str1,$str2)
         {
           
              $val1= intval($str1);
              $val2=intval($str2);
      
              return $val1*$val2;
         }

          if(mysqli_num_rows($result)>0)
          {
            while($row=mysqli_fetch_assoc($result))
            {

            
              
              $name="quan".$row['pid']; 
         if(isset($_REQUEST[''.$name.'']))
         {
           if($_REQUEST[''.$name.'']>0)
           {
            $total=$total+intval($_REQUEST[''.$name.''])*intval((int)$row['price']);
           echo  '<tr><th>'.$row['name'].'</th><th>'.$_REQUEST[''.$name.''].'</th><th>'.$row['price'].'</th><th>'.value($_REQUEST[''.$name.''],$row['price']).'</th></tr>';
            
           if($row['type']=="pizza")
           {
             $pizza=$pizza+$_REQUEST[''.$name.''];
           }
           elseif($row['type']=="momos")
           {
             $momos=$momos+$_REQUEST[''.$name.''];
           }
           elseif($row['type']=="coffee")
           {
              $coffee=$coffee+$_REQUEST[''.$name.''];

           }
          
          }
          }

        
           
      }
    }

         echo  '<tr><th>TOTAL :</th><th></th><th></th><th>'.$total.'</th></tr>';
                
         echo '</table>  
         <h3 style="text-align:center;">THANK YOU<br>VISIT AGAIN</h3>  </div>';
         
         echo '</div>';    
         $orderid=date('YFdhis');
         $month="july";
         $day=(String)date('l');
         $sql=" insert into order_data value('$orderid',$pizza,$momos,$coffee,$total,'$ucontact','$month','$day');";
          if(mysqli_query($conn,$sql))
          {
            echo "data added to the database";
          }
          else{
            echo mysqli_error($conn);
          }

           }
           
       }
   }
 
?>
<!-- 
<button onclick="generatepdf()">Download Bill</button> -->


</body>
 </html>