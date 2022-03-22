

<?php
session_start();
        
     if($_SERVER['REQUEST_METHOD'] =="POST")
{
    if(isset($_POST['submit']))
    {
     $acci_year = trim($_POST['acci_year']);  
          $_SESSION['acci_year'] = $acci_year;
          $_SESSION['tra_region'] = $_POST['tra_region'];
          $_SESSION['tra_zone'] = $_POST['tra_zone'];
          $_SESSION['tra_wereda'] = $_POST['tra_wereda'];
          $_SESSION['tra_kebele'] = $_POST['tra_kebele'];
           header('location:chart.php');
    }
 }
         
?>
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>analysiss page </title>
        <script src ="http://localhost/mengistu/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/mengistu/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href ="http://localhost/mengistu/traffic_accident_report/css/bootstrap.css"  type ="text/css" rel ="stylesheet" >     
        <link href ="http://localhost/mengistu/traffic_accident_report/css/shadow.css" rel ="stylesheet" >  
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
         <script type ="text/javascript">
        function getselectedregion(s1,s2)
         {
          var s1 =document.getElementById(s1);
          var s2 =document.getElementById(s2);
          s2.innerHTML ="";
          if(s1.value =="oromiya"){
              var optionArray =["|","jimma zone|jimma zone","z2|Z2","z3|Z3"];
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
         function geteselectedzone(s1,s2)
         {
          var s1 =document.getElementById(s1);
          var s2 =document.getElementById(s2);
          s2.innerHTML ="";
          if(s1.value =="jimma zone"){
              var optionArray =["|","wereda 1|wereda 1","W2|W2","W3|W3"];
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
         function geteselectedkebele(s1,s2)
         {
          var s1 =document.getElementById(s1);
          var s2 =document.getElementById(s2);
          s2.innerHTML ="";
          if(s1.value =="wereda 1"){
              var optionArray =["|"," kebele 1|kebele 1","k2|K2","k3|K3"];
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
     <div class="container" style="padding-top:70px;padding-bottom: 70px;">

            <div class="row">
<form  method ="post" action ='<?php $_SERVER["PHP_SELF"] ?>' enctype ="multipart/form-data" class ="form-horizontal">

                 <div class ="col-lg-6"><h2>Place You want to do Analysiss at</h2>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Region</label>
                                        <div class ="col-lg-9">
                                              <select name ="tra_region"  id ="region" class ="form-control " onchange= "getselectedregion(this.id,'zone');">
                                               <option  value ="">Ethiopian</option>
                                               <option  value ="Tigray">Tigray</option>
                                               <option  value ="oromiya">Oromiya</option>
                                               <option  value ="Amhara">Amhara</option>
                                               <option  value ="SNNPR">SNNPR </option>
                                               <option  value ="Somalia">Somalia</option>
                                               <option  value ="Afar">Afar</option>
                                               <option  value ="Benshangul">Benshangul</option>
                                               <option  value ="Hareri">Hareri</option>
                                               <option  value ="Diredawa">Diredawa</option>
                                               <option  value ="Addis Abeba">Addis Abeba</option>
                                               <option  value ="Gambela">Gambela</option>
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Zone</label>
                                        <div class ="col-lg-9">
                                              <select name ="tra_zone"  id ="zone"class ="form-control " onchange ="geteselectedzone(this.id,'wereda');">
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Wereda</label>
                                        <div class ="col-lg-9">
                                              <select name ="tra_wereda"  id ="wereda"class ="form-control " onchange ="geteselectedkebele(this.id,'kebele');">
                                               
                                            </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Kebele</label>
                                        <div class ="col-lg-9">
                                              <select name ="tra_kebele"  id ="kebele"class ="form-control " >
                                               </select>
                                        </div>      
                                </div>
                        </div>

                        <div class="col-lg-6">
                            <div class ="form-group"><h2>Year You Want to do Analysis</h2>
                                    <label class ="control-label col-lg-3">Year</label>
                                    <div class ="col-lg-9">
                                       <input type ="number" id =""  name ="acci_year" class ="form-control"placeholder ="accident year" >
                                    </div>
                            </div>
                          </div>

                          <div class ="form-group">
                                <div class =" col-xs-12 col-xs-offset-3 col-lg-offset-6 col-lg-6">
                                     <button type ="submit" name ="submit" class ="col-xs-8 col-lg-10 btn btn-success">Analysis......</button>
                                </div>
                            </div>    
         
</form>
            </div>   
    </div>
       
     
    </body>  
</html>
