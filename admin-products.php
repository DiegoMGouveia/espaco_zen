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
    <title>Administração de Produtos - Espaço Zen</title>
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
            // menu dos produtos
            require("reqs/admin-products-menu.php");
        ?>
        
        <h2>Administração de produtos: </h2>
        


        <?php 

        // opção 1 do menu - novo produto
        
        if(isset($_GET["newproduct"])){
            require("reqs/admin-products-form-products.php");

        // opção 2 do menu - Ver produtos
        } elseif(isset($_GET["allproducts"])){

            require("reqs/admin-products-listproducts.php");
            // deletando produto
        } elseif(isset($_GET["delproduct"]) || isset($_GET['del'])) {
            
            require("reqs/admin-products-delproduct.php");
        }
        // modificando produto
        require("reqs/admin-product-modify-product.php");

        // buscar produto
        if(isset($_GET["search"])) {

            require("reqs/admin-product-search-product.php");

        }

        ?>
    </div>
</body>
</html>