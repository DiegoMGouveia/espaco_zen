<?php
    require("_func/functions.php");
    require_once("_banco/conection.php");

    session_start();

    if(isset($_POST["usermail"]) && isset($_POST["password"])){
        $login = login($_POST["usermail"],$_POST["password"],$conecta);
        if ( empty($login) ){
            //login errado
            $mensagem = "Usuário/senha incorreto. Tente novamente.";
        } else {
            if ($login["username"] === $_POST["usermail"] || $login["cellphone"] === $_POST["usermail"] || $login["email"] === $_POST["usermail"]  ) {
                //login com sucesso
                $_SESSION["user_logged"] = $login["userID"];
                $_SESSION["user_name"]   = $login["name"];
                $_SESSION["privileges"]   = $login["privileges"];
                if ($_SESSION["privileges"] <= 2) {
                    // se o usuário tiver privilégio administrativo ou é o proprietário
                    
                    header("location:adminpanel.php");
                
                } elseif ($_SESSION["privileges"] > 2 && ($_SESSION["privileges"] <= 5)) {
                    // se o usuário for um cliente, funcionário ou fornecedor

                    header("location:index.php");

                }
            } else {

                //login errado
                $mensagem = "Usuário/senha incorreto. Tente novamente.";

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
    <title>Login - Espaço Zen</title>
</head>
<body>


    <?php
    // topo da página
    require("reqs/topo.php");
    ?>


    <div class="container-login">
        <form action="login.php" method="post">
            <label for="usermail">Email/Usuário: </label>
            <center><input type="text" name="usermail" id="usermail" placeholder="Email ou Usuário" required></center>
            <br>
            <label for="password">Senha: </label>
            <center><input type="password" name="password" id="password"></center>
            
            <center><button type="reset">Limpar</button><button type="submit">Entrar</button>
            <br>
            <br>
        </form>

        <a href="register.php">Cadastre-se!</a>
    
        <?php
        if (isset($mensagem)){

            echo "<div class='msgerror'>";

            echo "<br>" . $mensagem;

            echo "</div>";
            
        }
        ?>
    
    </center>




    </div>


</body>
</html>