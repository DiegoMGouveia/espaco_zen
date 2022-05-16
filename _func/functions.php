<?php

    // checa se o usuário está logado e se é administrador
    function adminCheck() {

        if(isset($_SESSION['user_logged']) && $_SESSION['privileges'] == 1 && isset($_SESSION["user_name"]) || isset($_SESSION['user_logged']) && $_SESSION['privileges'] == 2 && isset( $_SESSION["user_name"] )) {

            // se for um administrador abrirá a página normalmente
            
        } else {
            // se não estiver, será redirecionado ao index.php
            header("location: login.php");
        }
    }

    // checa se o usuário está logado
    function userCheck() {

        if(isset($_SESSION['user_logged']) && isset($_SESSION["privileges"]) && isset($_SESSION["user_name"])) {

            // se estiver logado, a página abrirá normalmente
            
        } else {
            // se não estiver, será redirecionado ao login.php
            header("location: login.php");
        }
    }

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

    function userNameSet(){
        $userid = $_SESSION["user_name"];
        return $userid;
    }

    function privilegeset(){
        $privilege = $_SESSION["privileges"];
        return $privilege;
    }

    function privilegename($privilege, $conection) {
        $sql = "SELECT * FROM privgroup WHERE privID = '$privilege' ";
        $sqlQuery = mysqli_query($conection, $sql);
        $privilege_name = mysqli_fetch_assoc($sqlQuery);
        return $privilege_name["privname"];

    }

    function menuprincipal(){
        if($_SESSION["privileges"] == 1){
        ?>
            <nav class="bord-menu-principal">

            <?php echo "Olá " . $_SESSION['user_name'] . " | <a href='logout.php'>Sair.</a> <br>";?>
                <ul>
                    <a href="index.php"><li>Inicio</li></a>
                    <a href="adminpanel.php"><li>Administração</li></a>
                    <a href="userpanel.php"><li>Perfil</li></a>
                    <a href="services.php"><li>Serviços</li></a>
                    <a href="gallery.php"><li>Galeria</li></a>
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
                        <center><a href="index.php"><li>Inicio</li></a>
                        <a href="userpanel.php"><li>Perfil</li></a>
                        <a href="services.php"><li>Serviços</li></a>
                        <a href="gallery.php"><li>Galeria</li></a>
                        <a href="#"><li>Agenda</li></a>
                        <a href="contato.php"><li>Contato</li></a></center>
                    </ul>
                </nav>
            <?php
            } elseif(!$_SESSION["privileges"]){
                ?>
                    <nav class="bord-menu-principal">
                        <ul>
                            <a href="index.php"><li>Inicio</li></a>
                            <a href="login.php"><li>Login</li></a>
                            <a href="register.php"><li>Cadastrar</li></a>
                            <a href="services.php"><li>Serviços</li></a>
                            <a href="gallery.php"><li>Galeria</li></a>
                            <a href="#"><li>Agenda</a></li>
                            <a href="contato.php"><li>Contato</li></a>
                        </ul>
                    </nav>
                <?php
                }
    }

    
    function registro($conection, $user, $pwd, $name, $cell, $mail=null){
        $pass = MD5($pwd);
        $sql = "INSERT INTO users(username,password,name,email,cellphone) VALUES('{$user}','{$pass}','{$name}','{$mail}','{$cell}')";
        $insert_query = mysqli_query($conection, $sql);
        if ($conection->errno == 1062) {
            return 1062;
        }
        if ( !$insert_query && $conection->errno != 1062) {
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

    function selectUser($conection){
        if (isset($_SESSION['user_logged']) && isset($_SESSION["privileges"]) && isset($_SESSION["user_name"])){
            $user = $_SESSION['user_logged'];
            $sql = "SELECT * FROM users WHERE userID = '$user' ";
            $sqlQuery = mysqli_query($conection,$sql);
            $selected_user = mysqli_fetch_assoc($sqlQuery);
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

            header('location: admin-users.php?allusers');
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

    function selectservices($conection) {
        $sql = "SELECT * FROM services";
        $sql_query = mysqli_query($conection, $sql);
        return $sql_query;

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
    function searchService($search_input, $conection) {
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

            header('location: admin-services.php?allservices');
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

    function selectProduct($productID, $conection) {
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
    function searchProduct($search_input, $conection){
        $sql_user_search = "SELECT * FROM products WHERE productID LIKE '%{$search_input}%' OR name LIKE '%{$search_input}%' OR pricetosell LIKE '%{$search_input}%' OR pricetobuy LIKE '%{$search_input}%' OR description LIKE '%{$search_input}%' ";
        $lista = mysqli_query($conection, $sql_user_search);
        return $lista;

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

    // buscar foto da galeria
    function searchPhoto($conection){
        $search_input = $_POST["searchphoto"];
        $sql_user_search = "SELECT * FROM gallery WHERE galleryID LIKE '%{$search_input}%' OR name LIKE '%{$search_input}%' OR description LIKE '%{$search_input}%' ";
        $lista = mysqli_query($conection, $sql_user_search);
        return $lista;

    }

    // selecionar foto da galeria
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

    // store

    function newShopCart($cpf, $conection) {
        $user = useridset();
        $dateTime = date('Y-m-d H:i:s');
        $newSql = "INSERT INTO store(operatorID,openTime,cpfClient) VALUES('$user','$dateTime','$cpf')";

        if(mysqli_query($conection,$newSql)) {
            $sql = "SELECT * FROM store WHERE opentime = '$dateTime' ";
            $sqlQuery = mysqli_query($conection,$sql);
            $sqlQueryAssoc = mysqli_fetch_assoc($sqlQuery);
            return [$sqlQueryAssoc["storeID"],$dateTime];

        }
    }

    function openCart($storeID, $conection) {
        $sql = "SELECT * FROM store WHERE storeID = '$storeID' ";
        $sqlQuery = mysqli_query($conection, $sql);
        $shop = mysqli_fetch_assoc($sqlQuery);
        return $shop;
    }

    function destroyCart($storeID, $conection) {
        $sql = "DELETE FROM shop_cart WHERE storeID = '$storeID' ";
        $sqlQuery = mysqli_query($conection, $sql);
        $sql2 = "DELETE FROM store WHERE storeID = '$storeID' ";
        $sqlQuery2 = mysqli_query($conection, $sql2);
        if ($sqlQuery == true && $sqlQuery2 ==true){

            header("location: store.php?liststore");
        }
        

    }

    function closeShopCart($shopID, $conection, $coupon) {

        $dateTime = date('Y-m-d H:i:s');
        $sql = "UPDATE store SET closeTime = '$dateTime' WHERE storeID = '$shopID' ";
        $sqlQuery_time = mysqli_query($conection, $sql);

        if ( !empty ( $coupon ) ) {
            $sql_coupon = "UPDATE store SET coupon = '$coupon' WHERE storeID = '$shopID' ";
            $sqlQuery_coupon = mysqli_query($conection, $sql_coupon);
            return [$sqlQuery_time, $sqlQuery_coupon];
        }

        return [$sqlQuery_time];
        
    }

    function searchSales($search, $conection) {
        $sql = "SELECT * FROM shop_cart WHERE shopID LIKE '%{$search_input}%' OR shopType LIKE '%{$search_input}%' OR storeID LIKE '%{$search_input}%' OR itemID LIKE '%{$search_input}%' OR itemName LIKE '%{$search_input}%' OR time_sale LIKE '%{$search_input}%' ";
        $sqlQuery = mysqli_query($conection, $sql);
        return $sqlQuery;
    }


    function validateCPF($number) {

        $cpf = preg_replace('/[^0-9]/', "", $number);

        if (strlen($cpf) != 11 || preg_match('/([0-9])\1{10}/', $cpf)) {
            return false;
        }

        $number_quantity_to_loop = [9, 10];

        foreach ($number_quantity_to_loop as $item) {

            $sum = 0;
            $number_to_multiplicate = $item + 1;
        
            for ($index = 0; $index < $item; $index++) {

                $sum += $cpf[$index] * ($number_to_multiplicate--);
        
            }

            $result = (($sum * 10) % 11);

            if ($cpf[$item] != $result) {
                return false;
            }

        }

        return true;

    }

    function selectShopById($shopID, $conection){
        $sql = "SELECT * FROM store WHERE storeID = $shopID";
        $shopQuery = mysqli_query($conection,$sql);
        $shopSelected = mysqli_fetch_assoc($shopQuery);
        if (empty($shopSelected)){
            return false;
        } else {
            return $shopSelected;
        }
    }

    function selectNameOperator($operatorID, $conection){
        $sql = "SELECT * FROM users WHERE userID = '$operatorID'";
        $sqlQuery = mysqli_query($conection, $sql);
        $operatorName = mysqli_fetch_assoc($sqlQuery);
        return $operatorName["name"];
    }



    // insere os dados($item) no carrinho
    function addShop($item, $conection) {
        $type = $item["shopType"];
        $storeId = $item["storeID"];
        $itemId = $item["itemID"];
        $itemName = $item["itemName"];
        $qtd = $item["shopQtd"];
        $price = $qtd * $item["shopPrice"];
        $dateTime = date('Y-m-d H:i:s');

        $sql = "INSERT INTO shop_cart(shopType,storeID,itemID,itemName,shopQtd,shopPrice,time_sale) VALUES('$type','$storeId','$itemId','$itemName', '$qtd', '$price', '$dateTime') ";
        $addQuery = mysqli_query($conection,$sql);
        if (isset( $addQuery ) ) {
            return true;
        } else {
            return false;
        }
    }

    // seleciona um carrinho ($shopID)
    function selectShopCart($shopID,$conection){
        $sql = "SELECT * FROM shop_cart WHERE storeID = '$shopID'";
        $sqlQuery = mysqli_query($conection,$sql);
        return $sqlQuery;

        
    }

    //lista os produtos de um carrinho ($storeID)
    function listCart($storeID, $conection){

        ?>


        <table class="shop-table">
            <thead>
                <tr>
                    <th width="50">ID</th>
                    <th width="50">Tipo</th>
                    <th width="700">Item</th>
                    <th width="80">Quantidade</th>
                    <th width="30">Preço</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $shop_cart = selectShopCart($storeID,$conection);
            while($produto_list = mysqli_fetch_array($shop_cart)) {


            ?>
                <tr>
                    <td><?php echo $produto_list["itemID"] ?></td>
                    <td><?php echo $produto_list["shopType"] ?></td>
                    <td><?php echo $produto_list["itemName"] ?></td>
                    <td><?php echo $produto_list["shopQtd"] ?></td>
                    <td><?php echo "R$" . $produto_list["shopPrice"] ?></td>
                </tr>
                <?php
                $total += $produto_list["shopPrice"];
                insertTotalCart($total, $produto_list["storeID"],$conection);

            
            } // while($produto_list = mysqli_fetch_array(selectShopCart($shop_cart,$conection))) {
            ?>
            </tbody>
            </table>

            <div class='container-total'>

                <p>Total: <?php echo "R$" . $total ?></p>



            </div> <!-- CLASS container-total -->

        <center>
            <form action="store.php?quitshop"  method="post">
                <label for="coupon">Cupom de Desconto:</label>
                <input type="text" name="coupon" id="coupon" placeholder="X3D5-XD12">
                <a href="store.php?quitshop"><button>Fechar Carrinho</button></a>
            </form>
        </center>

            <?php

            echo "<br>";

    } // function listCart($storeID, $conection){

    function listShops($conection) {
        $sql = "SELECT * FROM store";
        $sqlQuery = mysqli_query($conection, $sql);
        return $sqlQuery;
    }

    function insertTotalCart($total, $storeID, $conection) {
            $sql = "UPDATE store SET totalPrice = '$total' WHERE storeID = '$storeID' ";
            $newTotal = mysqli_query($conection, $sql);
            
    }

    function totalPriceStore($storeID, $conection) {

        $shop_cart = selectShopCart($storeID,$conection);
        $cart = mysqli_fetch_assoc($shop_cart);

        return $cart["totalPrice"];

    }
