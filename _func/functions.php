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
        } elseif($_SESSION["privileges"] <= 5 && $_SESSION["privileges"] >=3){
            ?>
                <nav class="bord-menu-principal">

                <?php echo "Olá " . $_SESSION['user_name'] . " | <a href='logout.php'>Sair.</a> <br>";?>
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

    function delUser($conection){
        $userID = $_GET["deleted"];
        $sql_delete = "DELETE FROM users WHERE userID = '$userID' ";
        $deleted = mysqli_query($conection, $sql_delete);
        if($deleted){

            header('location: adminpanel.php?users=1');
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


    // selecionando serviço pelo ID

    function selectservicebyid($serviceid, $conection){
        $sql = "SELECT * FROM services WHERE servicesID = '$serviceid' ";
                            
        $sql_query = mysqli_query($conection,$sql);
        $service = mysqli_fetch_assoc($sql_query);
        return $service;

    }
    

    // SELECIONANDO serviço

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
    
            $newDescription = limpaaspas($_POST["changedescription"]);
            $updateDescription = "UPDATE services SET description = '$newDescription' WHERE servicesID = '$serviceID'";
            $changeService = mysqli_query($conection, $updateDescription);
    
        }
    
        if(isset($_FILES['changeimage']['name']) && !empty($_FILES['changeimage']['name'])) {

            $newserviceImg = $_FILES['changeimage'];
            
            if ($path != "_imgs/noimg.png") {
                unlink($path);
            }

            
            if (isset($newserviceImg['name'])){
                
                $new_name = uniqid() . "."; // Novo nome aleatório do arquivo
                $extension = strtolower(pathinfo($newserviceImg["name"], PATHINFO_EXTENSION)); // Pega extensão de arquivo e converte em caracteres minúsculos.      
                $tempPast = $newserviceImg["tmp_name"];
                $imagem = $new_name . $extension;
                $past   = "_img-service/";
                $img_path = $past . $imagem;
                move_uploaded_file($tempPast, $img_path);

                
                $updateimgservice = "UPDATE services SET imgPath = '$img_path' WHERE servicesID = '$serviceID' ";
            
                $changed = mysqli_query($conection, $updateimgservice);

                
            } else {
                $imgerror = "houve um erro aqui";
            }
                        
        }

        // verificação para mensagem de erro ou sucesso
        if($changeService){
            return true;
        } else {
            return false;
        }
    }

    // buscar serviços
    function searchService($conection) {
        $search_input = $_POST["searchservice"];
        $sql_service_search = "SELECT * FROM services WHERE servicesID LIKE '%{$search_input}%' OR name LIKE '%{$search_input}%' OR description LIKE '%{$search_input}%' OR price LIKE '%{$search_input}%' ";
        $sql_query = mysqli_query($conection, $sql_service_search);

        return $sql_query;
    }

    // deletar serviços
    function delservice($conection){
        $serviceID = $_GET["del"];
        $sql_path = "SELECT * FROM services WHERE servicesID = $serviceID";
        $sql_path_query = mysqli_query($conection, $sql_path);
        $service = mysqli_fetch_assoc($sql_path_query);
        if ($service["imgPath"] != "_imgs/noimg.png"){
            unlink($service["imgPath"]);
        }
        $sql_delete = "DELETE FROM services WHERE servicesID = '$serviceID' ";
        $deleted = mysqli_query($conection, $sql_delete);
        if($deleted){

            header('location: adminpanel.php?services=2');
        }

    }


    // cadastrar produtos

    function registerProduct($conection){
        if(!empty($_POST["newproductname"]) && !empty($_POST["newproductpricetosell"]) && !empty($_POST["newproductpricetobuy"]) && !empty($_POST["newproductdescription"]) && !empty($_POST["newproductstock"])) {
            $name        = limpaaspas($_POST["newproductname"]);
            $prices      = $_POST["newproductpricetosell"];
            $priceb      = $_POST["newproductpricetobuy"];
            $description = limpaaspas($_POST["newproductdescription"]);
            $stock       = $_POST["newproductstock"];
            $imginput     = $_FILES["newproductimg"];
            if (empty($imginput['name'])){

                $img_path = "_imgs/noimg.png";

            } else{
                $new_name = uniqid() . "."; // Novo nome aleatório do arquivo
                $extension = strtolower(pathinfo($imginput["name"], PATHINFO_EXTENSION)); // Pega extensão de arquivo e converte em caracteres minúsculos.      
                $tempPast = $imginput["tmp_name"];
                $imagem = $new_name . $extension;
                $past   = "_img-product/";
                $img_path = $past . $imagem;
                move_uploaded_file($tempPast, $img_path);
            }

            $sql = "INSERT INTO products(name,pricetosell,pricetobuy,imgPath,description,stock) VALUES('{$name}','{$prices}','{$priceb}','{$img_path}','{$description}','{$stock}')";
            
            $insert_query = mysqli_query($conection, $sql);
            if(!$insert_query){
                return false;
            } else{
                return true;
            }
        } else {
            return false;
        }
    }

    
    function listproducts($conection){

        $sql   = "SELECT * FROM products";
        $products_query = mysqli_query($conection, $sql);
        return $products_query;
        
    }

    function selectProduct($conection) {
        $productID = $_GET['editproduct'];
        $sql = "SELECT * FROM products WHERE productID = '$productID' ";
        $sql_query = mysqli_query($conection, $sql);
        $product = mysqli_fetch_assoc($sql_query);
        return $product;

    }

    // deletar produto
    function delProduct($conection){
        $productID = $_GET["del"];
        $sql_path = "SELECT * FROM products WHERE productID = $productID";
        $sql_path_query = mysqli_query($conection, $sql_path);
        $product = mysqli_fetch_assoc($sql_path_query);
        if ($product["imgPath"] != "_imgs/noimg.png"){
            unlink($product["imgPath"]);
        }
        $sql_delete = "DELETE FROM products WHERE productID = '$productID' ";
        $deleted = mysqli_query($conection, $sql_delete);
        if($deleted){

            header('location: admin-products.php?allproducts');
        }

    }

    // galeria de fotos

    // registro de foto

    function registerPhoto($conection){
        if(!empty($_POST["newphotoname"]) && !empty($_POST["newphotodescription"])) {
            $name        = limpaaspas($_POST["newphotoname"]);
            $description = limpaaspas($_POST["newphotodescription"]);
            $imginput     = $_FILES["newphoto"];
            if (empty($imginput['name'])){

                $img_path = "_imgs/noimg.png";

            } else{
                $new_name = uniqid() . "."; // Novo nome aleatório do arquivo
                $extension = strtolower(pathinfo($imginput["name"], PATHINFO_EXTENSION)); // Pega extensão de arquivo e converte em caracteres minúsculos.      
                $tempPast = $imginput["tmp_name"];
                $imagem = $new_name . $extension;
                $past   = "_img-gallery/";
                $img_path = $past . $imagem;
                move_uploaded_file($tempPast, $img_path);
            }

            $sql = "INSERT INTO gallery(name,description,photoPath) VALUES('{$name}','{$description}','{$img_path}')";
            
            $insert_query = mysqli_query($conection, $sql);
            if(!$insert_query){
                return false;
            } else{
                return true;
            }
        } else {
            return false;
        }
    }

    // listar fotos
        
    function listgallery($conection){
        
        $sql   = "SELECT * FROM gallery";
        $gallery_query = mysqli_query($conection, $sql);
        return $gallery_query;

    }

    function changeProduct($productID,$path,$conection){

        if(empty($_POST['changename'])) {
            // se não tiver preenchido não mudará nada
            

        } else{
    
            $newName = limpaaspas($_POST["changename"]);
            $updateName = "UPDATE products SET name = '$newName' WHERE productID = '$productID'";
            $changeProduct = mysqli_query($conection, $updateName);
            
        }
    
        if(empty($_POST['changedescription'])) {
            // se não tiver preenchido não mudará nada
    
        } else{
    
            $newDescription = limpaaspas($_POST["changedescription"]);
            $updateDescription = "UPDATE products SET description = '$newDescription' WHERE productID = '$productID'";
            $changeProduct = mysqli_query($conection, $updateDescription);
    
        }

        if(empty($_POST['changeprices'])) {
            // se não tiver preenchido não mudará nada
    
        } else{
    
            $newPriceS = limpaaspas($_POST["changeprices"]);
            $updatePriceS = "UPDATE products SET pricetosell = '$newPriceS' WHERE productID = '$productID'";
            $changeProduct = mysqli_query($conection, $updatePriceS);
    
        }

        if(empty($_POST['changepriceb'])) {
            // se não tiver preenchido não mudará nada
    
        } else{
    
            $newPriceB = $_POST["changepriceb"];
            $updatePriceB = "UPDATE products SET pricetobuy = '$newPriceB' WHERE productID = '$productID'";
            $changeProduct = mysqli_query($conection, $updatePriceB);
    
        }

        if(empty($_POST['changestock'])) {
            // se não tiver preenchido não mudará nada
    
        } else{
    
            $newStock = $_POST["changestock"];
            $updatestock = "UPDATE products SET stock = '$newStock' WHERE productID = '$productID'";
            $changeProduct = mysqli_query($conection, $updatestock);
    
        }
    
        if(isset($_FILES['changeimage']['name']) && !empty($_FILES['changeimage']['name'])) {

            $newproductImg = $_FILES['changeimage'];
            
            if ($path != "_imgs/noimg.png") {
                unlink($path);
            }

            
            if (isset($newproductImg['name'])){
                
                $new_name = uniqid() . "."; // Novo nome aleatório do arquivo
                $extension = strtolower(pathinfo($newproductImg["name"], PATHINFO_EXTENSION)); // Pega extensão de arquivo e converte em caracteres minúsculos.      
                $tempPast = $newproductImg["tmp_name"];
                $imagem = $new_name . $extension;
                $past   = "_img-product/";
                $img_path = $past . $imagem;
                move_uploaded_file($tempPast, $img_path);

                
                $updateimgproduct = "UPDATE products SET imgPath = '$img_path' WHERE productID = '$productID' ";
            
                $changed = mysqli_query($conection, $updateimgproduct);

                
            } else {
                $imgerror = "houve um erro aqui";
            }
                        
        }

        // verificação para mensagem de erro ou sucesso
        if($changeProduct){
            return true;
        } else {
            return false;
        }
    }

    // busca de produtos
    function searchProduct($conection){
        $search_input = $_POST["searchproduct"];
        $sql_user_search = "SELECT * FROM products WHERE productID LIKE '%{$search_input}%' OR name LIKE '%{$search_input}%' OR pricetosell LIKE '%{$search_input}%' OR pricetobuy LIKE '%{$search_input}%' OR description LIKE '%{$search_input}%' ";
        $lista = mysqli_query($conection, $sql_user_search);
        return $lista;

    }

    // deletar Fotos

    function delPhoto($conection){
        $galleryID = $_GET["del"];
        $sql_path = "SELECT * FROM gallery WHERE galleryID = $galleryID";
        $sql_path_query = mysqli_query($conection, $sql_path);
        $photo = mysqli_fetch_assoc($sql_path_query);
        if ($photo["photoPath"] != "_imgs/noimg.png"){
            unlink($photo["photoPath"]);
        }
        $sql_delete = "DELETE FROM gallery WHERE galleryID = '$galleryID' ";
        $deleted = mysqli_query($conection, $sql_delete);
        if($deleted){

            header('location: admin-gallery.php?listgallery');
        }

    }

    function searchPhoto($conection){
        $search_input = $_POST["searchphoto"];
        $sql_user_search = "SELECT * FROM gallery WHERE galleryID LIKE '%{$search_input}%' OR name LIKE '%{$search_input}%' OR description LIKE '%{$search_input}%' ";
        $lista = mysqli_query($conection, $sql_user_search);
        return $lista;

    }

    function selectPhoto($conection) {
        $galleryID = $_GET['editphoto'];
        $sql = "SELECT * FROM gallery WHERE galleryID = '$galleryID' ";
        $sql_query = mysqli_query($conection, $sql);
        $photo = mysqli_fetch_assoc($sql_query);
        return $photo;

    }

    // modificar foto da galeria
    function changePhoto($galleryID,$path,$conection){

        if(empty($_POST['changename'])) {
            // se não tiver preenchido não mudará nada
            

        } else{
    
            $newName = limpaaspas($_POST["changename"]);
            $updateName = "UPDATE gallery SET name = '$newName' WHERE galleryID = '$galleryID'";
            $changePhoto = mysqli_query($conection, $updateName);
            
        }
    
        if(empty($_POST['changedescription'])) {
            // se não tiver preenchido não mudará nada
    
        } else{
    
            $newDescription = limpaaspas($_POST["changedescription"]);
            $updateDescription = "UPDATE gallery SET description = '$newDescription' WHERE galleryID = '$galleryID'";
            $changePhoto = mysqli_query($conection, $updateDescription);
    
        }
    
        if(isset($_FILES['changeimage']['name']) && !empty($_FILES['changeimage']['name'])) {

            $newphotoImg = $_FILES['changeimage'];
            
            if ($path != "_imgs/noimg.png") {
                unlink($path);
            }

            
            if (isset($newphotoImg['name'])){
                
                $new_name = uniqid() . "."; // Novo nome aleatório do arquivo
                $extension = strtolower(pathinfo($newphotoImg["name"], PATHINFO_EXTENSION)); // Pega extensão de arquivo e converte em caracteres minúsculos.      
                $tempPast = $newphotoImg["tmp_name"];
                $imagem = $new_name . $extension;
                $past   = "_img-gallery/";
                $img_path = $past . $imagem;
                move_uploaded_file($tempPast, $img_path);

                
                $updateimgphoto = "UPDATE gallery SET photoPath = '$img_path' WHERE galleryID = '$galleryID' ";
            
                $changed = mysqli_query($conection, $updateimgphoto);

                
            } else {
                $imgerror = "houve um erro aqui";
            }
                        
        }

        // verificação para mensagem de erro ou sucesso
        if($changePhoto){
            return true;
        } else {
            return false;
        }
    }