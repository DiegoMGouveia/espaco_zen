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
    <title>Cadastro - Espaço Zen</title>
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


    <div class="container-register">
        <form action="register.php" method="post">
            <label for="username">Usuário: </label>
            <input type="text" name="usermail" id="useruser" placeholder="Digite seu usuário" required>
            <br>
            <label for="password">Senha: </label>
            <input type="password" name="password" id="passworduser"  placeholder="Digite sua senha" required>
            <br>
            <label for="passwordagain">Repita a senha: </label>
            <input type="password" name="passwordagain" id="reppassworduser"  placeholder="Repita a sua senha" required>
            <br>
            <label for="name">Nome Completo: </label>
            <input type="text" name="name" id="nameuser" placeholder="Digite seu nome completo" required>
            <br>
            <label for="email">Email: </label>
            <input type="email" name="email" id="emailuser"  placeholder="Digite seu email" >
            <br>
            <label for="cellphone">Celular: </label>
            <input type="tel" name="cellphone" id="cellphoneuser" placeholder="Digite seu celular"  required>
            <br>
            
            <button type="reset">Limpar</button><button type="submit">Enviar</button>
        </form>


    </div>


</body>
</html>