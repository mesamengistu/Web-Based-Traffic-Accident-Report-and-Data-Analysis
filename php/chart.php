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
        <div class="col-lg-6">
        <canvas id="myChart"></canvas>
      </div>
      <div class="col-lg-6">
        <canvas id="myChartz"></canvas>
      </div>
      <div class="row">
        <div class="col-lg-4"><h2> Car Speed </h2>
        <canvas id="myChartcar1"></canvas>
        </div>
        <div class="col-lg-4"><h2> Car Contribution</h2>
        <canvas id="myChartcar2"></canvas>
        </div>
         <div class="col-lg-4"><h2> Car maneuver </h2>
        <canvas id="myChartcar3"></canvas>
        </div>

      </div>
      
    </div>
    <div class="row">
         <div class="col-lg-offset-4 col-lg-4" style="margin-bottom:50px;">
                   <a href="driver_analysiss.php"> <div class="col-lg-12 form-container btn btn-success">See More Analyssis</div></a>
        </div>
    </div>
<?php
include 'serch.php';
$accidentlastyar = array();
$this_year = $accidentyear_analyss;
$last_year =$accidentyear_analyss - 1;


$accident_this_year = accident($accidentyear_analyss,$analysis_tra_region,$analysis_tra_zone,$analysis_tra_wereda,$analysis_tra_kebele);
$accidentlastyar = accident($last_year,$analysis_tra_region,$analysis_tra_zone,$analysis_tra_wereda,$analysis_tra_kebele);
$sum_die_last =$accidentlastyar[0];
$no_severly_last = $accidentlastyar[1]; 
$no_slightly_last = $accidentlastyar[2];
$damage_birr_last =$accidentlastyar[3];
$sum_die_this =$accident_this_year[0];
$no_severly_this = $accident_this_year[1]; 
$no_slightly_this = $accident_this_year[2];
$damage_birr_this =$accident_this_year[3];

$car_info = car($accidentyear_analyss,$analysis_tra_region,$analysis_tra_zone,$analysis_tra_wereda,$analysis_tra_kebele);
$extent_freq1 = $car_info[0];
$damage_extent1 = $car_info[1];
$extent_freq2 = $car_info[2];
$damage_extent2 = $car_info[3];

$contribution_freqa = $car_info[10];
$car_contributiona = $car_info[11];

$contribution_freqb = $car_info[12];
$car_contributionb =  $car_info[13];

$contribution_freqc = $car_info[14];
$car_contributionc = $car_info[15];

$contribution_freqd = $car_info[16];
$car_contributiond = $car_info[17];

$contribution_freqe = $car_info[18];
$car_contributione = $car_info[19];

$contribution_freqf = $car_info[20];
$car_contributionf = $car_info[21];





