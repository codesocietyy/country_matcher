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
//grab a result set
$resultSet = $stmt->get_result();

//pull all results as an associative array
$result = $resultSet->fetch_all();
print_r($result);
    $stmt->close();

}else
{
$error = $mysqli->errno . ' ' . $mysqli->error;
echo $error; // 1054 Unknown column 'foo' in 'field list'
}
   
?>