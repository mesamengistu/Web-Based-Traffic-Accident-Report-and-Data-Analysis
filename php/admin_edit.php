<?php
$i =0;
include 'guard.php';
include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\navigational.html';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>Ethiopian programming</title>
        <script src ="http://localhost/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href =" http://localhost/traffic_accident_report/css/bootstrap.css"   type ="text/css" rel ="stylesheet" >   
        <link href ="http://localhost/traffic_accident_report/css/shadow.css" rel ="stylesheet" >
         <script type ="text/javascript">
        function getselectedregion(s1 , s2)
         {
          var s1 =document.getElementById(s1);
          var s2 =document.getElementById(s2);
          s2.innerHTML ="";
          if(s1.value =="oromiya")
          {
              var optionArray = ["|","jimma zone|jimma zone","z2|Z2","z3|Z3"];
          }
          for(var option in optionArray)
          {
            var pair = optionArray[option].split("|");
            var newoption = document.createElement("option");
            newoption.value = pair[0];
            newoption.innerHTML = pair[1];
            s2.options.add(newoption);
          }
         }
         function geteselectedzone(s1,s2)
         {
          var s1 =document.getElementById(s1);
          var s2 =document.getElementById(s2);
          console.log("succ");
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
              var optionArray =["|","kebele 1|kebele 1","k2|K2","k3|K3"];
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
        <style>
            body{padding-top: 60px;}
        </style>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <h3>Serch Using traffic Id</h3>
                
           <form  method ="post" action = '<?php $_SERVER["PHP_SELF"] ?>' class ="form-horizontal">
                        <div class="col-lg-6"> 
                            <div class ="form-group col-lg-12">
                                 <input class="col-lg-6" type="text" class ="form-control" placeholder ="Search">
                                         <button class="col-lg-2"> 
                                             <span class ="glyphicon glyphicon-search"><span>
                                         </button>   
                            </div>
                        </div>    
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="table"  class="table table-bordered table-hover table-condensed">
                            <thead>
                                  <th>Id</th>
                                  <th>Phone</th>
                                  <th>Region</th>
                                  <th>Zone</th>
                                  <th>Wereda</th>
                                  <th>Kebele </th>
                                  <th>delete</th>
                                  <th>Edit</th>
                                  <th>check</th>
                            </thead>
                            <tbody">  
                                   <?php
                                    include 'database.php';
                                    $conn =connect();
                                    $sql = "SELECT tra_id,tra_username,tra_password FROM traffic_info";
                                    $result = $conn->query($sql);
                                    if($result-> num_rows > 0)
                                    {
                                        while ($row = $result-> fetch_assoc()) 
                                        {
                                          $sqla = " SELECT tra_phone FROM traffic_phone where tra_id = ".$row["tra_id"]."";
                                          $sqlb = " SELECT tra_region,tra_wereda,tra_zone,tra_wereda,tra_kebele FROM traffic_place where tra_id = ".$row["tra_id"]."";
                                          $result2 = $conn->query($sqla);
                                          $result3 = $conn->query($sqlb);
                                          if(($result2-> num_rows > 0) && ($result3-> num_rows > 0))
                                          {
                                             while (($row2 = $result2-> fetch_assoc()) &&($row3 = $result3-> fetch_assoc()))
                                              {
                                            echo"<tr>
                        <td><input type='text' value ='".$row["tra_id"]."' name ='id".$i."'readonly></td>
                        <td><input type ='text' value='".$row2["tra_phone"]."' name = 'tra_phone".$i."'/></td>
     <td>
 <select name ='tra_region".$i."' id = 'region".$i."' onchange= \"getselectedregion(this.id,'zone".$i."');\">

                                                <option  value ='".$row3["tra_region"]."'>".$row3["tra_region"]."</option>
                                               <option  value ='Tigray'>Tigray</option>
                                               <option  value ='Amhara'>Amhara</option>
                                               <option  value ='SNNPR'>SNNPR </option>
                                               <option  value ='Somalia'>Somalia</option>
                                               <option  value ='Afar'>Afar</option>
                                               <option  value ='Benshangul'>Benshangul</option>
                                               <option  value ='Hareri'>Hareri</option>
                                               <option  value ='Diredawa'>Diredawa</option>
                                               <option  value ='Addis Abeba'>Addis Abeba</option>
                                               <option  value ='Gambela'>Gambela</option>
                                               <option  value ='oromiya'>Oromiya</option>
                                               
     </select>
     </td>
     <td>
     <select name ='tra_zone".$i."'  id ='zone".$i."' onchange =  \"geteselectedzone(this.id,'wereda".$i."');\">
                                      <option  value ='".$row3["tra_zone"]."'>".$row3["tra_zone"]."</option>
     </select>
     </td>
     <td>
     <select name ='tra_wereda".$i."'  id = 'wereda".$i."' onchange =   \"geteselectedkebele(this.id,'kebele".$i."');\">
                             <option  value ='".$row3["tra_wereda"]."'>".$row3["tra_wereda"]."</option>       
     </select>
     </td>
     <td>
     <select name ='tra_kebele".$i."'  id ='kebele".$i."' >
                         <option  value ='".$row3["tra_kebele"]."'>".$row3["tra_kebele"]."</option>
     </select>
     </td>";
                                            echo "<td> <input type = 'submit' value = 'delete' name ='delete".$i."'>";
                                              if(isset($_POST['delete'.$i.'']))
                                              {
                                                    if(isset($_POST['chek'.$i.'']))
                                                    {
                                                       $id = $_POST['id'.$i.''];
                                                       $sqlv ="DELETE FROM traffic_place WHERE tra_id='$id' ";
                                                       $s = $conn->query($sqlv);
                                                       $sqlv ="DELETE FROM traffic_phone WHERE tra_id='$id' ";
                                                       $s = $conn->query($sqlv);
                                                       $sqlv ="DELETE FROM traffic_info WHERE tra_id='$id' ";
                                                       $s = $conn->query($sqlv);
                                                       if(!$s){echo "delete problem";}
                                                        else{/*header("location:admin_edit.php");*/echo"<script>alert('deleted sucssefully')</script>";}
                                                      } 
                                              }
                                               echo "</td> ";
                                            echo "<td><input type = 'submit' value='Edit' name ='edit".$i."' />";
                                                       if(isset($_POST['edit'.$i.'']))
                                              {
                                                    if(isset($_POST['chek'.$i.'']))
                                                    {
                                                       $id = $_POST['id'.$i.''];
                                                       $tra_region =$_POST['tra_region'.$i.''];
                                                       $tra_zone =$_POST['tra_zone'.$i.''];
                                                       $tra_wereda =$_POST['tra_wereda'.$i.''];
                                                       $tra_kebele =$_POST['tra_kebele'.$i.''];
                                                       $tra_phone = $_POST['tra_phone'.$i.''];
                                                       $sqlv ="UPDATE traffic_place SET tra_region ='$tra_region', tra_zone='$tra_zone' , tra_wereda ='$tra_wereda' ,tra_kebele ='$tra_kebele'  WHERE tra_id='$id' ";
                                                       $s = $conn->query($sqlv);
                                                       $sqlv ="UPDATE  traffic_phone SET tra_phone ='$tra_phone' WHERE tra_id='$id' ";
                                                       $s = $conn->query($sqlv);
                                                       if(!$s){echo "delete problem";}
                                                        else{/*header("location:admin_edit.php");*/echo"<script>alert('edited  sucssefully')</script>";}
                                                      } 
                                              }
                                           
                                            echo "</td>";
                                            echo" <td><input type = 'checkbox' name ='chek".$i."'/></td></tr>"; 

                                               }
                                          } 
                                          $i++;  
                                        }
                                    }

                                    function deleted()
                                    {
                                      
                                    }
                                                           
                           
         
                                   ?>
        
        
       
                            </tbody>
                        </table>  
                    </div>
                </div>
            </form>
            </div>
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-lg-offset-7">
                    
  
                </div>     
            </div>
        </div> 
       

    </body>
    <?php
       //include 'C:\xampp\htdocs\mengistu\traffic_accident_report\html\footer.html'; 
     ?>
</html>