?>
     <script>
    var sum_die_last = <?php echo $sum_die_last?>;
    var no_severly_last = <?php echo $no_severly_last?>;
    var no_slightly_last = <?php echo $no_slightly_last?>;
   
    var sum_die_this = <?php echo $sum_die_this?>;
    var no_severly_this  = <?php echo $no_severly_this?>;
    var no_slightly_this = <?php echo $no_slightly_this?>;
    var damage_birr_this = <?php echo $damage_birr_this?>;
     var damage_birr_last = <?php echo $damage_birr_last?>;
      var e = "Loss" + <?php echo $this_year?>;
       var i = "Loss" + <?php echo $last_year?>;

    var a = "die" + <?php echo $this_year?>;
    var b = "Severly injure" + <?php echo $this_year?>;
    var d = "Slightly Injure" + <?php echo $this_year?>;
    var e = "Loss" + <?php echo $this_year?>;

    var f = "die" + <?php echo $last_year?>;
    var g = "Severly injure" + <?php echo $last_year?>;
    var h = "Slightly Injure" + <?php echo $last_year?>;
   
 
      let myChart = document.getElementById('myChart').getContext('2d');
      let massPopChart = new Chart( myChart,{
          type:'bar',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[a,f,b,g,d,h],
            datasets:[{
                 label:'accident',
                  data:[
                        sum_die_this,
                        sum_die_last,
                        no_severly_this,
                        no_severly_last,
                        no_slightly_this,
                        no_slightly_last
                        
                       
            ],
            backgroundColor:[

                'rgba(255,99,132,0.6)',
                'rgba(255,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(25,106,86,0.6)',
                'rgba(25,106,86,0.6)'
                
            ]
            }]
          },
          options:{}

       });



    </script>
    <script>
   
     var extent_freq1 = <?php echo $extent_freq1?>;
     var extent_freq2 = <?php echo $extent_freq2?>;
     var damage_extent1 = "<?php echo $damage_extent1?>;"
     var damage_extent2 = "<?php echo $damage_extent2?>;"

      let myCharta = document.getElementById('myChartcar1').getContext('2d');
      let massPopCharta = new Chart( myCharta,{
          type:'pie',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[ "<?php echo $car_info[215]?>;","<?php echo $car_info[217]?>;","<?php echo $car_info[219]?>;","<?php echo $car_info[221]?>;","<?php echo $car_info[223]?>;","<?php echo $car_info[225]?>;","<?php echo $car_info[227]?>;","<?php echo $car_info[229]?>;","<?php echo $car_info[231]?>;","<?php echo $car_info[233]?>;"],
            datasets:[{
                 label:'Car Speed',
                  data:[
                         <?php echo $car_info[214] ?>,
                         <?php echo $car_info[216]?>,
                          <?php echo $car_info[218] ?>,
                         <?php echo $car_info[220]?>,
                          <?php echo $car_info[222] ?>,
                         <?php echo $car_info[224]?>,
                          <?php echo $car_info[226] ?>,
                         <?php echo $car_info[228]?>,
                          <?php echo $car_info[230] ?>,
                         <?php echo $car_info[232]?>,
                        
            ],
            backgroundColor:[

                 'rgba(255,99,132,0.6)',
                'rgba(75,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(25,106,86,0.6)', 
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
<script>
   
     var contribution_freqa = <?php echo $contribution_freqa?>;
     var car_contributiona = "<?php echo $car_contributiona;?>";

     var contribution_freqb = <?php echo $contribution_freqb?>;
     var car_contributionb = "<?php echo $car_contributionb;?>";

     var contribution_freqc = <?php echo $contribution_freqc?>;
     var car_contributionc = "<?php echo $car_contributionc;?>";

     var contribution_freqd = <?php echo $contribution_freqd?>;
     var car_contributiond = "<?php echo $car_contributiond;?>";

     var contribution_freqe = <?php echo $contribution_freqe?>;
     var car_contributione = "<?php echo $car_contributione;?>";

     var contribution_freqf = <?php echo $contribution_freqf?>;
     var car_contributionf = "<?php echo $car_contributionf;?>";

      let myChartb = document.getElementById('myChartcar2').getContext('2d');
      let massPopChartb = new Chart( myChartb,{
          type:'pie',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[car_contributiona,car_contributionb,car_contributionc,car_contributiond,car_contributione,car_contributionf],
            datasets:[{
                 label:'car_contribution ',
                  data:[
                        contribution_freqa,
                        contribution_freqb,
                        contribution_freqc,
                        contribution_freqd,
                        contribution_freqe,
                        contribution_freqf
                        
            ],
            backgroundColor:[

                'rgba(255,99,132,0.6)',
                'rgba(75,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(25,106,86,0.6)', 
                'rgba(255,99,132,0.6)',
                'rgba(75,99,132,0.6)'
                
                
            ]
            }]
          },
          options:{}

       });

    </script>
<?php
$car_maneuvera_frequa = $car_info[150];
$car_maneuvera = $car_info[151];

$car_maneuvera_frequb = $car_info[152];
$car_maneuverb =  $car_info[153];

$car_maneuvera_frequc = $car_info[154];
$car_maneuverc= $car_info[155];

$car_maneuvera_frequd = $car_info[156];
$car_maneuverd = $car_info[157];

$car_maneuvera_freque = $car_info[158];
$car_maneuvere = $car_info[159];

$car_maneuvera_frequf = $car_info[160];
$car_maneuverf = $car_info[161];

$car_maneuvera_frequg = $car_info[162];
$car_maneuverg = $car_info[163];

$car_maneuvera_frequh = $car_info[164];
$car_maneuverh =  $car_info[165];

$car_maneuvera_frequi = $car_info[166];
$car_maneuveri= $car_info[167];

$car_maneuvera_frequj = $car_info[168];
$car_maneuverj = $car_info[169];

$car_maneuvera_frequk = $car_info[170];
$car_maneuverk = $car_info[171];

$car_maneuvera_frequl = $car_info[172];
$car_maneuverl = $car_info[173];
?>




    <script>
   
     var car_maneuvera_frequa = <?php echo $car_maneuvera_frequa?>;
     var car_maneuvera = "<?php echo $car_maneuvera;?>";

     var car_maneuvera_frequb = <?php echo $car_maneuvera_frequb?>;
     var car_maneuverb = "<?php echo $car_maneuverb;?>";

     var car_maneuvera_frequc = <?php echo $car_maneuvera_frequc?>;
     var car_maneuverc = "<?php echo $car_maneuverc;?>";

     var car_maneuvera_frequd = <?php echo $car_maneuvera_frequd?>;
     var car_maneuverd = "<?php echo $car_maneuverd;?>";

     var car_maneuvera_freque = <?php echo $car_maneuvera_freque?>;
     var car_maneuvere = "<?php echo $car_maneuvere;?>";

     var car_maneuvera_frequf = <?php echo $car_maneuvera_frequf?>;
     var car_maneuverf = "<?php echo $car_maneuverf;?>";

     var car_maneuvera_frequg = <?php echo $car_maneuvera_frequg?>;
     var car_maneuverg = "<?php echo $car_maneuverg;?>";

     var car_maneuvera_frequh = <?php echo $car_maneuvera_frequh?>;
     var car_maneuverh = "<?php echo $car_maneuverh;?>";

     var car_maneuvera_frequi = <?php echo $car_maneuvera_frequi?>;
     var car_maneuveri = "<?php echo $car_maneuveri;?>";

     var car_maneuvera_frequj = <?php echo $car_maneuvera_frequj?>;
     var car_maneuverj = "<?php echo $car_maneuverj;?>";

     var car_maneuvera_frequk = <?php echo $car_maneuvera_frequk?>;
     var car_maneuverk = "<?php echo $car_maneuverk;?>";

     var car_maneuvera_frequl = <?php echo $car_maneuvera_frequl ?>;
     var car_maneuverl = "<?php echo $car_maneuverl;?>";

      let myChartc = document.getElementById('myChartcar3').getContext('2d');
      let massPopChartc = new Chart( myChartc,{
          type:'pie',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[car_maneuvera,car_maneuverb,car_maneuverc,car_maneuverd,car_maneuvere,car_maneuverf,car_maneuverg,car_maneuverh,car_maneuveri,car_maneuverj,car_maneuverk,car_maneuverl],
            datasets:[{
                 label:'car maneuver ',
                  data:[
                        car_maneuvera_frequa,
                        car_maneuvera_frequb,
                        car_maneuvera_frequc,
                        car_maneuvera_frequd,
                        car_maneuvera_freque,
                        car_maneuvera_frequf,
                        car_maneuvera_frequg,
                        car_maneuvera_frequh,
                        car_maneuvera_frequi,
                        car_maneuvera_frequj,
                        car_maneuvera_frequk,
                        car_maneuvera_frequl
                        
            ],
            backgroundColor:[

                'rgba(255,99,132,0.6)',
                'rgba(75,99,132,0.6)',
                'rgba(54,162,235,0.6)',
                'rgba(25,106,86,0.6)', 
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

    <script>
       var damage_birr_this = <?php echo $damage_birr_this?>;
     var damage_birr_last = <?php echo $damage_birr_last?>;
      var e = "Loss" + <?php echo $this_year?>;
       var i = "Loss" + <?php echo $last_year?>;
      let myChartz = document.getElementById('myChartz').getContext('2d');
      let massPopChartz = new Chart( myChartz,{
          type:'bar',// bar horizontalBar pie line doughnut radar polarArea
          data:{
            labels:[ e,i ],
            datasets:[{
                 label:'Loss in Birr',
                  data:[ 
                         damage_birr_this,
                         damage_birr_last
                        
                         
            ],
            backgroundColor:[

                'rgba(255,99,132,0.6)',
                'rgba(75,99,132,0.6)'
                
            ]
            }]
          },
          options:{}

       });

    </script>
  
 
  </body>
</html>
