<?php
ini_set("display_errors", 1);
    $mysqli = new mysqli("localhost", "root", "", "euhack");

    // TODO - Check that connection was successful.

    $fhousing = $_POST["housing"];
    $fincome = $_POST["income"];
    $fjobs = $_POST["jobs"];
    $feducation = $_POST["education"];
    $fsafety = $_POST["safety"];
    $fworklifebalance = $_POST["worklifebalance"];

if ($stmt = $mysqli->prepare("SELECT `Country` FROM `eudata`  WHERE (Housing = ? && Income = ? && Jobs = ? && Education = ? && Safety = ? && WorkLifeBalance = ?)")){
    $stmt->bind_param( "iiiiii", $fhousing, $fincome, $fjobs, $feducation, $fsafety, $fworklifebalance); 

    $stmt->execute();
    $stmt->store_result();
     $stmt->bind_result($Country);
     $stmt->fetch();

     echo $Country;
    $stmt->close();

    $mysqli->close();
}else
{
$error = $mysqli->errno . ' ' . $mysqli->error;
echo $error; // 1054 Unknown column 'foo' in 'field list'
}
   
?>