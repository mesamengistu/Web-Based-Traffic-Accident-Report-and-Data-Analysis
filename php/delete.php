
<?php
 include 'database.php';
 include 'guard.php';
  $today_year = date('Y');
  $today_month =date('m');
  $today_day = date('d');
  $today = date('Y-m-d');
  $conn =connect();
  $place_area =array();
  $place_frequency =array();
  $i =0;
  $count_oro =0;
  //$sql = "SELECT * FROM traffic_info a  INNER JOIN traffic_place b ON a.tra_id =b.tra_id  INNER JOIN traffic_phone c ON a.tra_id =c.tra_id  INNER JOIN accident_info d ON a.tra_id =d.tra_id   INNER JOIN car_info e ON e.acci_id =d.acci_id  INNER JOIN driver_info f ON f.car_id =e.car_id  INNER JOIN road g ON g.acci_id =d.acci_id  INNER JOIN acciplace h ON h.acci_id =d.acci_id   ";
  // $sql = "SELECT * FROM accident_info a  INNER JOIN traffic_info b ON a.tra_id =b.tra_id  ";
 
 //$sql =" SELECT acci_id, place_area ,COUNT(place_area) AS MOST_FREQUENT FROM  acciplace t1 INNER JOIN accident_info t2  ON t1.acci_id =t2.acci_id  GROUP BY place_area ORDER BY COUNT(*) DESC";
 //$sql =" SELECT acci_id,place_area ,COUNT(place_area) AS MOST_FREQUENT FROM acciplace WHERE acci_id LIKE '1%' GROUP BY  place_area ORDER BY COUNT(place_area)  DESC ";
 //$sql =" SELECT acci_id,place_area ,COUNT(place_area) AS MOST_FREQUENT FROM acciplace WHERE acci_id LIKE '1%' GROUP BY  place_area ORDER BY COUNT(place_area)  DESC ";
 //$sql ="SELECT acciplace.place_area ,COUNT(acciplace.place_area) AS MOST_FREQUENT FROM acciplace INNER JOIN accident_info ON acciplace.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  acciplace.place_area ORDER BY COUNT(acciplace.place_area)  DESC   ";
 //$sql ="SELECT acciplace.place_area ,COUNT(acciplace.place_area) AS MOST_FREQUENT FROM acciplace INNER JOIN accident_info ON acciplace.acci_id = accident_info.acci_id WHERE accident_info.acci_date LIKE '2019%' GROUP BY  acciplace.place_area ORDER BY COUNT(acciplace.place_area)  DESC   ";
  //$sql =" SELECT place_area ,COUNT(place_area) AS MOST_FREQUENT FROM acciplace GROUP BY place_area ORDER BY COUNT(place_area) DESC ";
  $t ="2019";
  $sql ="SELECT tra_id FROM accident_info WHERE acci_date LIKE '$t%'";
 $result = $conn->query($sql) or die("query error");
           
               if($result-> num_rows > 0)
                {
                    while ($row = $result-> fetch_assoc())
                    {  
                    	 $tra_id =$row['tra_id'];
                    	 $sql2 ="SELECT tra_region FROM traffic_place WHERE tra_id='$tra_id'";
                    	 $result2 = $conn->query($sql2) or die("query error");
                    	 if($result-> num_rows > 0)
                    	 {
                    	 	 while ($row2 = $result2-> fetch_assoc())
                                   { 
                                    	if($row2['tra_region'] == "or")
                                   		$count_oro = $count_oro+1;
                                   	    if($row2['tra_region'] == "am")
                                   		$count_amh = $count_amh+1;
                                   	    if($row2['tra_region'] == "snnpr")
                                   		$count_snnpr = $count_snnpr+1;
                                   	    if($row2['tra_region'] == "ga")
                                   		$count_gam = $count_gam+1;
                                   	    if($row2['tra_region'] == "sm")
                                   		$count_gam = $count_sm+1;
                                   	    if($row2['tra_region'] == "dd")
                                   		$count_gam = $count_dd+1;
                                   	    if($row2['tra_region'] == "af")
                                   		$count_gam = $count_af+1;
                                   	    if($row2['tra_region'] == "hr")
                                   		$count_gam = $count_hr+1;
                                   	    if($row2['tra_region'] == "tg")
                                   		$count_gam = $count_tg+1;
                                   	    if($row2['tra_region'] == "aa")
                                   		$count_gam = $count_aa+1;
                                   	    if($row2['tra_region'] == "bn")
                                   		$count_gam = $count_bn+1;
                                   } 
                     	 }

                    }   
                   
                }

echo $count_oro;



























              /*  $mes =time();
                echo date('m/d/Y');

        print_r($result);
        if(isset($_POST['submit'])){

           echo $_POST['acci_date'];

        }
*/

?>
<form  method ="post" action = '<?php $_SERVER["PHP_SELF"] ?>' class ="form-horizontal form-container">
	<div class ="form-group">
<label class ="control-label col-lg-3">Licence Id</label>
 <div class ="col-lg-9">
 <input type ="date" id =""  name ="acci_date" class ="form-control" >
 </div>
 </div>
 <div class ="form-group">
<label class ="control-label col-lg-3">Licence Id</label>
 <div class ="col-lg-9">
 <input type ="submit" id =""  name ="submit" class ="form-control" >
 </div>
 </div>
</form>


