<?php
    require("_func/functions.php");
    require_once("_banco/conection.php");

    session_start();

    
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


    <div class="container1-conteudo1">
        <div class="conteudo1">
            <h2>
                Aqui você encontra:
            </h2>
            <ul>
            <li>Terapia Capilar</li>
            <li>Cronogramas</li>
            <li>Mechas e Colorimetria</li>
            <li>Químicas em geral</li>
            <li>Corte feminino e infantil</li>
            <li>Sobrancelhas</li>
            <li>Cílios</li>
            <li>Depilação</li>
            <li>Unhas</li>
            <li>Maquiagem</li>
            <li>Drenagem linfática</li>
            <li>Microagulhamento</li>
            <li>Peeling químico</li>
            </ul>
        </div>
    </div>

    <div class="container2-posts">
        <h2>Novidades:</h2>


    </div>

</body>
</html>