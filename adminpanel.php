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
    <title>Painel Administrativo - Espaço Zen</title>
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
            <a href="adminpanel.php?users"><li> Usuários </li></a>
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
                                                $user_id = $usuario_list["userID"];

                                        ?>
                                            <tr>
            
                                                <td><?php echo $user_id;?></td>
                                                <td><?php echo $usuario_list["username"]?></td>
                                                <td><?php echo $usuario_list["name"]?></td>
                                                <td><?php echo $usuario_list["email"]?></td>
                                                <td><?php echo $usuario_list["cellphone"]?></td>
                                                <td><a href="adminpanel.php?edit-user=<?php echo $user_id;?>"><button>Editar</button></a></td>
            
                                            </tr>
                                    </div>

                                        <?php
                                            }
                        }
                                ?>

                    </div>
            <?php

        } elseif (isset($_GET["edit-user"])) {
            $selected_user = selectuserbyid($_GET["edit-user"], $conecta);
            ?>
            <div class="manageuser">
                <form action="adminpanel.php?edit-user<?php echo $user;?>" method="post">
                    <label for="changeusername">Usuário: </label>
                    <input type="text" name="changeusername" id="changeusername" value="<?php echo $selected_user["username"];?>">
                    <label for="changepwd">Nova senha: </label>
                    <input type="text" name="changepwd" id="changepwd" placeholder="Digite uma NOVA senha">
                    <label for="changepwd2">Repita a nova senha: </label>
                    <input type="text" name="changepwd2" id="changpwd2" placeholder="Repita a NOVA senha">
                    <label for="changename">Nome: </label>
                    <input type="text" name="changename" id="changename" value="<?php echo $selected_user["name"];?>">
                    <label for="changeemail">Email: </label>
                    <input type="text" name="changeemail" id="changeemail" value="<?php echo $selected_user["email"];?>">
                    <label for="changecell">Celular: </label>
                    <input type="text" name="changecell" id="changecell" value="<?php echo $selected_user["cellphone"];?>">
                    <br><br>
                    <button>Atualizar</button>



                </form>
            </div>

            <?php
        }
            

    
    ?>

    

</body>
</html>