<?php 
include('../db/connection.php');

$itemID =  $mysqli->real_escape_string($_POST['item']);
$personID =  $mysqli->real_escape_string($_POST['person']);
$evaluation =  $mysqli->real_escape_string($_POST['evaluation']);

$sql_code = "SELECT * FROM evaluation WHERE personID=$personID AND itemID=$itemID;";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$rows = $sql_query->num_rows;

if ($rows == 1) {
    $sql_code = "UPDATE `evaluation` SET `value`=$evaluation WHERE itemID=$itemID AND personID=$personID";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
} else {
    $sql_code = "INSERT INTO `evaluation` (`personID`, `itemID`, `value`) VALUES ($personID, $itemID, $evaluation)";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
}



