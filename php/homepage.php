<!DOCTYPE html>
<html>
    <head>
        <meta carset ="utf-8">
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>Home page</title>
        <script src ="juery.js"></script> 
        <script src ="bootstrap.js"> </script>
        <link href ="bootstrap.css" rel ="stylesheet ">
    </head>
    <style>
        body{ padding-top:40px;}
    </style>
    <body>
        
    </body>
</html>
<?php
include 'database.php';
$connect = connect();
$mesay ="ethioprobbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb
            bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb";
$query  ="SELECT * FROM accident_info";
$result=mysqli_query($connect,$query);
while($row = mysqli_fetch_array($result))
{
    echo '
    <div class ="container">
         <div class ="row">
              <div class =" col-lg-offset-3 col-lg-9">
                   <img  class ="img-thumbnail img-responsive img-rounded" src ="images/'.($row['img']).'"/>
              </div>
              <div class = "col-lg-5 text-justify">
                  <p class =" text-justify">'.$mesay.'</p>
              </div>
         </div>

    </div>

    
     
    
    
    ';
}
?>