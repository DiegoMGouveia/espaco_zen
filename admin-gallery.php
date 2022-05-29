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
    <title>Administração da Galeria - Espaço Zen</title>
</head>
<body>
    
    <?php
    // topo da página
    require("reqs/topo.php");
    
    // menu do administrador
    require("reqs/adminpanel-menuprincipal.php");
    ?>

    <!-- fundo do conteúdo da página -->
    <div class="adminuserpanel">

        
            
            <?php 
            // menu da galeria
            require("reqs/admin-gallery-menu.php");

            echo "<h2>Administração da Galeria de Fotos: </h2>";

            // opção 1 nova foto
            if(isset($_GET["newphoto"])) {
                require("reqs/admin-gallery-newphoto-form.php");

            // opção 2 listar fotos
            } elseif (isset ($_GET["listgallery"])) {
                require("reqs/admin-gallery-listphotos.php");

            // opção 3 buscar fotos  -- NÃO CONFIGURADO
            } elseif (isset ($_GET["search"])) {
                require("reqs/admin-gallery-search-photo.php");
            }

            // deletar foto
            require("reqs/admin-gallery-delphoto.php");

            require("reqs/admin-gallery-modify-photo.php");
            ?>

    </div>
    
</body>
</html>