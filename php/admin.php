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
        <link  href ="http://localhost/mengistu/traffic_accident_report/css/bootstrap.css"  type ="text/css" rel ="stylesheet" >     
        <link href ="http://localhost/mengistu/traffic_accident_report/css/shadow.css" rel ="stylesheet" >  
        <link rel="stylesheet" href="../css/style.css">
         <style>
            .color{background-color: rgb(35, 107, 241);
            height: 35px;
            color:white;
                   }
            .a{background: black;padding: 0px 5px; margin: opx;}
            body{padding-top: 60px; padding-bottom: 30px;}
        </style>
        
    </head>
    <body>
     <div class="container-fluid" style="padding-top:70px;padding-bottom: 70px;">
            <div class="row ">
                <div class="  col-lg-offset-3 col-lg-6" >
                    <ul class="nav nav-stacked nav-stacked  " >
                        <li class=" form-container list-group-item-success"><a href="addtraffic.php"><span class=""></span>REGISTER TRAFFIC</a></li>
                        <li class=" form-container list-group-item-success"><a href="admin_edit.php"><span class=""></span> EDIT TRAFFIC</a></li>
                        <li class=" form-container list-group-item-success"><a href="recent_accident_view_page.php"><span class=""></span>REPORTS</a></li>  
                         <li class=" form-container list-group-item-success"><a href="analysis.php"><span class=""></span>VIEW Analyized Data</a></li>  
                    </ul>
                </div>  
            </div>
        </div>
    </body>
    <?php

        include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\footer.html';        
?>
    
</html>
