<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>Ethiopian programming</title>
        <script src ="juery.js"></script> 
        <script src ="bootstrap.js"> </script>
        <link href ="bootstrap.css" rel ="stylesheet ">
        <link href ="shadow.css" rel ="stylesheet ">
        <style>
            .form-container{ padding:50px 1px;margin-top:20vh;}
            *{color:white;}
            .bg{background:url('b.jpg') ; width:100%; height:100vh;}
            
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
                         <div  class ="form-group ">
                                
                                <label  class ="col-lg-offset-3 col-lg-3"> <input type ="checkbox"> Remember</label>
                               
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
               $sql ="SELECT * FROM traffic_info where username ='$username' AND pass ='$password'";
               $result = $conn->query($sql) or die("query error ".$conn->mysqli_error());
               $row = mysqli_fetch_array($result);
               $num_row = mysqli_num_rows($result);
               if($num_row > 0)
                {
                    header('location:traffic_side.php');
                    $_SESSION['password'] =$password;
                    $_SESSION['username'] =$password;
                }

            }
        }
     
     
      
    ?>           
     
   
    </body>
</html>
