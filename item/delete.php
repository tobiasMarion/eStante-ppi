<?php 
include('../db/connection.php');

$itemID =  $mysqli->real_escape_string($_GET['item']);

$sql_code = "DELETE FROM item WHERE itemID=$itemID LIMIT 1";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);

header("Location: ../");