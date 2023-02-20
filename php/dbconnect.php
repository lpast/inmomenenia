<?php
  function abrirConexion(){
   
    try {
      // Create connection
      $mysqli = mysqli_connect( 'localhost', 'uchlzplyz1zcl', 'uchlzplyz1zcl', 'dbbrhgswov0fge');
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