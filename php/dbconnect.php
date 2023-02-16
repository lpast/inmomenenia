<?php
  function abrirConexion(){
    $servername = "localhost";
    $database = "dbbrhgswov0fge";
    $username = "uchlzplyz1zcl";
    $password = "uchlzplyz1zcl";
    
    
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