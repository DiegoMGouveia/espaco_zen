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
    <title>Galeria - Espaço Zen</title>
</head>
<body>

    <?php
    // topo da página
    require("reqs/topo.php");
    ?>
    <br>
    <div class="container-caption-page">

        <center><h1>Postagens de fotos do <strong>Espaço Zen</strong></h1></center>
    </div>
    <div class="container-content"> <!-- container-caption-page -->
    <?php 
    $gallery_query = listgallery($conecta);
    while($gallery_list = mysqli_fetch_array($gallery_query)) {
        ?>
            <div class="container1-service-show">
                <img src="<?php echo $gallery_list['photoPath']; ?>" alt="<?php echo $gallery_list['name']; ?>" width="300em" height="300em">
                <h3><?php echo $gallery_list['name']; ?></h3>
                <h4>Descrição:</h4>
                <p><?php echo $gallery_list['description']; ?></p>
            </div> <!-- container1-service-show -->
        <?php
    }
    ?>
    </div> <!--container-content-->
    
</body>
</html>