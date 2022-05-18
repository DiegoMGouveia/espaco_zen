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
    <title>Gerenciar Promoções - Espaço Zen</title>
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

        <h2>Administração de cupons promocionais: </h2>
            
            <?php 
            // menu da galeria
            require("reqs/admin-coupons-menu.php");

            // opção 1 novo cupom
            if(isset($_GET["new"])) {
                ?>

                <div class="form-coupon">

                    <form action="admin-coupons.php?new" method="post">
                        <label for="discount">Desconto: %</label>
                        <input type="text" name="discount" placeholder="25" required><br>
                        <label for="description">Descrição: </label>
                        <input type="text" name="description" placeholder="sorteio do instagram" required><br>
                        <button type="submit">Gerar</button>
                    </form>
                    <br>
                    <?php 
                    if (isset($_POST["discount"])) {
                        $new_coupon = insertCode($_POST["discount"],$_POST["description"],$conecta);
                        echo "Novo cupom de " . $_POST["discount"] . "% de desconto foi gerado! <br>";
                        echo "CUPOM: '$new_coupon'";

                    }
                    ?>

                </div><!-- "form-coupon" -->

                <?php

            // opção 2 listar cupons
            }  elseif (isset($_GET["listcoupons"])) {
                    require("reqs/admin-coupons-listall.php");

            }
            ?>

    </div>
    
</body>
</html>