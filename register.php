<?php
    require("_func/functions.php");
    require_once("_banco/conection.php");

    session_start();

    if (isset($_POST["username"])) {
        $username  = $_POST["username"];
        if($_POST["password"] == $_POST["passwordagain"]){
            $password = $_POST["password"];

        } else {
            $nopwd = "Senhas NÂO identicas, digite novamente.";
        }
        if(isset($_POST["name"])) {
            $user      = $_POST["name"];
        } else {
            $noname = "Digite seu nome";
        }
        if(isset($_POST["email"])){
            $email     = $_POST["email"];
        } 
        if (isset($_POST["cellphone"])){
            $cellphone = $_POST["cellphone"];
        } else {
            $nophone = "Digite seu celular";
        }
// --------verifica se $username, $password, $email, $cellphone estão setados
        if (isset($username) && isset($user) && isset($password) && isset($email) && isset($cellphone)){
            $register = registro($conecta,$username,$password,$user,$email,$cellphone);
            if(isset($register)){
                $sucefful = "Registro realizado com sucesso!";
            } else {
                $denied = "Erro no cadastro, verifique e tente novamente.";
            }
        }

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
            <input type="text" name="username" id="useruser" placeholder="Digite seu usuário" required>
            <br>
            <label for="password">Senha: </label>
            <input type="password" name="password" id="passworduser" placeholder="Digite sua senha" required>
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

        <?php if (isset($nopwd) || isset($noname) || isset($nophone) || isset($sucefful) || isset($denied)){
            if($nopwd){
                echo "<br>".$nopwd;
            }
            if($noname){
                echo "<br>".$noname;
            }
            if($nophone){
                echo "<br>".$nophone;
            }
            if($sucefful) {
                echo "<br>".$sucefful;
            }
            if($denied){
                echo "<br>".$denied;
            }
        }
        ?>


    </div>


</body>
</html>