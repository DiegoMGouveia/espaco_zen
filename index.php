<?php
    require("_func/functions.php");
    require_once("_banco/conection.php");

    session_start();

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/style.css">
    <link rel="shortcut icon" href="_imgs/icone_zen.ico" type="image/x-icon">
    <title>Inicio - Espaço Zen</title>
</head>
<body>


    <?php
    // topo da página
    require("reqs/topo.php");
    ?>


    <div class="container1-conteudo1">
        <div class="conteudo1">
            <h2>
                Aqui você encontra:
            </h2>
            <ul>
            <?php
            $list_sql = selectservices($conecta);
            while($service_list = mysqli_fetch_array($list_sql)) {
                $serviceID = $service_list['servicesID'];

            ?>
                <li><?php echo $service_list["name"]; ?></li>
            <?php
                 } 
                 ?>
            </ul>
        </div>
    </div>

    <div class="container2-posts">
        <h2>Novidades:</h2>


    </div>

</body>
</html>