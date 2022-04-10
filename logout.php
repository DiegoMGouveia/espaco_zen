<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--reiniciar pagina -->
    <meta http-equiv="refresh" content="1">
    <title>Logout</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <main>  
        <p>Você será redirecionado em alguns segundos...</p>
        <?php 
            if(isset($_SESSION['user_logged'])) {
                //excluir a variavel de sessão
                session_destroy();
            } else {
                header('location:index.php');
            }
        ?>

    </main>


</body>
</html>