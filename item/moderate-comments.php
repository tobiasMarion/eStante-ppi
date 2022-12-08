<?php
include('../db/connection.php');

$commentID =  $mysqli->real_escape_string($_POST['comment']);
$operation =  $mysqli->real_escape_string($_POST['operation']);

if ($operation == "Aprovar") {
    $sql_code = "UPDATE comment SET approved=1 WHERE commentID=$commentID";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
} else {
    $sql_code = "DELETE FROM comment WHERE commentID=$commentID";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli);
}

