<?php
require("_func/functions.php");
require_once("_banco/conection.php");
require __DIR__ . "/classes/Store.php";




session_start();

if(isset($_SESSION['user_logged']) && $_SESSION['privileges'] == 1 || isset($_SESSION['user_logged']) && $_SESSION['privileges'] == 2) {

    $user = useridset();
    $privileges = privilegeset();

} else {
    // se não estiver, será redirecionado ao index.php
    header("location: login.php?returnpage='store.php'");
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
    <title>Store - Espaço Zen</title>
</head>
<body>
    
    
    <?php
    
    // topo da página
    require("reqs/topo.php");
    
    // menu do administrador
    require("reqs/adminpanel-menuprincipal.php");
    ?>

    <!-- fundo do conteúdo da página -->
    <div class="storepanel">

        <h2>Store: </h2>

        <div class="storewindow">

        <?php

        require("store/req/store-window.php");

        
        
        ?>



        <!-- class storewindow -->
        </div>


            
            
    <!-- class="storepanel" -->
    </div>
    
</body>
</html>