<?php
  function abrirConexion(){
    $servername = "localhost";
    $database = "dbbrhgswov0fge";
    $username = "uchlzplyz1zcl";
    $password = "uchlzplyz1zcl";
    
    try {
      // Create connection
      $mysqli = mysqli_connect($servername, $username, $password, $database);
      // Check connection
      if (!$mysqli) {
        die ("Connection failed: " . mysqli_connect_error());
      }
      return $mysqli;
    } catch (Exception $e) {
      die ('Error' . $e->GetMessage());
    } finally {
      $mysqli = null;
    }
  }
   
?>