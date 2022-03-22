
<?php
include 'guard.php';
include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\navigational.html'; 
        

     if($_SERVER['REQUEST_METHOD'] =="POST")
{
    if(isset($_POST['submit']))
    {
     $number = trim($_POST['num_car']);
     if(preg_match("/^[0-9]+$/",$number))
      {
          header('location:home2.php');
          $_SESSION['number'] = $number;
           $_SESSION['value'] = 1;

      }
    }
 }
         
?>
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width = device-width , intial-scale=1">
        <title>cars number in accident </title>
        <script src ="http://localhost/mengistu/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/mengistu/traffic_accident_report/js/bootstrap.js"> </script>
        <link href ="http://localhost/mengistu/traffic_accident_report/css/bootstrap.css" rel ="stylesheet ">
        <style>
             body{padding-top:60px;}
        </style>
    </head>
    <body>
        <div class ="container">
            <div class ="row">
                 
                     <div class =" col-lg-offset-3 col-lg-6">
                        <img src = "../images/police.jpeg" class ="img-responsive" style ="width:90%; height:200px;">
                   
                     </div>
                
                    
                   <div class = " col-lg-offset-2 col-lg-8 ">
                    <p>
                        
                    A traffic collision, also called a motor vehicle collision (MVC) among other terms, occurs 
                    when a vehicle collides with another vehicle, pedestrian, animal, road debris, or other 
                    stationary obstruction, such as a tree, pole or building. Traffic collisions often result 
                    in injury, death, and property damage.A number of factors contribute to the risk of 
                    collisions,including vehicle design,speed of operation, road design, road environment, and driving 
                    skills, impairment due to alcohol or drugs, and behavior, notably distracted driving, speeding
                    and street racing. Worldwide, motor vehicle collisions lead to eath and disability as well as 
                    financial costs to both society and the individuals involved. 
                     </p>
                     </div>

                    <form  method ="post" action = '<?php $_SERVER["PHP_SELF"] ?>' class ="form-horizontal">
                            <div class ="form-group">
                                 <label  class ="col-lg-3 control-label">Number Of Car</label>
                                  <div class ="col-lg-6">
                                       <input type ="number" class = "form-control" name ="num_car"  placeholder ="number">
                                  </div>
                             </div>
                        <div class ="form-group">
                                <div class = "col-lg-offset-6 col-lg-3">
                                     <button type ="submit" name ="submit" class =" col-lg-12 btn btn-success">Next</button>
                                </div>
                        </div>
                 <div class="col-lg-offset-4 col-lg-4" style="margin-bottom:50px;">
                   <a href="editreport.php"> <div class="col-lg-12 form-container btn btn-success">EDIT PREVIOUS REPORTS</div></a>
                 </div>
                  <div class="col-lg-offset-4 col-lg-4" style="margin-bottom:50px;">
                   <a href="analysis.php"> <div class="col-lg-12 form-container btn btn-success">VIEW Analyized Data</div></a>
                 </div>
                    </form>
          </div>
       </div>
   
    </body>

     <?php
     
       include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\footer.html'; 
     ?>
</html>