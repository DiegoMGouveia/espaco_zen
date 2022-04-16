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

<?php
// alterando Usuário
if (isset($_POST["changeusername"]) && isset($_POST["changename"]) && isset($_POST["changeemail"]) && isset($_POST["changecell"])){
    if(empty($_POST["changeusername"]) || empty($_POST["changename"]) || empty($_POST["changeemail"]) || empty($_POST["changecell"])){
        
        $error_empty = "Há campos a serem preenchido, verifique e tente novamente.";

    } else {
                
    $change_ok = admChangeUser($conecta);
    }

} elseif ($_GET["edit-user"] == 1 && $privileges > 1) {
    
    // Mensagens de erro para usuários que tentarem modificar os dados do administrador
    ?>
    <div class="manageuser">
        <p>Somente o administrador pode alterar este cadastro.</p>
        <META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php">
    </div>

    <?php
    // Mensagem de erro para quem não tem permissão tentar editar algum usuário
    } elseif ($privileges > 2){
    ?>
    <div class="manageuser">
        <p>Somente o administrador pode alterar este cadastro.</p>
        <META HTTP-EQUIV="REFRESH" CONTENT="3; URL=index.php">
    </div>

    <?php
    }?>

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
            <a href="adminpanel.php?services"><li> Serviços </li></a>
            <a href="#"><li>Produtos</li></a>
            <a href="#"><li>Galeria</li></a>
            <a href="#"><li>Novidades</li></a>
            <a href="#"><li>Promoções</li></a>
            <a href="#"><li>Definições</li></a>
            </ul>
        </div>
    </div>

    <?php 
    // Painel Administrativo -> Usuários
        if (isset($_GET["users"])) {
            ?>
                <div class="adminuserpanel">
                   <h2> Administração de Usuários: </h2>
                   <div class="container2-menu-users">
                        <ul>
                                <a href="adminpanel.php?users=1"><li>Ver Usuários</li></a>
                                <a href="adminpanel.php?users=2"><li>Buscar Usuários</li></a>
                        </ul>
                    </div>

                    <?php
                    // lista de usuários

                    if ($_GET["users"] == 1){
                        $users = listusers($conecta);

                        require("reqs/adminpanel_search.php");
                                        
                    } elseif ($_GET["users"] == 2){
                        ?>

                        <form action="adminpanel.php?users=2" method="post">
                            <input type="text" name="searchuser" id="searchuser" placeholder="Digite alguma informação do usuário">
                            <a href="adminpanel.php?users=2"><button type="submit">Buscar</button></a>
                        </form>

                        <?php

                        if(isset($_POST["searchuser"])){
                            $users = searchusers($conecta);

                            require("reqs/adminpanel_search.php");

                        }

                    }
                    ?>

                </div>
            <?php
                // editar usuário - adminpanel
        } elseif ($_GET["edit-user"] > 0 && $privileges == 1 || $_GET["edit-user"] > 1 && $privileges == 2) {
            $selected_user = selectuserbyid($conecta);
            ?>
            <div class="manageuser">
            <?php
                if (isset($error_empty)){
                    echo $error_empty;
                    
                    echo "<br>";

                    echo "<a href='adminpanel.php?users=1'><button>Voltar</button></a>";

                    echo " <META HTTP-EQUIV='REFRESH' CONTENT='3; URL=adminpanel.php?users=1'>";

                }elseif (($change_ok) && (!$error_empty)){
                    
                    echo "Alterado com sucesso!";
                    
                    echo "<br>";

                    echo "redirecionando de volta...";

                    echo "<a href='adminpanel.php?users=1'><button>Voltar</button></a>";

                    echo " <META HTTP-EQUIV='REFRESH' CONTENT='3; URL=adminpanel.php?users=1'>";

                } else {
                ?>
                    <form action="adminpanel.php?edit-user=<?php echo $selected_user['userID'];?>" method="post">
                        <label for="changeusername">Usuário: </label>
                        <input type="text" name="changeusername" id="changeusername" value="<?php echo $selected_user["username"];?>">
                        <label for="changepwd">Nova senha: </label>
                        <input type="text" name="changepwd" id="changepwd" placeholder="Digite uma NOVA senha">
                        <label for="changepwd2">Repita a nova senha: </label>
                        <input type="text" name="changepwd2" id="changpwd2" placeholder="Repita a NOVA senha">
                        <label for="changename">Nome: </label>
                        <input type="text" name="changename" id="changename" value="<?php echo $selected_user["name"];?>">
                        <label for="changeemail">Email: </label>
                        <input type="email" name="changeemail" id="changeemail" value="<?php echo $selected_user["email"];?>">
                        <label for="changecell">Celular: </label>
                        <input type="text" name="changecell" id="changecell" value="<?php echo $selected_user["cellphone"];?>">
                        <label for="changeprivilege">Privilégios: </label>
                        <select name="changeprivilege">

                            <?php $privilegelist = listprivileges($conecta);
                            $selected_user = selectuserbyid($conecta);

                            while($privileges = mysqli_fetch_array($privilegelist)) {
                                if($privileges["privID"] == $selected_user["privileges"]){
                                    $privoption = $privileges["privID"];
                                    $privname   = $privileges["privname"];
                                    echo "<option value='$privoption' selected>$privname</option>";
                                } else {
                                    $privoption = $privileges["privID"];
                                    $privname   = $privileges["privname"];
                                    echo "<option value='$privoption'>$privname</option>";

                                }
                            }?>
                        </select>

                        <br><br>
                        <a href="adminpanel.php?edit-user=<?php echo $selected_user['userID'];?>"><button> Atualizar </button></a>
                    </form>
                    <a href='adminpanel.php?users=1'><button>Voltar</button></a>
                <?php } ?>
                
            </div>

        <?php
        } elseif (isset($_GET["services"])) {
            ?>

            <div class="adminservicepanel">

                <h2>Administração de Serviços:</h2>

                <div class="menu-service">

                    <ul>
                        <a href="adminpanel.php?services=1"><li>Novo Serviço</li></a>
                        <a href="#"><li>Ver Serviços</li></a>
                        <a href="#"><li>Buscar Serviço</li></a>
                    </ul>

                </div>
                <php
                if ($_GET["services"] == 1) {
                    ?>
                    <div class="newservice">
                        <h3>Criando um novo serviço:</h3>

                        <form action="adminpanel.php?services1" method="post" enctype="multipart/form-data">

                            <label for="newname">Nome do serviço</label><br>
                            <input type="text" name="newname" class="inputservices" placeholder="Digite o nome do serviço aqui."><br>
                            <label for="newprice">Valor R$:</label><br>
                            <input type="number" name="newprice" class="inputservices"><br>
                            <label for="newdescription">Descrição: </label><br>
                            <textarea class="inputservices" name="newdescription" placeholder="Digite uma breve descrição aqui..."></textarea><br><br>
                            <label for="newimg">Enviar imagem: </label><br>
                            <input type="file" name="newimg" class="inputservices" accept="image/*"><br><br>
                            <button type="reset">Resetar</button><button type="submit">Enviar</button>

                        </form>

                    </div>

            </div>

            <?php

        }
        ?>

</body>
</html>