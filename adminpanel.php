<?php
    require("_func/functions.php");
    require_once("_banco/conection.php");

    session_start();

    // checa se o usuário é administrador
    adminCheck();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/style.css">
    <link rel="shortcut icon" href="_imgs/icone_zen.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">
    <title>Painel Administrativo - Espaço Zen</title>
</head>
<body>

    <?php
    // topo da página
    require("reqs/topo.php");
    ?>

    <?php 
    // menu do administrador
    require("reqs/adminpanel-menuprincipal.php");

       


    ?>
    
</body>
</html>