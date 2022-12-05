<?php
include('../db/connection.php');

$itemID =  $mysqli->real_escape_string($_POST['item']);
$personID =  $mysqli->real_escape_string($_POST['person']);

$sql_code = "SELECT * FROM itemperson WHERE itemID=$itemID AND personID=$personID";
$sql_query_select = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
$rows = $sql_query_select->num_rows;

if ($rows == 1) {
    $sql_code_delete = "DELETE FROM itemperson WHERE `itemperson`.`personID` = $personID AND `itemperson`.`itemID` = $itemID";
    $sql_query_delete = $mysqli->query($sql_code_delete) or die("Falha na execução do código SQL: " . $mysqli);
} else {
    $sql_code_insert = "INSERT INTO itemperson (personID, itemID) VALUES ($personID, $itemID)";
    $sql_query_insert = $mysqli->query($sql_code_insert) or die("Falha na execução do código SQL: " . $mysqli);
}
