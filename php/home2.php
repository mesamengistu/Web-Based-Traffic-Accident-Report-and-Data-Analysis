<?php
include 'guard.php';

include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\navigational.html'; 
            $chek =1;
            $targa_num =$car_model=$car_name =$car_speed =$car_service_age = $car_damage_extent="";
            $car_contribution=$car_ownership =$car_type=$car_maneuver=$car_img ="";
            $driv_id = $driv_fname =$driv_lname = $driv_age =$driv_car_relation=$driv_contribution=$driv_occation= $driv_expriance=$driv_sex=""; 
     if(isset($_POST['submit']))
     { 
         
           $GLOBALS['targa_num']=    test_targanum($_POST['targa_num']);
           $GLOBALS['car_model']=    test_model($_POST['car_model']);
           $GLOBALS['car_name']=    test_name($_POST['car_name']);
           $GLOBALS['car_speed']=    ($_POST['car_speed']);
           $GLOBALS['car_service_age']=    car_service_age($_POST['car_service_age']);
           $GLOBALS['car_damage_extent']=    ($_POST['car_damage_extent']);
           $GLOBALS['car_contribution']=    ($_POST['car_contribution']);
           $GLOBALS['car_ownership']=    ($_POST['car_ownership']);
           $GLOBALS['car_type']=    ($_POST['car_type']);
           $GLOBALS['car_maneuver']=    ($_POST['car_maneuver']);
           $GLOBALS['driv_id'] =   test_driverid($_POST['driv_id']);
           $GLOBALS['driv_fname'] = test_driv_name($_POST['driv_fname']);
           $GLOBALS['driv_lname'] = test_driv_name($_POST['driv_lname']);
           $GLOBALS['driv_age'] = ($_POST['driv_age']);
           $GLOBALS['driv_car_relation'] = ($_POST['driv_car_relation']);
           $GLOBALS['driv_contribution'] = ($_POST['driv_contribution']);
           $GLOBALS['driv_occation'] = ($_POST['driv_occation']);

             $GLOBALS['driv_expriance'] = ($_POST['driv_expriance']); 
             $GLOBALS['driv_sex'] = ($_POST['driv_sex']);

           $GLOBALS['car_img'] =    ($_FILES['car_img']['name']);
           if($GLOBALS['chek']  == 1 )
          {
            if($_SESSION['value'] <= $_SESSION['number'])
            {   $arrayName = array(array()); 
                $j =$_SESSION['value'];
                $arrayName[$_SESSION['value']]['targa_num'] =   $GLOBALS['targa_num'];
                $arrayName[$_SESSION['value']]['car_model'] =   $GLOBALS['car_model'];
                $arrayName[$_SESSION['value']]['car_name'] =   $GLOBALS['car_name'];
                $arrayName[$_SESSION['value']]['car_speed'] =   $GLOBALS['car_speed'];
                $arrayName[$_SESSION['value']]['car_service_age'] =   $GLOBALS['car_service_age'];
                $arrayName[$_SESSION['value']]['car_damage_extent'] =   $GLOBALS['car_damage_extent'];
                $arrayName[$_SESSION['value']]['car_contribution'] =   $GLOBALS['car_contribution'];
                $arrayName[$_SESSION['value']]['car_ownership'] =   $GLOBALS['car_ownership'];
                $arrayName[$_SESSION['value']]['car_type'] =   $GLOBALS['car_type'];
                $arrayName[$_SESSION['value']]['car_maneuver'] =   $GLOBALS['car_maneuver'];
                $arrayName[$_SESSION['value']]['car_img'] =   $GLOBALS['car_img'];
                $arrayName[$_SESSION['value']]['driv_id'] =    $GLOBALS['driv_id'];
                $arrayName[$_SESSION['value']]['driv_fname'] = $GLOBALS['driv_fname'];
                $arrayName[$_SESSION['value']]['driv_lname'] = $GLOBALS['driv_lname'];
                $arrayName[$_SESSION['value']]['driv_age'] =    $GLOBALS['driv_age'];
                $arrayName[$_SESSION['value']]['driv_car_relation'] =    $GLOBALS['driv_car_relation'];
                $arrayName[$_SESSION['value']]['driv_contribution'] =    $GLOBALS['driv_contribution'];
                $arrayName[$_SESSION['value']]['driv_occation'] =    $GLOBALS['driv_occation'];

                $arrayName[$_SESSION['value']]['driv_expriance'] =    $GLOBALS['driv_expriance'];
                $arrayName[$_SESSION['value']]['driv_sex'] =    $GLOBALS['driv_sex']; 

                $_SESSION['value'] = $_SESSION['value']+1;
                $_SESSION['datas'.$j.''] = $arrayName;
                 test_img();
                if($_SESSION['value']>$_SESSION['number'])
                {
                    header('location:home3.php'); 
                }   
            }
            }
            
     }   
       function test_img()
        {
            
                $image_name = $_FILES['car_img']['name'];
                $target = "../images/".basename($image_name);
               if(preg_match("/(\.jpg|\.jpeg|\.png|\.gif)$/i",$image_name))
                 {
                      if(move_uploaded_file($_FILES['car_img']['tmp_name'],$target))
                     {
                     echo "file succcesfully saved";
                     }   
                 }  
        }
         function test_targanum($data)
         {
             $data = trim($data);
             if (empty($data)){$GLOBALS['chek'] = 2; $data = "Targa is null";}
             elseif(!preg_match("/^[0-9a-zA-Z]+$/",$data)){ $GLOBALS['chek'] = 2; $data = "INCORRECT TARGA NUMBER";}
             return $data;
         } 
          function test_model($data)
         {
             $data = trim($data);
             if (empty($data)){$GLOBALS['chek'] = 3; $data = "model is null";}
             elseif(!preg_match("/^[0-9a-zA-Z]+$/",$data)){ $GLOBALS['chek'] = 3; $data = "INCORRECT Car Model";}
             return $data;
         } 
          function test_name($data)
          {
             $data =trim($data);
             $data =strtolower($data);
             if (empty($data)){ $GLOBALS['chek'] = 4; $data = "name is null";}
             elseif(!preg_match("/^[0-9a-zA-Z]+$/",$data)){  $GLOBALS['chek'] = 4; $data = "INCORRECT Car Name";}
             return $data;
          }   
  
           function car_service_age($data)
          {
             $data =trim($data);
             $data =strtolower($data);
             if (empty($data)){ $GLOBALS['chek'] = 6; $data = " Srvice age is null";}
             elseif(!preg_match("/^[0-9]+$/",$data)){  $GLOBALS['chek'] = 6; $data = "INCORRECT TARGA NUMBER";}
             return $data;
          } 
           function test_driverid($data)
          {
             $data = trim($data);
             $region =  strtolower(substr($data, 0,2));
             $num = substr($data, 2);
             if (empty($data)){  $GLOBALS['chek']= 7; $data = "id is null";}
             elseif(!preg_match("/^[a-zA-Z0-9]+$/",$data)){ $GLOBALS['chek'] = 7; $data = "INCORRECT Id NUMBER";}
             if (empty($region)){ $GLOBALS['chek'] = 7; $data = "region is null";}
             elseif(!preg_match("/|snnpr|or|gam|amh|tg|som|ben|aa|dd/",$region)){ $GLOBALS['chek'] = 7; $data = "Unkwon region code ";}
             return $data;
          }
           function test_driv_name($data)
          {
             $data =trim($data);
             $data =strtolower($data);
             if (empty($data)){ $GLOBALS['chek'] = 8; $data = "Name is null";}
             elseif(!preg_match("/^[a-z]+$/",$data)){  $GLOBALS['chek'] = 8; $data = "INCORRECT Name";}
             return $data;
          } 
          
