
<?php

        require 'navigationalbar.html';
        
?>

<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>cars number in accident </title>
        <script src ="juery.js"></script> 
        <script src ="bootstrap.js"> </script>
        <link href ="bootstrap.css" rel ="stylesheet ">
        <style>
             body{padding-top:60px;}
        </style>
    </head>
    <body>
        <div class ="container">
            <div class ="row">
                <div class ="col-lg-12">
                    <div class =" col-lg-offset-3 col-lg-6">
                        <img src="images\police.jpeg" class ="img-responsive" style ="width:90%; height:200px;" >
                    </div>
                </div>
                <div class =" col-lg-offset-3 col-lg-6">
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
                    <form method ="post" action ="">
                        <div class ="form-group">
                               <label  class =" col-lg-3 control-label">Number Of Car</label>
                                <div class ="col-lg-9">
                                     <input type ="text" class = "form-control" name ="num_car"  placeholder ="number">
                                </div>
                        </div>
                        <div style ={ padding-top:10px;} class ="form-group">
                                <div class = "col-lg-offset-9 col-lg-3">
                                     <button type ="submit" name ="submit" class =" col-lg-12 btn btn-success">Submit</button>
                                </div>
                        </div>

                    </form>
                      
                </div>
                <div class ="col-lg-4">

                </div>
          </div>
       </div>
    </body>
</html>

