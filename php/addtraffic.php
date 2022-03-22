<?php
include 'guard.php';
//include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\navigational.html';
$chek = 1; $tra_id = $tra_username = $tra_password= $tra_region = $tra_zone = $tra_wereda=  $tra_kebele = $tra_phone=""; 
if($_SERVER['REQUEST_METHOD'] =="POST")
{
    include 'database.php';    
     if(isset($_POST['submit']))
    {
            $tra_id =test_id($_POST['tra_id']);
            $tra_username =test_username($_POST['tra_username']);
            $tra_password =test_password($_POST['tra_password']);
           
            $tra_password = $user->password_hash($tra_password, PASSWORD_BCRYPT);

            $tra_region =$_POST['tra_region'];
            $tra_zone =  $_POST['tra_zone'];
            $tra_wereda =$_POST['tra_wereda'];
            $tra_kebele =$_POST['tra_kebele'];
    
            $tra_phone =test_phone($_POST['tra_phone']); 
        if($chek==1)
         {   $conn=connect();
            $sql = "INSERT INTO traffic_info (tra_id,tra_username,tra_password) VALUES('$tra_id','$tra_username','$tra_password')";
           $conn->query($sql) or die("insert problem");

           $sql = "INSERT INTO traffic_phone (tra_id,tra_phone) VALUES('$tra_id','$tra_phone')";
           $conn->query($sql) or die("insert problem");

           $sql = "INSERT INTO traffic_place (tra_id,tra_region,tra_zone,tra_wereda,tra_kebele) VALUES('$tra_id','$tra_region','$tra_zone','$tra_wereda','$tra_kebele')";
           $conn->query($sql) or die("insert problem");
           $conn->close();
           echo '<script> alert("traffic is succesfully registered ")</script>';

        }
    }       
}
   function test_id($data)
            {
             $data = trim($data);
             if (empty($data)){$GLOBALS['chek'] = 2; $data = "phone is null";}
             elseif(!preg_match("/^[0-9]+$/",$data)){ $GLOBALS['chek'] = 2; $data = "Unkown NUMBER";}
             return $data;
            } 
    function test_password($data)
            {
             $data = trim($data);
             if (empty($data)){$GLOBALS['chek'] = 3; $data = "phone is null";}
             elseif(!preg_match("/^[a-zA-Z0-9]+$/",$data)){ $GLOBALS['chek'] = 2; $data = "Unkown NUMBER";}
             return $data;
            }
    function test_username($data)
            {
             $data = trim($data);
             if (empty($data)){$GLOBALS['chek'] = 4; $data = "phone is null";}
             elseif(!preg_match("/^[a-zA-Z]+$/",$data)){ $GLOBALS['chek'] = 2; $data = "Unkown NUMBER";}
             return $data;
            }     
    function test_phone($data)
            {
             $data = trim($data);
             if (empty($data)){$GLOBALS['chek'] = 5; $data = "phone is null";}
             elseif(!preg_match("/^[0-9]+$/",$data)){ $GLOBALS['chek'] = 2; $data = "Unkown NUMBER";}
             return $data;
            }       
?>
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>Ethiopian programming</title>
        
        <script src ="http://localhost/mengistu/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/mengistu/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href ="http://localhost/mengistu/traffic_accident_report/css/bootstrap.css"   type ="text/css" rel ="stylesheet" >     
        <link href ="http://localhost/mengistu/traffic_accident_report/css/shadow.css" rel ="stylesheet" >
        <style>  
            body{padding-top: 60px}
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
         <form  method ="post" action ='<?php $_SERVER["PHP_SELF"]?>' class ="form-horizontal">
            <div class="container">
                <div class="row">
                    <div class ="col-lg-6"><h2>Traffic Pelecement</h2>
                                <div class ="form-group">
                                    <label  class ="control-label col-lg-3 ">Region</label>
                                        <div class ="col-lg-9">
                                              <select name ="tra_region"  id ="region" class ="form-control " onchange= "getselectedregion(this.id,'zone');">
                                               <option  value ="Tigray">Tigray</option>
                                               <option  value ="oromiya">Oromiya</option>
                                               <option  value ="Amhara">Amhara</option>
                                               <option  value ="SNNPR"selected>SNNPR </option>
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
                        </div><h2>Traffic Details</h2>
                        <div class="col-lg-6">
                            <div class ="form-group">
                                    <label class ="control-label col-lg-3">Username</label>
                                    <div class ="col-lg-9">
                                       <input type ="text" id =""  name ="tra_username" class ="form-control"placeholder ="username" >
                                        <?php if($chek==3){ echo $tra_username;}?>
                                    </div>
                            </div>
                             <div class ="form-group">
                                    <label class ="control-label col-lg-3">Password</label>
                                    <div class ="col-lg-9">
                                       <input type ="text" id =""  name ="tra_password" class ="form-control"placeholder ="Password" >
                                        <?php if($chek==4){ echo $tra_password;}?>
                                    </div>
                            </div>
                             <div class ="form-group">
                                    <label class ="control-label col-lg-3">Phone</label>
                                    <div class ="col-lg-9">
                                       <input type ="text" id =""  name ="tra_phone" class ="form-control"placeholder ="+2519" >
                                        <?php if($chek==5){ echo $tra_id;}?>

                                    </div>
                            </div>
                             <div class ="form-group">
                                    <label class ="control-label col-lg-3">ID</label>
                                    <div class ="col-lg-9">
                                       <input type ="text" id =""  name ="tra_id" class ="form-control"placeholder ="trafficid" >
                                        <?php if($chek==2){ echo $tra_id;}?>
                                    </div>
                            </div>
                             <div class ="form-group">
                                <div class =" col-xs-12 col-xs-offset-3 col-lg-offset-6 col-lg-6">
                                     <button type ="submit" name ="submit" class ="col-xs-8 col-lg-10 btn btn-success">Submit</button>
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
