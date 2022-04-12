<?php
    function menuprincipal(){
        if($_SESSION["privileges"] == 1){
        ?>
            <nav class="bord-menu-principal">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="adminpanel.php">Administração</a></li>
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Serviços</a></li>
                    <li><a href="#">Galeria</a></li>
                    <li><a href="#">Agenda</a></li>
                    <li><a href="contato.php">Contato</a></li>
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
        $sql = "INSERT INTO users(username,password,name,email,cellphone) VALUES('$user','$pass','$name','$mail','$cell')";
        $insert_query = mysqli_query($conection, $sql);
        if ( !$insert_query ) {
            die("falha na consulta ao banco, entre em contato conosco informando a falha com data e hora. Obrigado!");
        } else {
            return $insert_query;
        }
    }
 
    function login($usermail, $pwd, $conection) {
        $pass = MD5($pwd);
        $sqlogin = "SELECT * FROM users WHERE username = '$usermail' AND password = '$pass' OR email = '$usermail' AND password = '$pass' OR cellphone = '$usermail' AND password = '$pass' ";
        $login_query = mysqli_query($conection,$sqlogin);
        if (!$login_query){
            die("falha na consulta ao banco de dados, entre em contato conosco informando a falha com data e hora. Obrigado!");
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

    function selectuserbyid($user, $conection){
        if ($_SESSION["privileges"] <=2){
            $sql = "SELECT * FROM users WHERE userID = '$user' ";
            $login_query = mysqli_query($conection,$sql);
            $selected_user = mysqli_fetch_assoc($login_query);
            return $selected_user;
        }
    }