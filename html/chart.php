<html>
  <head>

        <meta carset ="utf-8">
        <meta name ="viewport" content="width = device-width , intial-scale=1">
        <script src="http://localhost/mengistu/traffic_accident_report/js/mesay.js"></script>
        <link href ="http://localhost/mengistu/traffic_accident_report/css/bootstrap.css" rel ="stylesheet ">
         <title>cars number in accident </title>
       
    </head>
  <body>
    <div class="container">
      <canvas id="myChart"></canvas>
    </div>
    
     <script>
      let myChart = document.getElementById('myChart').getContext('2d');
      let massPopChart = new Chart( myChart,{
          type:'bar',
          data:{
            labels:['boston','worechester','springfield','lowell','cambridge','bbbbbbbb'],
            datasets:[{
                 label:'population',
                  data:[
                        55555,
                        44444,
                        11111,
                        33333,
                        55555,
                        99999
            ]
            }]
          },
          options:{}

       });

    </script>

  
 
  </body>
</html>