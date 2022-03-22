 <!DOCTYPE html>
 <html>
     <head>
        <meta carset ="utf-8">
        <title>Image</title>
        <meta name ="viewport" content="width= device-width , intial-scale=1">
        <title>Ethiopian programming</title>
        <script src ="juery.js"></script> 
        <script src ="bootstrap.js"> </script>
        <link href ="bootstrap.css" rel ="stylesheet ">
     </head>
     <body>
         <form method ="POST" enctype ="multipart/form-data" action ="dewdatabasedemo.php">
             <input type ="file" name ="image">
             <input type ="submit" name ="submit">
         </form>

     </body>
 </html>
<?php

if(isset($_POST['submit']))
{
    $target ="../images/".basename($_FILES['image']['name']);
    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
        echo "succcc";
    }
    else {echo "failed";}
}



 
?>