<?php
    function limpaaspas($dado){

        // Trocando ocorrencias de "exemplo" por "teste", e "Frase" por "Texto"
        $antes = array("'");
        $depois = array("\'");
        $dado2 = str_replace($antes, $depois, $dado);
        return $dado2;

    }

    function useridset(){
        $userid = $_SESSION["user_logged"];
        return $userid;
    }

    function privilegeset(){
        $privilege = $_SESSION["privileges"];
        return $privilege;
    }

    function menuprincipal(){
        if($_SESSION["privileges"] == 1){
        ?>
            <nav class="bord-menu-principal">

            <?php echo "Olá " . $_SESSION['user_name'] . " | <a href='logout.php'>Sair.</a> <br>";?>
                <ul>
                    <a href="index.php"><li>Inicio</li></a>
                    <a href="adminpanel.php"><li>Administração</li></a>
                    <a href="#"><li>Perfil</li></a>
                    <a href="#"><li>Serviços</li></a>
                    <a href="#"><li>Galeria</li></a>
                    <a href="#"><li>Agenda</li></a>
                    <a href="contato.php"><li>Contato</li></a>
                </ul>
            </nav>
        <?php
        } elseif($_SESSION["privileges"] == 5){
            ?>
                <nav class="bord-menu-principal">
                    <ul>
                        <center><li><a href="index.php">Inicio</a></li>
                        <li><a href="login.php">Perfil</a></li>
                        <li><a href="#">Serviços</a></li>
                        <li><a href="#">Galeria</a></li>
                        <li><a href="#">Agenda</a></li>
                        <li><a href="contato.php">Contato</a></li></center>
                    </ul>
                </nav>
            <?php
            } elseif(!$_SESSION["privileges"]){
                ?>
                    <nav class="bord-menu-principal">
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="register.php">Cadastrar</a></li>
                            <li><a href="#">Serviços</a></li>
                            <li><a href="#">Galeria</a></li>
                            <li><a href="#">Agenda</a></li>
                            <li><a href="contato.php">Contato</a></li>
                        </ul>
                    </nav>
                <?php
                }
    }

    
    function registro($conection, $user, $pwd, $name, $cell, $mail=null){
        $pass = MD5($pwd);
        $sql = "INSERT INTO users(username,password,name,email,cellphone) VALUES('{$user}','{$pass}','{$name}','{$mail}','{$cell}')";
        $insert_query = mysqli_query($conection, $sql);
        if ( !$insert_query ) {
            die("falha na consulta ao banco, entre em contato conosco informANDo a falha com data e hora. Obrigado!");
        } else {
            return $insert_query;
        }
    }
 
    function login($usermail, $pwd, $conection) {
        $pass = MD5($pwd);
        $sqlogin = "SELECT * FROM users WHERE username = '$usermail' AND password = '$pass' OR email = '$usermail' AND password = '$pass' OR cellphone = '$usermail' AND password = '$pass' ";
        $login_query = mysqli_query($conection,$sqlogin);
        if (!$login_query){
            die("falha na consulta ao banco de dados, entre em contato conosco informANDo a falha com data e hora. Obrigado!");
        } else {

            $logado = mysqli_fetch_assoc($login_query);
            
            return $logado;
        }
    }


    function listusers($conection){
        $sql   = "SELECT * FROM users";
        $lista = mysqli_query($conection, $sql);
        return $lista;

    }

    function selectuserbyid($conection){
        if ($_SESSION["privileges"] <=2){
            $user = $_GET["edit-user"];
            $sql = "SELECT * FROM users WHERE userID = '$user' ";
            $login_query = mysqli_query($conection,$sql);
            $selected_user = mysqli_fetch_assoc($login_query);
            return $selected_user;
        }
    }


    function admChangeUser($conection){
        if (isset($_SESSION["privileges"])) {
            $userID        = $_GET["edit-user"];
            $username      = $_POST["changeusername"];
            $name          = $_POST["changename"];
            $email         = $_POST["changeemail"];
            $cell          = $_POST["changecell"];
            $privilege     = $_POST["changeprivilege"];
            $sql_username    = "UPDATE users SET username = '$username' WHERE userID = '$userID'";
            $usernamel_query = mysqli_query($conection, $sql_username);
            $sql_name        = "UPDATE users SET name = '$name' WHERE userID = '$userID'";
            $name_query      = mysqli_query($conection, $sql_name);
            $sql_email       = "UPDATE users SET email = '$email' WHERE userID = '$userID'";
            $email_query     = mysqli_query($conection, $sql_email);
            $sql_cell        = "UPDATE users SET cellphone = '$cell' WHERE userID = '$userID'";
            $cell_query      = mysqli_query($conection, $sql_cell);
            $sql_privilege   = "UPDATE users SET privileges = '$privilege' WHERE userID = '$userID'";
            $privilege_query = mysqli_query($conection, $sql_privilege);
            if(isset($usernamel_query) && isset($name_query) && isset($email_query) && isset($cell_query) && isset($privilege_query)){
                return true;
            } else {   
            return false;
        }


        }
    }

    function listprivileges($conection){
        $sql = "SELECT * FROM privgroup";
        $privilege_query = mysqli_query($conection, $sql);
        return $privilege_query;
    }


    function searchusers($conection){
        $search_input = $_POST["searchuser"];
        $sql_user_search = "SELECT * FROM users WHERE userID LIKE '%{$search_input}%' OR username LIKE '%{$search_input}%' OR name LIKE '%{$search_input}%' OR email LIKE '%{$search_input}%' OR cellphone LIKE '%{$search_input}%' ";
        $lista = mysqli_query($conection, $sql_user_search);
        return $lista;

    }

    // criando serviço


    // selecionando serviço

    function selectservicebyid($serviceid, $conection){
        $sql = "SELECT * FROM services WHERE servicesID = '$serviceid' ";
                            
        $sql_query = mysqli_query($conection,$sql);
        $service = mysqli_fetch_assoc($sql_query);
        return $service;

    }
    

    // modificando serviço

    function selectservice($conection) {
        $serviceID = $_GET['selectservice'];
        $sql = "SELECT * FROM services WHERE servicesID = '$serviceID' ";
        $sql_query = mysqli_query($conection, $sql);
        $service = mysqli_fetch_assoc($sql_query);
        return $service;

    }

    // ---- alterando dados do serviço
    function change($serviceID,$path,$conection){

        if(empty($_POST['changename'])) {
            // se não tiver preenchido não mudará nada
            

        } else{
    
            $newName = $_POST["changename"];
            $updateName = "UPDATE services SET name = '$newName' WHERE servicesID = '$serviceID'";
            $changeService = mysqli_query($conection, $updateName);
            

    
        }
    
        if(empty($_POST['changeprice'])) {
    
            // se não tiver preenchido não mudará nada
        } else{
    
            $newValor = $_POST["changeprice"];
            $updateValor = "UPDATE services SET valor = '$newValor' WHERE servicesID = '$serviceID'";
            $changeService = mysqli_query($conection, $updateValor);
    
        }
    
    
        if(empty($_POST['changedescription'])) {
            // se não tiver preenchido não mudará nada
    
        } else{
    
            $newDescription = $_POST["changedescription"];
            $updateDescription = "UPDATE services SET description = '$newDescription' WHERE servicesID = '$serviceID'";
            $changeService = mysqli_query($conection, $updateDescription);
    
        }
    
    
        if($_FILES['changeimage']['name'] && (!empty($_FILES['changeimage']['name']))) {
            $newserviceImg = $_FILES['changeimage'];
            unlink($path);


            if (isset($newserviceImg['name'])){
                $new_name = uniqid() . "."; // Novo nome aleatório do arquivo
                $extension = strtolower(pathinfo($newserviceImg["name"], PATHINFO_EXTENSION)); // Pega extensão de arquivo e converte em caracteres minúsculos.      
                $tempPast = $newserviceImg["tmp_name"];
                $imagem = $new_name . $extension;
                $past = "_img-service/";
                $newimg_path = $past . $imagem;
                $move = move_uploaded_file($tempPast, $newimg_path);
                
                $updateimgservice = "UPDATE services SET imgPath = '$newimg_path' WHERE servicesID = '$serviceID' ";
            
                $changed = mysqli_query($conection, $updateimgservice);
            } else {
                $imgerror = "houve um erro aqui";
            }
            
            
            
            
        }

        if($changeService){
            return true;
        } else {
            return false;
        }
    }

    function delservice($conection){
        $serviceID = $_GET["del"];
        $sql_path = "SELECT * FROM services WHERE servicesID = $serviceID";
        $sql_path_query = mysqli_query($conection, $sql_path);
        $service = mysqli_fetch_assoc($sql_path_query);
        unlink($service["imgPath"]);
        $sql_delete = "DELETE FROM services WHERE servicesID = '$serviceID' ";
        $deleted = mysqli_query($conection, $sql_delete);
        if($deleted){

            header('location: adminpanel.php?services=2');
        }

    }