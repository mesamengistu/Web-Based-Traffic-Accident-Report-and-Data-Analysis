<?php
session_start();
$accidentyear_analyss = $_SESSION['acci_year'];
$analysis_tra_region = $_SESSION['tra_region'];
$analysis_tra_zone = $_SESSION['tra_zone'];
$analysis_tra_wereda= $_SESSION['tra_wereda'];
$analysis_tra_kebele = $_SESSION['tra_kebele'];
?>
<html>
  <head>

        <meta carset ="utf-8">
        <meta name ="viewport" content="width = device-width , intial-scale=1">
        <script src ="http://localhost/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href =" http://localhost/traffic_accident_report/css/bootstrap.css"   type ="text/css" rel ="stylesheet" >   
        <link href ="http://localhost/traffic_accident_report/css/shadow.css" rel ="stylesheet" >
         <title>cars number in accident </title>
       
    </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-4"><h2>Driver Age </h2>
        <canvas id="myChartcar1"></canvas>
        </div>
        <div class="col-lg-4"><h2> Driver Contribution</h2>
        <canvas id="myChartcar2"></canvas>
        </div>
         <div class="col-lg-4"><h2> Driver Expriances </h2>
        <canvas id="myChartcar3"></canvas>
        </div>
         <div class="col-lg-4"><h2> Road Separation </h2>
        <canvas id="myChartcar4"></canvas>
        </div>
         <div class="col-lg-4"><h2> Road Geoametry </h2>
        <canvas id="myChartcar5"></canvas>
        </div>
         <div class="col-lg-4"><h2> Road Surface Type </h2>
        <canvas id="myChartcar6"></canvas>
        </div>

      </div> 
      <div class="row">
         <div class="col-lg-offset-4 col-lg-4" style="margin-bottom:50px;">
                   <a href="accident_analysis.php"> <div class="col-lg-12 form-container btn btn-success">See More Analyssis</div></a>
        </div>
    </div>
    </div>
