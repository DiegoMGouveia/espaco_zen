<?php
    require("_func/functions.php");
    require_once("_banco/conection.php");

    session_start();

    // checa se o usuário é administrador
    userCheck();
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
    <title>Painel do(a) Usuário(a) - Espaço Zen</title>
</head>
<body>

    <?php
    // topo da página
    require("reqs/topo.php");
    ?>

    <?php 
    // menu do administrador
    require("reqs/userpanel-menuprincipal.php");
    ?>

    <div class="container2-mapa">

        <h2>Painel do(a) Usuário(a):</h2>
        <div class="container-perfil">
            <?php
            $userprofile = selectUser($conecta);
            ?>
            <p><strong>Usuário:</strong> <?php echo $userprofile["username"]; ?></p>
            <p><strong>Nome:</strong> <?php echo $userprofile["name"]; ?></p>
            <p><strong>E-mail:</strong> <?php echo $userprofile["email"]; ?></p>
            <p><strong>CPF:</strong> <?php echo $userprofile["cpf"]; ?></p>
            <p><strong>Celular:</strong> <?php echo $userprofile["cellphone"]; ?></p>
        </div> <!--container-perfil-->


    
    <div> <!-- adminservicepanel -->

    
</body>
</html>