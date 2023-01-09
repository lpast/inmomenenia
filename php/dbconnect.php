<?php
function abrirConexion(){
     $servername = "localhost";
  $database = "db_inmomenenia";
  $username = "root";
  $password = "ubuntu";
  
  
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $database);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  //echo "Connected successfully";
  return $conn;
}
   
  ?>