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
        <script src="http://localhost/mengistu/traffic_accident_report/js/mesay.js"></script>
       <script src ="http://localhost/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href =" http://localhost/traffic_accident_report/css/bootstrap.css"   type ="text/css" rel ="stylesheet"  >  
        <link href ="http://localhost/traffic_accident_report/css/shadow.css" rel ="stylesheet" >
         <title>cars number in accident </title>
       
    </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-4"><h2>Accident Couse </h2>
        <canvas id="myChartcar1"></canvas>
        </div>
        <div class="col-lg-4"><h2> Accident Type</h2>
        <canvas id="myChartcar2"></canvas>
        </div>
         <div class="col-lg-4"><h2> Pedstrian Condition </h2>
        <canvas id="myChartcar3"></canvas>
        </div>

      </div> 
    </div>
<?php
include 'serch.php';
//$cars = array();
//$car_info = car(2020);
//$driver_info =driver(2020);
$accident = accident($accidentyear_analyss,$analysis_tra_region,$analysis_tra_zone,$analysis_tra_wereda,$analysis_tra_kebele);
?>
 <script>
      let myCharta = document.getElementById('myChartcar1').getContext('2d');
      let massPopCharta = new Chart( myCharta,{
          type:'pie',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[ "<?php echo $accident[11]?>;","<?php echo $accident[13]?>;","<?php echo $accident[15]?>;","<?php echo $accident[17]?>;","<?php echo $accident[19]?>;","<?php echo $accident[21]?>;","<?php echo $accident[23]?>;","<?php echo $accident[25]?>;"],
            datasets:[{
                 label:'Accident Couse',
                  data:[
                          <?php  echo $accident[10] ?>,
                          <?php  echo $accident[12]?>,
                          <?php  echo $accident[14] ?>,
                          <?php  echo $accident[16]?>,
                          <?php  echo $accident[18] ?>,
                          <?php  echo $accident[20] ?>,
                          <?php  echo $accident[22]?>,
                          <?php  echo $accident[24] ?>
                        
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
      let myChartb = document.getElementById('myChartcar2').getContext('2d');
      let massPopChartb = new Chart( myChartb,{
          type:'pie',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[ "<?php echo $accident[27]?>;","<?php echo $accident[29]?>;","<?php echo $accident[31]?>;","<?php echo $accident[33]?>;","<?php echo $accident[35]?>;","<?php echo $accident[37]?>;","<?php echo $accident[39]?>;"],
            datasets:[{
                 label:' Accident Type',
                  data:[
                         <?php  echo $accident[26] ?>,
                         <?php  echo $accident[28] ?>,
                         <?php  echo $accident[30]?>,
                         <?php  echo $accident[32] ?>,
                         <?php  echo $accident[34]?>,
                         <?php  echo $accident[36] ?>,
                         <?php  echo $accident[38] ?>               
            ],
            backgroundColor:[

                 'rgba(255,99,132,0.6)',
                'rgba(75,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(25,106,86,0.6)', 
               'rgba(25,19,12,0.6)',
                'rgba(75,99,132,0.6)',
                'rgba(54,162,235,0.6)'
                
                
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
            labels:[ "<?php echo $accident[41]?>;","<?php echo $accident[43]?>;","<?php echo $accident[45]?>;","<?php echo $accident[47]?>;","<?php echo $accident[49]?>;","<?php echo $accident[51]?>;","<?php echo $accident[53]?>;","<?php echo $accident[55]?>;"],
            datasets:[{
                 label:'Pedstrian Condition',
                  data:[
                         <?php  echo $accident[40] ?>,
                         <?php  echo $accident[42]?>,
                         <?php  echo $accident[44] ?>,
                         <?php  echo $accident[46]?>,
                         <?php  echo $accident[48] ?>,
                         <?php  echo $accident[50] ?>,
                         <?php  echo $accident[52] ?>,
                         <?php  echo $accident[54] ?>,
                        
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

  </body>
  </html>