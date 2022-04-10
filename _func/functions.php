<?php
    function menuprincipal(){
        ?>
            <nav class="bord-menu-principal">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="#">Cadastrar</a></li>
                    <li><a href="#">Serviços</a></li>
                    <li><a href="#">Galeria</a></li>
                    <li><a href="#">Agenda</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </nav>
        <?php
    }

    
    function registro($conection, $user, $pass, $name, $cell, $mail=null){
        $sql = "INSERT INTO users(username,password,name,email,cellphone) VALUES('$user','$pass','$name','$mail','$cell')";
        $insert_query = mysqli_query($conection, $sql);
        if ( !$insert_query ) {
            die("falha na consulta ao banco, entre em contato conosco informando a falha com data e hora. Obrigado!");
        } else {
            return $insert_query;
        }
    }