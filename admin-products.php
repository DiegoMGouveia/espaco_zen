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
        
        <h2>Administração de produtos: </h2>
        
        <?php 
        // menu dos produtos
        require("reqs/admin-products-menu.php");
        ?>

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