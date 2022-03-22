<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>Ethiopian programming</title>
        
      <script src ="http://localhost/traffic_accident_report/js/juery.js"></script> 
        <script src ="http://localhost/traffic_accident_report/js/bootstrap.js"> </script> 
        <link  href =" http://localhost/traffic_accident_report/css/bootstrap.css"   type ="text/css" rel ="stylesheet">    
        <link href ="http://localhost/traffic_accident_report/css/shadow.css" rel ="stylesheet" >
       
        <style>
            .form-container{ padding:50px 1px;margin-top:20vh;}
            *{color:white;}
            .bg{background:url('../images/b.jpg') ; width:100%; height:100vh;}
            
        </style>

    </head>
    <body>
            <div class ="container bg">
                <div class ="row">
                    <div class ="col-lg-6 col-lg-offset-3">
                       <form method ="post" action = '<?php $_SERVER["PHP_SELF"] ?>' class ="form-horizontal form-container">
                        <div class ="form-group">
                               <label  class ="control-label col-lg-3 a">Username</label>
                                <div class ="col-lg-8">
                                 <input type ="text" class = "form-control" name ="username"  placeholder ="Username">
                                </div>
                        </div>
                        <div class ="form-group">
                             <label  class ="control-label col-lg-3 ">Password</label>
                                 <div class ="col-lg-8">
                                      <input type ="password" class = "form-control" name ="password" placeholder ="Password">
                                 </div>      
                         </div>
                         <div class ="form-group">
                                <div class =" col-xs-12 col-xs-offset-3 col-lg-offset-6 col-lg-6">
                                     <button type ="submit" name ="submit" class ="col-xs-8 col-lg-10 btn btn-success">Submit</button>
                                </div>
                        </div>
                        </form> 
                    </div>

                </div>
                
           </div>
    <?php
         include 'database.php';
         $conn = connect();
     if($_SERVER['REQUEST_METHOD'] =="POST"){
           if(isset($_POST['submit']))
           {
               $username = trim($_POST['username']);
               $password = trim($_POST['password']);
               $sql ="SELECT * FROM traffic_info INNER JOIN traffic_place ON traffic_info.tra_id = traffic_place.tra_id where tra_username ='$username' AND tra_password ='$password'";
               $result = $conn->query($sql) or die("query error ".$conn->mysqli_error());
               $num_row = mysqli_num_rows($result);
               if($result-> num_rows > 0)
                {
                    while ($row = $result-> fetch_assoc())
                    {
                       $_SESSION['tra_id'] =$row['tra_id'];
                       $_SESSION['tra_region'] =$row['tra_region'];
                       $_SESSION['tra_zone'] =$row['tra_zone'];
                       $_SESSION['tra_wereda'] =$row['tra_wereda'];
                       $_SESSION['tra_kebele'] =$row['tra_kebele'];

                       $_SESSION['user_loggedid'] =true;
                       header('location:home1.php');   
                    }    
                }
               $sql ="SELECT * FROM admin where admin_username ='$username' AND admin_password ='$password'";
               $result = $conn->query($sql) or die("query error ".$conn->mysqli_error());
               $num_row = mysqli_num_rows($result);
               if($result-> num_rows > 0)
                {
                    while ($row = $result-> fetch_assoc())
                    {
                       $_SESSION['admin_id'] =$row['admin_id'];
                        $_SESSION['user_loggedid'] =true;
                       header('location:admin.php');   
                    }    
                }


            }
        }  
    ?>           
    </body>
</html>