?>

<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <metau name ="viewport" content="width= device-width , intial-scale=1">
        <title>Ethiopian programming</title>
        <script src ="http://localhost/mengistu/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/mengistu/traffic_accident_report/js/bootstrap.js"> </script>
        <link href ="http://localhost/mengistu/traffic_accident_report/css/bootstrap.css" rel ="stylesheet ">
        <style>
            body{ padding-top:60px;}
        </style>
    </head>
    <body>
       <center> <h3>Enter Information About Car <?php echo $_SESSION['value'] ; ?></h3></center>
    <form  method ="post" action ='<?php $_SERVER["PHP_SELF"] ?>' enctype ="multipart/form-data" class ="form-horizontal">
        <div class ="container" style ="margin-bottom:20px;">
            <div class ="row">
                <div class ="col-lg-6 border "> <h2>Enter Car Info </h2>
                             <div class ="form-group">
                                   <label  class ="control-label col-lg-3 a">targa number </label>
                                    <div class ="col-lg-9">
                                         <input type ="text"  name ="targa_num" class = "form-control" id ="car_id" >
                                        <span class="error"><?php if($chek==2){echo $GLOBALS['targa_num'];} ?></span> 
                                    </div>
                             </div>
                              <div class ="form-group">
                                   <label  class ="control-label col-lg-3 a">car model </label>
                                    <div class ="col-lg-9">
                                         <input type ="text"  name ="car_model" class = "form-control" id ="car_model"  placeholder ="">
                                        <span class="error"><?php if($chek==3){echo $GLOBALS['car_model'];} ?></span> 
                                    </div>
                             </div>
                             <div class ="form-group">
                                   <label  class ="control-label col-lg-3 a">Car Name </label>
                                    <div class ="col-lg-9">
                                         <input type ="text"  name ="car_name" class = "form-control" id ="car_name"  placeholder ="">
                                        <span class="error"><?php if($chek==4){echo $GLOBALS['car_name'];} ?></span> 
                                    </div>
                             </div>


                             <div class ="form-group">
                                 <label  class ="control-label col-lg-3 ">speed of Vichle</label>
                                     <div class ="col-lg-9">
                                           <select name ="car_speed" class ="form-control">
                                        <option  value ="<30"><30</option>
                                        <option  value ="30-40">30-40</option>
                                        <option  value ="40-50">40-50</option>
                                        <option  value ="50-60">50-60</option>
                                        <option  value ="60-70">60-70</option>
                                        <option  value ="70-80">70-80</option>
                                        <option  value ="90-100">90-100</option>
                                        <option  value ="100-110">100-110</option>
                                        <option  value ="110-120">110-120</option>
                                        <option  value =">120">>120</option>
                                            </select>
                                     </div>      
                             </div>

                             <div class ="form-group">
                                   <label  class ="control-label col-lg-3 a">Service age</label>
                                    <div class ="col-lg-9">
                                         <input type ="number"  name ="car_service_age" class = "form-control" id ="car_service_age"  placeholder ="">
                                        <span class="error"><?php if($chek==6){echo $GLOBALS['car_service_age'];} ?></span> 
                                    </div>
                             </div>
                             <div class ="form-group">
                                 <label  class ="control-label col-lg-3 ">Damage Extent</label>
                                     <div class ="col-lg-9">
                                           <select name ="car_damage_extent" class ="form-control">
                                        <option  value ="severly damage">Severely Damaged</option>
                                        <option  value ="slightly damage">Slightly Damaged</option>
                                            </select>
                                     </div>      
                             </div>
                             <div class ="form-group">
                                 <label  class ="control-label col-lg-3 ">Vichle Contribution</label>
                                     <div class ="col-lg-9">
                                           <select name ="car_contribution" class ="form-control">
                                        <option  value ="breake">Brakes</option>
                                        <option  value ="steering">Steering</option>
                                        <option  value ="exhausted tire">Exhausted Tires</option>
                                        <option  value ="light">Light</option>
                                        <option  value ="mechanical deficiencies">Mechanical deficiencies</option>
                                        <option  value ="other">other</option>
                                            </select>
                                     </div>      
                             </div>
                             <div class ="form-group">
                                 <label  class ="control-label col-lg-3 ">Ownership</label>
                                     <div class ="col-lg-9">
                                           <select name ="car_ownership" class ="form-control">
                                        <option  value ="public">Public</option>
                                        <option  value ="government">Government</option>
                                        <option  value ="military">Military</option>
                                        <option  value ="police">Police</option>
                                        <option  value ="private">Private</option>
                                        <option  value ="diplomat">Diplomat</option>
                                        <option  value ="UN">UN</option>
                                        <option  value ="AU">AU</option>
                                        <option  value ="International organization">International organization</option>
                                        <option  value ="other">other</option>
                                            </select>
                                     </div>      
                             </div>
                             <div class ="form-group">
                                 <label  class ="control-label col-lg-3 ">Car Type</label>
                                     <div class ="col-lg-9">
                                           <select name ="car_type" class ="form-control">
                                        <option  value ="t1">Pedal Bicycle</option>
                                        <option  value ="t2">Motor Bicycle</option>
                                        <option  value ="t3">Automobile</option>
                                        <option  value ="t4"selected>Station wagon </option>
                                        <option  value ="t3">Pickup<=10 Quintal</option>
                                        <option  value ="t3">Truck 41-100Q</option>
                                        <option  value ="t3">Truck pulling Trailer</option>
                                        <option  value ="t3">Taxi</option>
                                        <option  value ="t3"> Public 13-45</option>
                                        <option  value ="t3">Public 13-45</option>
                                        <option  value ="t3">Public>=46</option>
                                        <option  value ="t3">Train</option>
                                        <option  value ="t3">bajaj</option>
                                        <option  value ="t3">other</option>
                                            </select>
                                     </div>      
                             </div>
                              <div class ="form-group">
                                 <label  class ="control-label col-lg-3 ">Vichle Maneuver</label>
                                     <div class ="col-lg-9">
                                           <select name ="car_maneuver" class ="form-control">
                                        <option  value ="entering Traffic Lane">Entering Traffic Lane</option>
                                        <option  value ="leaving Traffic Lane">Leaving Traffic Lane</option>
                                        <option  value ="turning Right">Turning Right</option>
                                        <option  value ="turning Left"selected>Turning Left</option>
                                        <option  value ="making “U” turn">Making “U” turn</option>
                                        <option  value ="overtaking">Overtaking</option>
                                        <option  value ="straight ahead">Straight ahead</option>
                                        <option  value ="Backing">Backing</option>
                                        <option  value ="starting Traffic Lane">Starting Traffic Lane </option>
                                        <option  value ="parking Maneuver">Parking Maneuver</option>
                                        <option  value ="public>=46">Public>=46</option>
                                        <option  value ="other">Others</option>
                                            </select>
                                     </div>      
                             </div>
                             <div class ="form-group">
                                   <label  class ="control-label col-lg-3 a">Car Image </label>
                                    <div class ="col-lg-9">
                                          <input type ="file" class = "btn btn-primary" name ="car_img" id ="car_img" class ="image" placeholder ="enter the accident in image">
                                    </div>
                            </div>   
                </div>
                <div class ="col-lg-6 border ti"> <h2>Enter Driver Info </h2>
                           
                               <div class ="form-group">
                                    <label class ="control-label col-lg-3">Licence Id</label>
                                    <div class ="col-lg-9">
                                       <input type ="text" id ="driv_id"  name ="driv_id" class ="form-control" >
                                       <span class="error"><?php if($chek==7){echo $GLOBALS['driv_id'];}?></span> 
                                    </div>
                                </div>
                                <div class ="form-group">
                                    <label class ="control-label col-lg-3">Firest Name</label>
                                    <div class ="col-lg-9">
                                        <input type ="text" id ="driv_fname" name ="driv_fname"  class ="form-control">
                                        <span class="error"><?php if($chek==8){echo $GLOBALS['driv_fname'];}?></span> 
                                    </div>
                                </div>
                                <div class ="form-group">
                                    <label class ="control-label col-lg-3">Last Name</label>
                                    <div class ="col-lg-9">
                                        <input type ="text" id ="driv_lname" name ="driv_lname"  class ="form-control">
                                        <span class="error"><?php if($chek==8){echo $GLOBALS['driv_lname'];}?></span> 
                                    </div>
                                </div>
                                 <div class ="form-group">
                                     <label  class ="control-label col-lg-3 ">Driver age</label>
                                      <div class ="col-lg-9">
                                           <select name ="driv_age" class ="form-control">
                                           <option  value ="<18"><18</option>
                                           <option  value ="18-30">18-30</option>
                                           <option  value ="31-50">31-50</option>
                                           <option  value ="51">>51</option>
                                           <option  value ="unknown">Unknown</option>
                                            </select>
                                     </div>      
                                 </div>
                                 <div class ="form-group">
                                     <label  class ="control-label col-lg-3 ">Driver Sex</label>
                                      <div class ="col-lg-9">
                                           <select name ="driv_sex" class ="form-control">
                                           <option  value ="male">Male</option>
                                           <option  value ="femal">Femal</option>
                                           <option  value ="unknown">Unknown</option>
                                            </select>
                                     </div>      
                                </div>
                                <div class ="form-group">
                                     <label  class ="control-label col-lg-3 ">Driver Vichel relation</label>
                                      <div class ="col-lg-9">
                                           <select name ="driv_car_relation" class ="form-control">
                                           <option  value ="Owner">Owner</option>
                                           <option  value ="Employee">Employee</option>
                                            </select>
                                     </div>      
                                </div>
                                <div class ="form-group">
                                     <label  class ="control-label col-lg-3 ">Driving Expriance</label>
                                      <div class ="col-lg-9">
                                           <select name ="driv_expriance" class ="form-control">
                                           <option  value ="No Driving License">No Driving License</option>
                                           <option  value ="<1"><1 Yr</option>
                                            <option  value ="1-2">1-2</option>
                                            <option  value ="2-5">2-5</option>
                                            <option  value ="5-10">5-10</option>
                                            <option  value =">10">>10</option>
                                            </select>
                                     </div>      
                                </div>
      
                                <div class ="form-group">
                                     <label  class ="control-label col-lg-3 ">Contribution Cercumistance</label>
                                      <div class ="col-lg-9">
                                           <select name ="driv_contribution" class ="form-control">
                                           <option  value ="Failed to yield to vehicle">Failed to yield to vehicle</option>
                                           <option  value ="Failed to yield pedestrian">Failed to yield pedestrian</option>
                                            <option  value ="Disregard traffic light or signals">Disregard traffic light or signals</option>
                                            <option  value ="Driving too fast">Driving too fast</option>
                                            <option  value ="Overtaking">Overtaking</option>
                                            <option  value ="Improper turn">Improper turn</option>
                                            <option  value ="Improper lane change">Improper lane change</option>
                                            <option  value ="Improper parking">Improper parking</option>
                                            <option  value ="Overtaking">Overtaking</option>
                                            <option  value ="Running off road">Running off road</option>
                                            <option  value ="Drinking">Drinking</option>
                                            <option  value ="Drugs">Drugs</option>
                                            <option  value ="Asleep">Asleep</option>
                                            <option  value ="Illness">Illness</option>
                                            <option  value ="Cell phone">Cell phone</option>
                                            <option  value ="Physical Impairment"> Physical Impairment</option>
                                            <option  value ="other">other</option>
                                            </select>
                                     </div>      
                                </div>
                                <div class ="form-group">
                                     <label  class ="control-label col-lg-3 ">Driver Occation</label>
                                      <div class ="col-lg-9">
                                           <select name ="driv_occation" class ="form-control">
                                           <option  value ="Death">Death</option>
                                           <option  value ="Severely Injured">Severely Injured</option>
                                           <option  value ="Slightly Injured">Slightly Injured</option>
                                           <option  value ="fine">fine</option>
                                           </select>
                                     </div>      
                                </div>



                        </div>
                        <div class =row>
                             <div class ="form-group">

                                 <div class ="col-lg-offset-5 col-lg-4 ">
                                     <button type ="submit" name ="submit" class ="col-lg-10 btn btn-success">Next</button>
                                 </div>
                            </div>
                        </div>
            </div>
        </div>
   </form>
   </body>
   <?php

        include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\footer.html';        
?>

</html>