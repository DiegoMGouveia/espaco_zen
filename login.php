<?php
    require("_func/functions.php");

    if (!$_SESSION['user_logged']){
        // se não tiver um usuário não faz nada
    } else {
        session_start();
    }

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/style.css">
    <link rel="shortcut icon" href="_imgs/icone_zen.ico" type="image/x-icon">
    <title>Inicio - Espaço Zen</title>
</head>
<body>


    <Header>


        <div class="img-logo">
            <img src="_imgs/espaco_zen.png" alt="logo espaço zen" width="265em"><br>
        </div>
        <div class="titulo">
            <a href="index.php"><h1>Espaço Zen</h1></a>
        <?php menuprincipal() ?>
        </div>


    </Header>


    <div class="container-login">

        <label for="usermail">Email/Usuário: </label>
        <center><input type="text" name="usermail" id="usermail" placeholder="Email ou Usuário" required></center>
        <br>
        <label for="password">Senha: </label>
        <center><input type="password" name="password" id="password"></center>
        
        <center><button type="reset">Limpar</button><button type="submit">Entrar</button>
        <br>
        <br>
        <a href="register.php"><button>Cadastre-se!</button></a></center>


    </div>


</body>
</html>