<?php
if (!isset($component_prefix_path)) {
    $component_prefix_path = '';
    global $component_prefix_path;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eStante | Qual obra você vai retirar da eStante hoje?</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= $component_prefix_path ?>./static/style/main.css">
    <link rel="shortcut icon" href="<?= $component_prefix_path ?>./static/assets/icon.svg" type="image/x-icon">

</head>