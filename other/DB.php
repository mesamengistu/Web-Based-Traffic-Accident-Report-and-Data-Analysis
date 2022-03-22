<?php
  $servername;
class databaseconnection
{
    
   
public function connect()
   {
     $servername ="localhost";
     $username = "root";
     $password = "";
     $databasename = "traffic_accident_report";
     $conn = new mysqli($servername,$username , $password ,  $databasename  );
        if($conn->connect_error)
        {
        echo "error while connecting to database".$conn->connect_error;
        }
        else
        {
        echo "database connnected sucssfully";
        }
     return $conn;
   }
public function getdata()
   {    $sql ="SELECT * FROM me";
       $result = $this->connect()->query($sql);
       $numrow = $result->num_rows;
       if($numrow > 0)
       {
           while($row = $result->fetch_assoc())
           {
               $data[] = $row;
   
           }
       }
    return $data;
   }
   public function showresult()
{
   $datas = $this->getdata();
   foreach($datas as $data)
   {
       echo $data['id']."<br>";
       echo $data['usr']."<br>"; 
       echo $data['pass']."<br>";
   }

}
   public function insertdata()
   {
     $result = $this->connect();
     $stmt = $result->prepare("INSERT INTO me(id,usr,pass) VALUES(?,?,?)");
     $stmt->bind_param("iss",$id,$usr,$pass);
     $id ="1508";
     $usr="MEsay";
     $pass="Mengistu";
     $stmt->execute();
     $stmt->close();
     $result->close();
   }
}


?>