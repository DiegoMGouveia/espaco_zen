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
            } else {

                ?>
                <a href="store.php">Voltar</a>
                <?php
            }
            
            // termina a sessão "cart"
            if(isset($_GET["quitshop"])) {


                $closed = closeShopCart($_SESSION["cart"]["storeID"], $conecta, $_POST["coupon"]);
                unset($_SESSION["cart"]);
                
                header("location: store.php");

            }
            

            // if( isset ($_SESSION["cart"]) ) {
            require("store/manageshop.php");

                // novo carrinho de compras
            require("store/store-new-shop.php");

            //listar carrinhos
            if ( isset ( $_GET["liststore"] ) ) {
                
                ?>
                <table class="shop-table">
                    
                    <thead>
                        <tr>
                            <th width="50">ID</th>
                            <th width="50">Operador</th>
                            <th width="30">CPF Cliente</th>
                            <th width="50">Abertura</th>
                            <th width="80">Encerramento</th>
                            <th width="30">Cupom</th>
                            <th width="30">Valor Total</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $store_list = listShops($conecta);
                    while($shop = mysqli_fetch_array($store_list)) {

                        ?>
                        <tr>
                            <td><?php echo $shop["storeID"] ?></td>
                            <td><?php echo $shop["operatorID"] ?></td>
                            <td><?php echo $shop["cpfClient"] ?></td>
                            <td><?php echo $shop["openTime"] ?></td>
                            <td><?php echo $shop["closeTime"] ?></td>
                            <td><?php echo $shop["coupon"] ?></td>
                            <td><?php echo "R$" . $shop["totalPrice"] ?></td>
                            <td><a href="store.php?open=<?php echo $shop["storeID"];?>"><button type="submit" name="selectshop">Abrir</button></a><a href="store.php?delStore=<?php echo $shop["storeID"];?>"><button type="submit">Deletar</button></a></td>
                        </tr>
                        <?php
                
                
                    } // while($shop = mysqli_fetch_array($store_list)) {

                    ?>
                    </tbody>

                </table>
                    
                <?php

            // if ( isset ( $_GET["listStore"])) {
            } elseif ( $_GET["open"] > 0) {
                echo "cheguei aqui ".$_GET["open"];
                $shop = openCart($_GET["open"], $conecta);
                $_SESSION["cart"] = $shop;
                header("location: store.php?shop");


            } elseif ( isset ($_GET["delStore"] ) ){
                destroyCart($_GET["delStore"], $conecta);
            }
                
            

            ?>

        <!-- class storewindow -->
        </div>
            
    <!-- class="storepanel" -->
    </div>

    
</body>
</html>