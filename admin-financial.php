<?php
    require("_func/functions.php");
    require_once("_banco/conection.php");

    session_start();

    // checa se o usuário é administrador
    adminCheck();
?>

<?php
if (isset($_POST["month"])){

    $search = $_POST["month"];
    $sql = "SELECT * FROM store WHERE MONTH(openTime) = '$search'";
    $financial = mysqli_query($conecta, $sql);
    
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">
    <title>Gestão Financeira - Espaço Zen</title>
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

        <h2>Administração Financeira:</h2>
        <form action="admin-financial.php" method="post">
            <select name="month" id="selectmonth">
                <option value="1">Janeiro</option>
                <option value="2">Fevereiro</option>
                <option value="3">Março</option>
                <option value="4">Abril</option>
                <option value="5">Maio</option>
                <option value="6">Junho</option>
                <option value="7">Julho</option>
                <option value="8">Agosto</option>
                <option value="9">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
            </select>
            <button type="submit">enviar</button>
        </form>

        <?php 
        if (isset($financial)){
            ?>
            <h2>Itens vendidos no mês de <?php echo monthName($_POST["month"]); ?> </h2>

            <table class="darkTable">
                <thead>
                    <tr>
                        <th width="50">ID</th>
                        <th width="50">Cliente</th>
                        <th width="50">total</th>
                        <th width="50">total Desc</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($results = mysqli_fetch_array($financial)){
                        ?>
                        <tr>
                            <td><b><?php echo $results["storeID"] ?> </b></td>
                            <td><b><?php echo $results["cpfClient"] ?></b> </td>
                            <td><b><?php echo "R$" . $results["totalPrice"] ?> </b></td>
                            <td><b><?php echo "R$" . $results["totalDiscontPrice"] ?> </b></td>
                        </tr>
                        
                    
                        <?php
                        $total += $results["totalPrice"];
                        $total2 += $results["totalDiscontPrice"];
                    }

                    ?></tbody>
                
            </table>
            <div class='container-total2'>

                <p>Total vendido:<b><br> <?php echo "R$ " . $total ?></b></p>
                <p>Total vendido com desconto: <br><b> <?php echo "R$ " . $total2 ?></b></p>

            </div> <!-- CLASS container-total -->
            <?php
        }
        ?>


               
        
    </div> <!-- adminservicepanel -->

    <?php

       


    ?>
</body>
</html>

