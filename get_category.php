<?php
header('Access-Control-Allow-Origin: *');
ini_set("display_errors", 1);
    $mysqli = new mysqli("rdbms.strato.de", "U3314947", "euHack2018!", "DB3314947");


    
    if ($stmt = $mysqli->prepare("SELECT name, bp, img_url FROM bulletpoints")){ 
        $stmt->execute();
        $stmt->bind_result($c_list, $bp, $img);
        $myArray = array();
        while ($stmt->fetch()) {
          
          $c_array[] = $c_list; 
          $c_array[] = $bp; 
          $c_array[] = $img;
          $json = json_encode($c_array);    
            
        }
echo $json;     
        
           //print_r($Country);
          
       
        $stmt->close();
    
    }else
    {
    $error = $mysqli->errno . ' ' . $mysqli->error;
    echo $error; // 1054 Unknown column 'foo' in 'field list'
    }
       
    ?>