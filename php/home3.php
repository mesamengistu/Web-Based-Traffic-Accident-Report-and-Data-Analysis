<?php
include 'guard.php';
include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\navigational.html'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>Ethiopian programming</title>
        
        <script src ="http://localhost/mengistu/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/mengistu/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href ="http://localhost/mengistu/traffic_accident_report/css/bootstrap.css"   type ="text/css" rel ="stylesheet">     
        <link href ="http://localhost/mengistu/traffic_accident_report/css/shadow.css" rel ="stylesheet" >
        <style>
            body{padding-top:60px;}
        </style>
        <?php
            $chek =1;
            $targa_num = $driver_fname =$driver_lname = $driver_id =$driver_phone ="";
if($_SERVER['REQUEST_METHOD'] =="POST")
{
     if(isset($_POST['submit']))
    { 

           $GLOBALS['acci_place_altitude']=    ($_POST['acci_place_altitude']);
           $GLOBALS['acci_place_latitude'] = ($_POST['acci_place_latitude']);
           $GLOBALS['acci_place_spacif'] = ($_POST['acci_place_spacif']);
           $GLOBALS['acci_place_area'] = ($_POST['acci_place_area']);

           $GLOBALS['acci_pedestrian_maneuver'] = ($_POST['acci_pedestrian_maneuver']);
           $GLOBALS['acci_type'] = ($_POST['acci_type']);
           $GLOBALS['acci_couse'] = ($_POST['acci_couse']);


           $GLOBALS['acci_no_die'] =   ($_POST['acci_no_die']);
           $GLOBALS['acci_no_severlyinjure'] = ($_POST['acci_no_severlyinjure']);
           $GLOBALS['acci_no_slightlyinjure'] = ($_POST['acci_no_slightlyinjure']);
           $GLOBALS['acci_damage_inbirr'] =   ($_POST['acci_damage_inbirr']);
           $GLOBALS['acci_about'] = ($_POST['acci_about']);
    }
      if($GLOBALS['chek']  == 1 )
           {
                $accident =  array(); 
                $accident['acci_place_altitude'] =   $GLOBALS['acci_place_altitude'];
                $accident['acci_place_latitude'] =   $GLOBALS['acci_place_latitude'];
                $accident['acci_place_spacif'] =     $GLOBALS['acci_place_spacif'];
                $accident['acci_place_area'] =      $GLOBALS['acci_place_area'];

                $accident['acci_pedestrian_maneuver'] =  $GLOBALS['acci_pedestrian_maneuver'];
                $accident['acci_type'] =   $GLOBALS['acci_type'];
                $accident['acci_couse'] =  $GLOBALS['acci_couse'];

                $accident['acci_no_die'] =   $GLOBALS['acci_no_die'];
                $accident['acci_no_severlyinjure'] =   $GLOBALS['acci_no_severlyinjure'];
                $accident['acci_no_slightlyinjure'] =   $GLOBALS['acci_no_slightlyinjure'];
                $accident['acci_damage_inbirr'] =   $GLOBALS['acci_damage_inbirr'];
                $accident['acci_about'] =   $GLOBALS['acci_about'];
                $_SESSION['accident'] =$accident;  
                header('location:home4.php');   
           }

}
        
          function test_latitude($data)
          {
             $data =trim($data);
             $data =strtolower($data);
             if (empty($data)){ $GLOBALS['chek'] = 2; $data = "Latitude is null";}
             elseif(!preg_match("/^[0-9]+$/",$data)){  $GLOBALS['chek'] = 2; $data = "INCORRECT Latitude";}
             return $data;
          }   
           function test_altitude($data)
          {
             $data =trim($data);
             $data =strtolower($data);
             if (empty($data)){ $GLOBALS['chek'] = 3; $data = "Altitude is null";}
             elseif(!preg_match("/^[0-9]+$/",$data)){  $GLOBALS['chek'] = 3; $data = "INCORRECT Altitude NUMBER";}
             return $data;
          }  
          function test_place($data)
         {
             $data = trim($data);
             if (empty($data)){$GLOBALS['chek'] = 4; $data = "place is null";}
             elseif(!preg_match("/^[0-9a-zA-Z]+$/",$data)){ $GLOBALS['chek'] = 4; $data = "INCORRECT TARGA NUMBER";}
             return $data;
         }  
           function acci_no1($data)
         {
             $data = trim($data);
             if (empty($data)){$GLOBALS['chek'] = 5; $data = "Fild is null";}
             elseif(!preg_match("/^[0-9]+$/",$data)){ $GLOBALS['chek'] = 5; $data = "INCORRECT  NUMBER";}
             return $data;
         }  
           function acci_no2($data)
         {
             $data = trim($data);
             if (empty($data)){$GLOBALS['chek'] = 5; $data = "Fild is null";}
             elseif(!preg_match("/^[0-9]+$/",$data)){ $GLOBALS['chek'] = 6; $data = "INCORRECT  NUMBER";}
             return $data;
         }  
           function acci_no3($data)
         {
             $data = trim($data);
             if (empty($data)){$GLOBALS['chek'] = 5; $data = "Fild is null";}
             elseif(!preg_match("/^[0-9]+$/",$data)){ $GLOBALS['chek'] = 7; $data = "INCORRECT  NUMBER";}
             return $data;
         }  
           function acci_birr($data)
         {
             $data = trim($data);
             if (empty($data)){$GLOBALS['chek'] = 8; $data = "Fild is null";}
             elseif(!preg_match("/^[0-9]+$/",$data)){ $GLOBALS['chek'] = 5; $data = "INCORRECT  NUMBER";}
             return $data;
         }  


        ?>
        <script type ="text/javascript">
          function getpedstrian(s1,s2)
          {
               var s1 =document.getElementById(s1);
               var s2 =document.getElementById(s2);
                s2.innerHTML ="";
                if(s1.value =="colliding with Pedestrian"){
              var optionArray =["|","Crossing Zebra|Crossing Zebra","Leaving Motor Vehicle|Leaving Motor Vehicle","Head-on|Head-on","Working on Motor Vehicle|Working on Motor Vehicle","Standing|Standing","Playing|Playing","Laying|Laying","Other|Other"];
          }
          for(var option in optionArray)
          {
            var pair =optionArray[option].split("|");
            var newoption = document.createElement("option");
            newoption.value =pair[0];
            newoption.innerHTML =pair[1];
            s2.options.add(newoption);
          }

          }
        </script>
    </head>
    <body>
         <form  method ="post" action ='<?php $_SERVER["PHP_SELF"] ?>' enctype ="multipart/form-data" class ="form-horizontal">
            <div class="container">
                <div class="row">
                    <div class ="row">
                        <div class ="col-lg-6 border"><h2>Aciddent Place </h2>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Altitude Reading</label>
                                        <div class ="col-lg-9">
                                              <input type ="text" name ="acci_place_altitude"  id ="sp_place"class ="form-control " >
                                              <span class="error"><?php if($chek==2){echo $GLOBALS['acci_place_latitude'];} ?></span> 
                                             
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Latitude Reading</label>
                                        <div class ="col-lg-9">
                                              <input type ="text" name ="acci_place_latitude"  id ="sp_place"class ="form-control " >
                                              <span class="error"><?php if($chek==3){echo $GLOBALS['acci_place_altitude'];} ?></span> 
                                             
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Spacific Place name</label>
                                        <div class ="col-lg-9">
                                              <input type ="text" name ="acci_place_spacif"  id ="sp_place"class ="form-control " >
                                              <span class="error"><?php if($chek==4){echo $GLOBALS['acci_place_spacif'];} ?></span> 
                                             
                                        </div>      
                                </div>
                                 <div class ="form-group">
                                    <label  class ="control-label col-lg-3 "> Accident Area</label>
                                        <div class ="col-lg-9">
                                              <select name ="acci_place_area"  id ="acci_place_area" class ="form-control ">
                                               <option  value ="rural Town">Rural Town</option>
                                               <option  value ="outside of Rural Town">Outside of Rural Town</option>
                                               <option  value ="school area">School area</option>
                                               <option  value ="factory area"selected>Factory area </option>
                                               <option  value ="worshiping area">Worshiping area</option>
                                               <option  value ="market area">Market area</option>
                                               <option  value ="temple area">Temple area</option>
                                               <option  value ="hospital area">Hospital area</option>
                                               <option  value ="office area">Office area</option>
                                               <option  value ="residential area">Residential area</option>
                                               </select>
                                        </div>      
                                </div>
                           
                        </div>   
                        <div class ="col-lg-6 border"><h2>About Aciddent </h2>
                           
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Accident Reson</label>
                                        <div class ="col-lg-9">
                                              <select name ="acci_couse"  id ="acci_couse"class ="form-control ">
                                               <option  value ="over Speed">Over Speed</option>
                                               <option  value ="menged Mesat">Menged Mesat</option>
                                               <option  value ="sew Gebto">Sew Gebto</option>
                                               <option  value ="driving Without Licence" selected>Driving Without Licence</option>
                                               <option  value ="tirf Chinet">Tirf Chinet</option>
                                               <option  value ="sew gebtobet">sew gebtobet</option>
                                               <option  value ="ensisa Gebtobet">ensisa Gebtobet</option>
                                               <option  value ="technic Problem">Technic Problem</option> 
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Accident Type</label>
                                        <div class ="col-lg-9">
                                              <select name ="acci_type" id="acci_type"  class ="form-control" onchange ="getpedstrian(this.id,'acci_pedestrian_maneuver');" >
                                               <option  value ="angle">Angle</option>
                                               <option  value ="head-on">Head-on</option>
                                               <option  value ="sideswipe-same direction">Sideswipe-same direction</option>
                                               <option  value ="colliding with Animals">Colliding with Animals</option>
                                               <option  value ="colliding with Pedestrian">Colliding with Pedestrian</option>
                                               <option  value ="sideswipe-same direction">Sideswipe-same direction</option>
                                               <option  value ="colliding with Objects">Colliding with Objects</option>
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Pedestrian Maneuver</label>
                                        <div class ="col-lg-9">
                                              <select name ="acci_pedestrian_maneuver" id ="acci_pedestrian_maneuver"  class ="form-control " >
                                               <option  value ="null"selected></option>
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">No People die</label>
                                        <div class ="col-lg-9">
                                              <input type ="text" name ="acci_no_die"  class ="form-control " >
                                              <span class="error"><?php if($chek==5){echo $GLOBALS['acci_no_die'];} ?></span> 
                                             
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 "> No Severely Injured</label>
                                        <div class ="col-lg-9">
                                              <input type ="text" name ="acci_no_severlyinjure" class ="form-control " >
                                              <span class="error"><?php if($chek==6){echo $GLOBALS['acci_no_severlyinjure'];} ?></span> 
                                             
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 "> No Slightly Injured</label>
                                        <div class ="col-lg-9">
                                              <input type ="text" name ="acci_no_slightlyinjure"  class ="form-control " >
                                              <span class="error"><?php if($chek==7){echo $GLOBALS['acci_no_slightlyinjure'];} ?></span> 
                                             
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Property Damage</label>
                                        <div class ="col-lg-9">
                                              <input type ="text" name ="acci_damage_inbirr"  class ="form-control " >
                                              <span class="error"><?php if($chek==8){echo $GLOBALS['acci_damage_inbirr'];} ?></span> 
                                             
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Description about accident</label>
                                        <div class ="col-lg-9">
                                              <textarea  name ="acci_about"class ="form-control " placeholder="say some thing about the accident"></textarea> 
                                        </div>      
                                </div>   

                        </div>
                    </div>  
                </div>
                <div class ="row" style="margin-bottom: 20px;">
                    <div  style =" padding-top:30px;"class ="col-lg-6 col-lg-offset-6">
                        <input type="submit" class =" btn btn-primary col-lg-6 col-lg-offset-3"  value ="Next" name ="submit">
                    </div>

                </div>
            </div>
         </form>    
    </body>

     <?php
       include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\footer.html'; 
     ?>
</html>