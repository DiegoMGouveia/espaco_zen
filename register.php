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
        if (isset($_POST["cpf"])){
            if (validateCPF($_POST['cpf'])) {

                $cpf = $_POST["cpf"];

            } else {
                $cpferror = "CPF Inválido! Verifique e tente novamente";
            }
        } else {
            $nocpf = "Digite seu CPF";
        }
// --------verifica se $username, $password, $email, $cellphone estão setados
        if (isset($username) && isset($user) && isset($password) && isset($email) && isset($cellphone) && isset($cpf)){
            $register = registro($conecta,$username,$password,$user,$cellphone,$cpf,$email);
            if($register == 1){
                $sucefful = "Registro realizado com sucesso!";
            } elseif ($register === 1062) {

                $duplicate = "<strong>Nome de usuário</strong>, <strong>e-mail</strong>, <strong>CPF</strong> ou <strong>celular</strong> ja existente no cadastro de outro usuário, favor utilizar um diferente.";
                 
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">
    <title>Cadastro - Espaço Zen</title>
</head>
<body>


    <?php
    // topo da página
    require("reqs/topo.php");
    // lista de serviço - apresentação
    require("reqs/forall-listservice.php");
    ?>


    <div class="container-register">
        <form action="register.php" method="post">
            <label for="username">Usuário: </label><br>
            <input type="text" name="username" id="useruser" placeholder="Digite seu usuário" required>
            <br>
            <label for="password">Senha: </label><br>
            <input type="password" name="password" id="passworduser" placeholder="Digite sua senha" required>
            <br>
            <label for="passwordagain">Repita a senha: </label><br>
            <input type="password" name="passwordagain" id="reppassworduser"  placeholder="Repita a sua senha" required>
            <br>
            <label for="name">Nome Completo: </label><br>
            <input type="text" name="name" id="nameuser" placeholder="Digite seu nome completo" required>
            <br>
            <label for="cpf">CPF: </label><br>
            <input type="text" name="cpf" id="cpfuser" placeholder="Digite seu CPF" required>
            <br>
            <label for="email">Email: </label><br>
            <input type="email" name="email" id="emailuser"  placeholder="Digite seu email" >
            <br>
            <label for="cellphone">Celular: </label><br>
            <input type="tel" name="cellphone" id="cellphoneuser" placeholder="Digite seu celular"  required>
            <br>
            
            <button type="reset">Limpar</button><button type="submit">Enviar</button>
        </form>


        <?php
        if (isset($nopwd) || isset($noname) || isset($nophone) || isset($sucefful) || isset($denied) || isset($duplicate) || isset($nocpf)){
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
            if ( isset ( $duplicate ) ){
                echo "</br>" . $duplicate;
            }
            if ( isset ( $nocpf ) ){
                echo "</br>" . $nocpf;
            }if ( isset ( $cpferror ) ){
                echo "</br>" . $cpferror;
            }

        }
        ?>


    </div>


</body>
</html>