<?php
include 'serch.php';
$cars = array();
//$car_info = car(2020);
$driver_info =driver($accidentyear_analyss,$analysis_tra_region,$analysis_tra_zone,$analysis_tra_wereda,$analysis_tra_kebele);
$road = road($accidentyear_analyss,$analysis_tra_region,$analysis_tra_zone,$analysis_tra_wereda,$analysis_tra_kebele);
?>
 <script>
      let myCharta = document.getElementById('myChartcar1').getContext('2d');
      let massPopCharta = new Chart( myCharta,{
          type:'pie',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[ "<?php echo $driver_info[1]?>;","<?php echo $driver_info[3]?>;","<?php echo $driver_info[5]?>;","<?php echo $driver_info[7]?>;","<?php echo $driver_info[9]?>;"],
            datasets:[{
                 label:'Driver Age',
                  data:[
                         <?php  echo $driver_info[0] ?>,
                         <?php  echo $driver_info[2]?>,
                          <?php echo $driver_info[4] ?>,
                         <?php  echo $driver_info[6]?>,
                          <?php echo $driver_info[8] ?>,
                        
            ],
            backgroundColor:[

                'rgba(255,99,132,0.6)',
                'rgba(75,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(25,106,86,0.6)', 
                'rgba(25,19,12,0.6)'
                
                
            ]
            }]
          },
          options:{}

       });

    </script>
    <script>
      let myChartb = document.getElementById('myChartcar2').getContext('2d');
      let massPopChartb = new Chart( myChartb,{
          type:'pie',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[ "<?php echo $driver_info[11]?>;","<?php echo $driver_info[13]?>;","<?php echo $driver_info[15]?>;","<?php echo $driver_info[17]?>;","<?php echo $driver_info[19]?>;","<?php echo $driver_info[21]?>;","<?php echo $driver_info[23]?>;","<?php echo $driver_info[25]?>;","<?php echo $driver_info[27]?>;","<?php echo $driver_info[29]?>;","<?php echo $driver_info[31]?>;","<?php echo $driver_info[33]?>;","<?php echo $driver_info[35]?>;","<?php echo $driver_info[37]?>;","<?php echo $driver_info[39]?>;","<?php echo $driver_info[41]?>;","<?php echo $driver_info[43]?>;"],
            datasets:[{
                 label:'Driver Contribution',
                  data:[
                         <?php  echo $driver_info[10] ?>,
                         <?php  echo $driver_info[12]?>,
                         <?php  echo $driver_info[14] ?>,
                         <?php  echo $driver_info[16]?>,
                         <?php  echo $driver_info[18] ?>,
                         <?php  echo $driver_info[20] ?>,
                         <?php  echo $driver_info[22]?>,
                         <?php  echo $driver_info[24] ?>,
                         <?php  echo $driver_info[26]?>,
                         <?php  echo $driver_info[28] ?>,
                         <?php  echo $driver_info[30]?>,
                         <?php  echo $driver_info[32] ?>,
                         <?php  echo $driver_info[34] ?>,
                         <?php  echo $driver_info[36]?>,
                         <?php  echo $driver_info[38] ?>,
                         <?php  echo $driver_info[40]?>,
                         <?php  echo $driver_info[42] ?>
                        
            ],
            backgroundColor:[

                 'rgba(255,99,132,0.6)',
                'rgba(75,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(25,106,86,0.6)', 
               'rgba(25,19,12,0.6)',
                'rgba(75,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(25,106,86,0.6)'
                
            ]
            }]
          },
          options:{}

       });

    </script>

      <script>
      let myChartc = document.getElementById('myChartcar3').getContext('2d');
      let massPopChartc = new Chart( myChartc,{
          type:'pie',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[ "<?php echo $driver_info[45]?>;","<?php echo $driver_info[47]?>;","<?php echo $driver_info[49]?>;","<?php echo $driver_info[51]?>;","<?php echo $driver_info[53]?>;","<?php echo $driver_info[55]?>;"],
            datasets:[{
                 label:'Driver Contribution',
                  data:[
                         <?php  echo $driver_info[44] ?>,
                         <?php  echo $driver_info[46]?>,
                         <?php  echo $driver_info[48] ?>,
                         <?php  echo $driver_info[50]?>,
                         <?php  echo $driver_info[52] ?>,
                         <?php  echo $driver_info[54] ?>,
                        
            ],
            backgroundColor:[

                 'rgba(255,99,132,0.6)',
                'rgba(75,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(25,106,86,0.6)', 
                'rgba(25,19,12,0.6)',
                'rgba(75,99,132,0.6)'
               
                
            ]
            }]
          },
          options:{}

       });

    </script>
      <script>
      let myChartd = document.getElementById('myChartcar4').getContext('2d');
      let massPopChartd = new Chart( myChartd,{
          type:'pie',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[ "<?php echo $road[1]?>;","<?php echo $road[3]?>;","<?php echo $road[5]?>;","<?php echo $road[7]?>;","<?php echo $road[9]?>;"],
            datasets:[{
                 label:'Roada Separation',
                  data:[ 
                         <?php  echo $road[0] ?>,
                         <?php  echo $road[2] ?>,
                         <?php  echo $road[4]?>,
                         <?php  echo $road[6] ?>,
                         <?php  echo $road[8]?>,
                        
                         
            ],
            backgroundColor:[

                 'rgba(255,99,132,0.6)',
                'rgba(75,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(25,106,86,0.6)', 
                'rgba(25,19,12,0.6)'
                
                
            ]
            }]
          },
          options:{}

       });

    </script>

      <script>
      let myCharte = document.getElementById('myChartcar5').getContext('2d');
      let massPopCharte = new Chart( myCharte,{
          type:'pie',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[ "<?php echo $road[1]?>;","<?php echo $road[3]?>;","<?php echo $road[5]?>;","<?php echo $road[7]?>;","<?php echo $road[9]?>;"],
            datasets:[{
                 label:'Road Geoametry',
                  data:[ 
                         <?php  echo $road[0] ?>,
                         <?php  echo $road[2] ?>,
                         <?php  echo $road[4]?>,
                         <?php  echo $road[6] ?>,
                         <?php  echo $road[8]?>,
                        
                         
            ],
            backgroundColor:[

                'rgba(255,99,132,0.6)',
                'rgba(75,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(25,106,86,0.6)', 
                'rgba(25,19,12,0.6)'
                
                
            ]
            }]
          },
          options:{}

       });

    </script>
     <script>
      let myChartf = document.getElementById('myChartcar6').getContext('2d');
      let massPopChartf = new Chart( myChartf,{
          type:'pie',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[ "<?php echo $road[21]?>;","<?php echo $road[23]?>;","<?php echo $road[25]?>;","<?php echo $road[27]?>;"],
            datasets:[{
                 label:'Road Geoametry',
                  data:[ 
                         <?php  echo $road[20] ?>,
                         <?php  echo $road[22] ?>,
                         <?php  echo $road[24]?>,
                         <?php  echo $road[26] ?>,
                         
            ],
            backgroundColor:[

                 'rgba(255,99,132,0.6)',
                'rgba(75,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(25,106,86,0.6)'
                
                
            ]
            }]
          },
          options:{}

       });

    </script>








  </body>
  </html>