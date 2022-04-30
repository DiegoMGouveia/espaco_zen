<?php
require("_func/functions.php");
require_once("_banco/conection.php");


session_start();

if(isset($_SESSION['user_logged']) && $_SESSION['privileges'] == 1 || isset($_SESSION['user_logged']) && $_SESSION['privileges'] == 2) {

    $user = useridset();
    $privileges = privilegeset();

} else {
    // se não estiver, será redirecionado ao index.php
    header('location: login.php');
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

        <h2>Administração da Galeria de Fotos: </h2>
            
            <?php 
            // menu da galeria
            require("reqs/admin-gallery-menu.php");

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