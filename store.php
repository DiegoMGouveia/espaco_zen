<?php
require("_func/functions.php");
require_once("_banco/conection.php");
require("classes/Store.php");

$carrinho = [
    "storeID" => "",
    "operatorID" => "",
     "openTime" => "",
     "closeTime" => "",
     "totalPrice" => "",
     "coupon" => "",
     "cpfClient" => "",
];


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
        // menu entrada 3 opções (Novo carrinho, Listar Carrinhos, Financeiro)

        if (empty($_GET)) {
            require("store/store-menu.php");
        }
        
        // termina a sessão "cart"
        if(isset($_GET["quitshop"])) {

            unset($_SESSION["cart"]);
            
            header('location: store.php');
            
        } 
        

    // if( isset ($_SESSION["cart"]) ) {
        require("store/manageshop.php");

            // novo carrinho de compras
        require("store/store-new-shop.php");
        
var_dump($carrinho);
echo "<br><br>";
var_dump($item_insert);
        ?>

        <!-- class storewindow -->
        </div>
            
    <!-- class="storepanel" -->
    </div>

    
</body>
</html>