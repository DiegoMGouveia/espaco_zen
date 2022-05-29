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
    <title>Administração de serviços - Espaço Zen</title>
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

    <div class="adminuserpanel">

        <?php
        // menu serviços ----------------------------------------------------------
        require("reqs/admin-services-menu.php");
        echo "<h2>Administração de Serviços:</h2>";

        if ( isset ($_GET["newservice"] ) ) {

            require("reqs/admin-service-newservice.php");

        } elseif ( isset ( $_GET["allservices"] ) ) {

            $list_sql = selectservices($conecta);
            require("reqs/admin-services-allservices.php");

        } elseif ($_GET['delservice'] > 0){

            echo "<div class='delservice'>";
            echo "<p>Você tem certeza de que quer deletar este serviço?</p> <br> <p>Isso será irreversivel!</p><br>";
            echo "<a href='admin-services.php?allservices'><button>Voltar</button></a>";

            echo "<a href='admin-services.php?del=" . $_GET['delservice'] . "'><button>EXCLUIR</button></a>";
            echo "</div>";

            
        } elseif ($_GET['del'] > 0) {

            delservice($conecta);

            

        } elseif ( isset ( $_GET["selectservice"] ) ) {
            require("reqs/admin-service-manageservice.php");


        } elseif ( isset ( $_GET["search"] ) ) {
            ?>
            <form action="admin-services.php?search" method="post">
                <input type="text" name="search" id="searchuser" placeholder="pesquisar serviço">
                <button type="submit">Buscar</button>

            </form>
            <?php 
            if ( isset ( $_POST["search"] ) ) {
                $list_sql = searchService($_POST["search"], $conecta);
                require("reqs/admin-services-allservices.php");
            }
        }
        
        ?>
    </div> <!-- adminservicepanel -->

    <?php

       


    ?>
</body>
</html>