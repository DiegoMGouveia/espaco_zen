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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">
    <title>Serviços - Espaço Zen</title>
</head>
<body>

    <?php
    // topo da página
    require("reqs/topo.php");
    ?>
    <br>
    <div class="container-caption-page">

        <center><h1>Serviços oferecidos pelo <strong>Espaço Zen</strong></h1></center>

    </div>
    <div class="container-content">
    <?php 
    $list_sql = selectservices($conecta);
    while($service_list = mysqli_fetch_array($list_sql)) {
        ?>
            <div class="container1-service-show">
                <img src="<?php echo $service_list['imgPath']; ?>" alt="<?php echo $service_list['name']; ?>" width="300em" height="300em">
                <h2><?php echo $service_list['name']; ?></h2>
                <p><strong>R$<?php echo $service_list['price']; ?></strong></p>
                <h4>Descrição:</h4>
                <p><b><?php echo $service_list['description']; ?></b></p>
            </div> <!-- container1-service-show -->
        <?php
    }
    ?>
    </div> <!--container-content-->
    
</body>
</html>