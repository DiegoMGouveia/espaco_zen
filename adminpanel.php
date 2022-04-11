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


    <Header>


        <div class="img-logo">
            <img src="_imgs/espaco_zen.png" alt="logo espaço zen" width="265em"><br>
        </div>
        <div class="titulo">
            <a href="index.php"><h1>Espaço Zen</h1></a>
        <?php menuprincipal(); ?>
        </div>


    </Header>


    <div class="container1-menuadmin">
        <div class="paneladmin-menu">
            <h2>
                Painel Adminisrativo:
            </h2>
            <ul>
            <li><a href="adminpanel.php?users"> Usuários </a></li>
            <li>Serviços</li>
            <li>Produtos</li>
            <li>Galeria</li>
            <li>Novidades</li>
            <li>Promoções</li>
            <li>Definições</li>
            </ul>
        </div>
    </div>

    <?php 
        if (isset($_GET["users"])) {
            ?>
                <div class="adminuserpanel">
                   <h2> Administração de Usuários: </h2>
                   <div class="container2-menu-users">
                        <ul>
                                <a href="adminpanel.php?users=1"><li>Listar Usuários</li></a>
                                <li>Procurar Usuário</li>
                        </ul>
                    </div>

                    <?php
                        if ($_GET["users"] == 1){
                            $lista = listusers($conecta);

                            $sql_list = "SELECT * FROM users"; 
                            ?>
                                <div class="tabela-lista-users">
                                    <table border="1" cellspacing="0">
                                        <tr class="topo-tabela">
                                            <td>ID: </td>
                                            <td>Usuário: </td>
                                            <td>Nome: </td>
                                            <td>Email: </td>
                                            <td>Celular: </td>
                                            <td>Selecionar: </td>
                                        </tr>


                                        <?php
                                            while($usuario_list = mysqli_fetch_array($lista)) {

                                        ?>
                                            <tr>
            
                                                <td><?php echo $usuario_list['userID']?></td>
                                                <td><?php echo $usuario_list['username']?></td>
                                                <td><?php echo $usuario_list['name']?></td>
                                                <td><?php echo $usuario_list['email']?></td>
                                                <td><?php echo $usuario_list['cellphone']?></td>
                                                <td><a href="http://"></a></td>
            
                                            </tr>
                                    </div>

                                        <?php
                                            }
                        }
                                ?>

                    </div>
            <?php
        }
    ?>

    

</body>
</html>