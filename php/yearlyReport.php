
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>las year car accident annalysiss</title>
       <script src ="http://localhost/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href =" http://localhost/traffic_accident_report/css/bootstrap.css"   type ="text/css" rel ="stylesheet" >   
        <link href ="http://localhost/traffic_accident_report/css/shadow.css" rel ="stylesheet" >   
    </head>
    <body>
     <div class="container-fluid" style="padding-top:70px;padding-bottom: 70px;">
            <div class="row ">
                <div class="col-lg-9"> <h3>  ACCIDENT ANNALYSISS   </h3>
                    <table id="table"  class="table table-bordered table-hover table-responsive table-condensed">
                            <thead>  
                                  <th>Lost People</th>
                                  <th>Severly Injure</th>
                                  <th>Slightly Injure</th>
                                  <th>Lost birr</th>
                                  <th>3 most accident area</th>
                            </thead>
                            <tbody">  
                            <?php
                            include 'serch.php';
                            $today_year = date('Y');
                            $year = $today_year-1;
                            $today_month1 = date('m');
                            $today_month2 =$today_month1-1;
                            $month = $today_year."-".$today_month2;
                            $today = date('d');
                            $yesterday =$today-1;
                            $yesterday_serch = $today_year."-".$today_month1."-".$yesterday;
                            $date =2019; 
                            accident($date);
                            ?>   
                            </tbody"> 
                    </table> 
                    <table id="table"  class="table table-bordered table-hover table-responsive table-condensed">
                            <thead>  
                                  <th>car speed</th>
                                  <th>car service age</th>
                                  <th>car damage extent</th>
                                  <th>car contribution</th>
                                  <th>car ownership</th>
                                  <th>car type</th>
                                  <th>car meneuver</th>
                            </thead>
                            <tbody">  
                            <?php 
                            car($date); 
                            ?> 

                            </tbody"> 
                            <table id="table"  class="table table-bordered table-hover table-responsive table-condensed">
                              <thead>  
                                  <th>road type</th>
                                  <th>road separation</th>
                                  <th>road geometry</th>
                                  <th>road surface type</th>
                                  <th>road light</th>
                                  <th>road weather</th>
                            </thead>
                            <tbody">  
                            <?php
                              road($date);  
                            ?>   
                            </tbody"> 
                            </table> 
                            </table> 
                                <table id="table"  class="table table-bordered table-hover table-responsive table-condensed">
                                 <thead>  
                                    <th>Drive age</th>
                                    <th>Drive car Relation</th>
                                    <th>Driver Contribution</th>
                                 </thead>
                                 <tbody">  
                                  <?php
                                  ?>   
                            </tbody"> 
                    </table>       

                </div>
            </div>
        </div>
    </body>
    
</html>
