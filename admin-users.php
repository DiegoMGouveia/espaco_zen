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
    <title>Administração de Usuários - Espaço Zen</title>
</head>
<body>

    <?php
    // topo da página
    require("reqs/topo.php");
    ?>

    <?php 
    // menu do administrador
    require("reqs/adminpanel-menuprincipal.php");

    // Painel Administrativo -> Usuários
    ?>
    <div class="adminuserpanel">
        
        <?php
        // menu com 2 opções 
        // "allusers" => lista todos usuários
        // "search"   => pesquisa por um ou mais usuários
        require("reqs/admin-users-menu.php");
        echo "<h2> Administração de Usuários: </h2>";

        
        if ( isset ( $_GET["allusers"] ) ) {

            $users = listusers($conecta);
            require("reqs/adminpanel_search.php");

        } elseif ($_GET["edit-user"] > 0 && $_SESSION["privileges"] == 1 || $_GET["edit-user"] > 1 && $_SESSION["privileges"] == 2) {

            require("reqs/admin-users-manageuser.php");

        } elseif ( isset ( $_GET["search"] ) ) {
            require("reqs/admin-users-searchuser.php");
        } elseif (isset($_GET["Deluser"] ) || isset($_GET["deleted"])) {

            require("reqs/admin-user-deluser.php");
            
        }




    
    ?>
    </div> <!-- class="adminuserpanel" -->
    
</body>
</html>