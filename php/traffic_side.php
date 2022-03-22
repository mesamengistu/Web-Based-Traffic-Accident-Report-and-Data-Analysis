<!DOCTYPE html>
<html>
    <head>
        <style>
            .top{padding-top:60px;}
            .border{border:2px solid #ECF0F1;}
            .ti{padding:0 0 6px;}
            
        </style>
        
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>Ethiopian programming</title>
        <script src ="http://localhost/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href =" http://localhost/traffic_accident_report/css/bootstrap.css"   type ="text/css" rel ="stylesheet" >   
        <link href ="http://localhost/traffic_accident_report/css/shadow.css" rel ="stylesheet" >
        <script type ="text/javascript">
        function getselectedregion(s1,s2)
		 {
		  var s1 =document.getElementById(s1);
		  var s2 =document.getElementById(s2);
		  s2.innerHTML ="";
		  if(s1.value =="or"){
		      var optionArray =["|","z1|Z1","z2|Z2","z3|Z3"];
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
		  if(s1.value =="z1"){
		      var optionArray =["|","w1|W1","W2|W2","W3|W3"];
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
		  if(s1.value =="w1"){
		      var optionArray =["|","k1|K1","k2|K2","k3|K3"];
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
            
                            <nav class ="navbar navbar-default navbar-inverse navbar-fixed-top">
                                    <div class ="navbar-header">
                                          <button type ="button" class ="navbar-toggle" data-target =".coll" data-toggle="collapse">
                                             <span class ="icon-bar"></span>
                                             <span class ="icon-bar"></span>
                                             <span class ="icon-bar"></span>
                                          </button>
                                         <div class ="navbar-collapse collapse coll" >
                                             <ul class ="nav navbar-nav">
                                                  <li class ="active"><a href ="#">Home</a></li>
                                                  <li ><a href ="#">Home</a></li>
                                                  <li ><a href ="#">Home</a></li>
                                                   <li ><a href ="#">Home</a></li>
                                              </ul>
                                              <form class ="navbar-form navbar-left" role="search" action ="traffic_side.php">
                                                  <div class ="form-group">
                                                      <input type="text" class ="form-control" placeholder ="Search">
                                                  </div>
                                                  <button> <span class ="glificon"><span></button>
                  
                                              </form>
                                              <ul class =" nav navbar-nav navbar-right ">
                                                  <li><a href = "#">mesay</a></li>
                                             </ul>
                                         </div>
                                     </div>
                                 </nav>
                
        <form  method ="post" action ="trafficsideDB.php" enctype ="multipart/form-data" class ="form-horizontal">
            <div class ="container ">
                    
                    <div class ="row top">
                       <div class ="col-lg-6 border "> <h2>Enter Car Info </h2>
                            
                               <div class ="form-group">
                                      <label  class ="control-label col-lg-3 a">car Id </label>
                                       <div class ="col-lg-9">
                                        <input type ="text"  name ="car_id" value ="<?php if(isset($_POST['car_id'])){echo $_POST['car_id'];} ?>" class = "form-control" id ="car_id"  placeholder ="code//region//alp//Targa_num">
                                       </div>
                               </div>
                               <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Car Type</label>
                                        <div class ="col-lg-9">
                                              <select name ="car_type" class ="form-control">
                                               <option  value ="t1">Yehizb</option>
                                               <option  value ="t2">Ye Chinet</option>
                                               <option  value ="t3">Ye Bet</option>
                                               <option  value ="t4"selected>Ye Drgit </option>
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                      <label  class ="control-label col-lg-3 a">Car Image </label>
                                       <div class ="col-lg-9">
                                        <input type ="file" class = "btn btn-primary" name ="img" id ="img" class ="image" placeholder ="enter the accident in image">
                                       </div>
                               </div>
                           
                        </div>
                        <div class ="col-lg-6 border ti"> <h2>Enter Driver Info </h2>
                           
                              
                                <div class ="form-group">
                                    <label class ="control-label col-lg-3">Firest Name</label>
                                    <div class ="col-lg-9">
                                        <input type ="text" id ="driv_fname" name ="driver_fname"  class ="form-control">
                                    </div>
                                </div>
                                <div class ="form-group">
                                    <label class ="control-label col-lg-3">Last Name</label>
                                    <div class ="col-lg-9">
                                        <input type ="text" id ="driv_lname" name ="driver_lname"  class ="form-control">
                                    </div>
                                </div>
                                <div class ="form-group">
                                    <label class ="control-label col-lg-3">Licence Id</label>
                                    <div class ="col-lg-9">
                                       <input type ="text" id ="driver_id"  name ="driver_id" class ="form-control"placeholder ="region//id" >
                                    </div>
                                </div>
                           
                        </div>
                    </div>
                    <div class ="row">
                        <div class ="col-lg-6 border"><h2>Aciddent Place </h2>
                            
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Region</label>
                                        <div class ="col-lg-9">
                                              <select name ="region"  id ="region" class ="form-control " onchange= "getselectedregion(this.id,'zone');">
                                               <option  value ="tg">Tigray</option>
                                               <option  value ="or">Oromiya</option>
                                               <option  value ="am">Amhara</option>
                                               <option  value ="sp"selected>SNNPR </option>
                                               <option  value ="sm">Somalia</option>
                                               <option  value ="af">Afar</option>
                                               <option  value ="bg">Benshangul</option>
                                               <option  value ="hr">Hareri</option>
                                               <option  value ="dr">Diredawa</option>
                                               <option  value ="aa">Addis Abeba</option>
                                               <option  value ="ga">Gambela</option>
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Zone</label>
                                        <div class ="col-lg-9">
                                              <select name ="zone"  id ="zone"class ="form-control " onchange ="geteselectedzone(this.id,'wereda');">
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Wereda</label>
                                        <div class ="col-lg-9">
                                              <select name ="wereda"  id ="wereda"class ="form-control " onchange ="geteselectedkebele(this.id,'kebele');">
                                               
                                            </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Kebele</label>
                                        <div class ="col-lg-9">
                                              <select name ="kebele"  id ="kebele"class ="form-control " >
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">SpacificPlace</label>
                                        <div class ="col-lg-9">
                                              <input type ="text" name ="sp_place"  id ="sp_place"class ="form-control " >
                                             
                                        </div>      
                                </div>
                           
                        </div>   
                        <div class ="col-lg-6 border"><h2>About Aciddent </h2>
                           
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 "> accident couse</label>
                                        <div class ="col-lg-9">
                                              <select name ="accident_couse"  id ="accident_couse"class ="form-control " onchange= "getselectedregion(this.id,'zone');">
                                               <option  value ="c1">Over Speed</option>
                                               <option  value ="c2">Menged Mesat</option>
                                               <option  value ="c3">Sew Gebto</option>
                                               <option  value ="c4"selected>Tetito Mendat </option>
                                               <option  value ="c5">Driving Without Licence</option>
                                               <option  value ="c6">Tirf Chinet</option>
                                               <option  value ="c7">sew gebtobet</option>
                                               <option  value ="c8">ensisa Gebtobet</option>
                                               <option  value ="c9">Technic Problem</option> 
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Accident Type</label>
                                        <div class ="col-lg-9">
                                              <select name ="accident_type"  class ="form-control " onchange= "getselectedregion(this.id,'zone');">
                                               <option  value ="t1">Gichite</option>
                                               <option  value ="t2">sew Gechito</option>
                                               <option  value ="t3">Tegelbto</option>
                                               </select>
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">No People die</label>
                                        <div class ="col-lg-9">
                                              <input type ="text" name ="no_die"  class ="form-control " >
                                             
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 "> No Kebad gudat</label>
                                        <div class ="col-lg-9">
                                              <input type ="text" name ="no_kebad" class ="form-control " >
                                             
                                        </div>      
                                </div>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 "> No kelalgudat</label>
                                        <div class ="col-lg-9">
                                              <input type ="text" name ="no_kelal"  class ="form-control " >
                                             
                                        </div>      
                                </div>
                                
                          
                        </div>   
                    </div>
                </div> 
                <div class ="row">
                    <div  style =" padding-top:30px;"class ="col-lg-6 col-lg-offset-6">
                        <input type="submit" class =" btn btn-primary col-lg-6 col-lg-offset-3"  value ="Enter" name ="submit">

                    </div>

                </div>
        </form>
         
         <script type ="text/javascript" src ="juery.js"></script> 
         <script  src ="bootstrap.js"> </script>  
         <?php
  

?>  
    </body>
</html>
