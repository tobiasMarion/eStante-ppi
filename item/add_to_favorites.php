<?php
include('../db/connection.php');

$itemID =  $mysqli->real_escape_string($_POST['item']);
$personID =  $mysqli->real_escape_string($_POST['person']);

$sql_code = "SELECT * itemPerson WHERE itemID = $itemID AND personID = $personID";
$sql_query_select = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$rows = $sql_query_select->num_rows;

if ($rows) {
    $sql_code = "DELETE FROM itemperson WHERE `itemperson`.`personID` = $personID AND `itemperson`.`itemID` = $itemID";
    $sql_query_delete = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
} else {
    
}
