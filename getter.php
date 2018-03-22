<?php
header('Access-Control-Allow-Origin: *');
ini_set("display_errors", 1);
    $mysqli = new mysqli("rdbms.strato.de", "U3314947", "euHack2018!", "DB3314947");

    // TODO - Check that connection was successful.

    $fhousing = $_POST["housing"];
    $fincome = $_POST["income"];
    $fjobs = $_POST["jobs"];
    $feducation = $_POST["education"];
    $fsafety = $_POST["safety"];
    $fworklifebalance = $_POST["worklifebalance"];
    $finnovation = $_POST["innovation"];
    $fliving = $_POST["living"];
    $fwelfarestate = $_POST["welfarestate"];
    $ffreetimeactivities = $_POST["freetimeactivities"];
    $fsustainibility = $_POST["sustainibility"];
    $fcommunity = $_POST["community"];

    
    if ($stmt = $mysqli->prepare("SELECT `Country` FROM `eudata`  WHERE (Housing = ? && Income = ? && Jobs = ? && Education = ? && Safety = ? && WorkLifeBalance = ? && Innovation = ? && Living = ? && Welfarestate = ? && Freetimeactivities = ? && Sustainibility  = ? && Community = ? )")){
        $stmt->bind_param( "iiiiiiiiiiii", $fhousing, $fincome, $fjobs, $feducation, $fsafety, $fworklifebalance, $finnovation, $fliving,  $fwelfarestate, $ffreetimeactivities, $fsustainibility, $fcommunity); 
        $stmt->execute();
        $stmt->bind_result($Country);
        $myArray = array();
        while ($stmt->fetch()) {
          
          $myArray[] = $Country;  
          $json = json_encode($myArray);    
            
        }
        if(count($myArray) == 0)
{
    
   $i = rand(0,10);
   $sql = "SELECT Country FROM eudata WHERE id = $i";
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
        $count = count($row);
        $json1 = json_encode($row);
        echo $json1;
    }
}
else
{
    echo $json;
}
        
        
           //print_r($Country);
          
       
        $stmt->close();
    
    }else
    {
    $error = $mysqli->errno . ' ' . $mysqli->error;
    echo $error; // 1054 Unknown column 'foo' in 'field list'
    }
       
    ?>