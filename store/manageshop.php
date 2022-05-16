<?php

if( isset ($_SESSION["cart"]) ) {
    



    // pega o id do GET e inicia a sessão no shopstore

    echo "<div class='container-manage-shop'>";
    echo "Carrinho iniciado: <br>";

    echo "Identificação do carrinho: " . $_SESSION["cart"]["storeID"] . " | Operador: " . $_SESSION["cart"]["operatorID"] . " |  Cliente CPF: " . $_SESSION["cart"]["cpfClient"] . "<br>";


    // div class container-new-shop
    echo "</div><br><br>";

    echo "<div class='container-storeshop'>";



    ?>


    <!-- formulário para pesquisar o produto ou serviço -->
    <div class="search-itens">
        <form action="store.php?shop"  method="post">

            <h4>Pesquisar Produto ou Serviço</h4>
            <label for="typeitem">Categoria do item: </label><br>
            <label for="typeitem"> serviço</label>
            <input type="radio" name="typeitem" <?php if ( $_POST["typeitem"] == "service" ) { echo "checked"; }; ?> class="inputshopsearch" value="service"><br>
            <label for="typeitem">Produto</label>
            <input type="radio" name="typeitem" <?php if ( $_POST["typeitem"] == "product" ) { echo "checked"; }; ?> class="inputshopsearch" value="product"><br>
            <label for="searchitem">Nome do item:</label>
            <input type="text" name="searchitem" id="searchitem" placeholder="item a ser adicionado" <?php if ( isset ( $_POST["searchitem"] ) ) { echo "value = ". $_POST['searchitem']; }; ?> >
            <button type="submit">pesquisar</button>

        </form>
    </div> <!-- "search-itens -->
    <!-- fim do formulário -->
    <!-- inicio lista da pesquisa do formulário -->
    <?php
    if (isset($_POST["typeitem"])) {
        $service_add["itemType"] = $_POST['typeitem'];
        $service_add["storeID"] = $_SESSION['cart']['storeID'];
        ?>

        <table class="shop-table">
            <thead>
                <tr>
                    <th width="30">ID</th>
                    <th width="200">Serviço a ser adicionado</th>
                    <th width="30">Preço</th>
                </tr>
            </thead>
            <tbody>

            <?php
            if ($_POST["typeitem"] == "service") {
                $searchQuery = searchService($_POST["searchitem"], $conecta);
                while($service_list = mysqli_fetch_array($searchQuery)) {
                    ?>
                    <tr>
                        <center>
                            <td><?php echo $service_list['servicesID']; ?></td>
                        </center>
    
                        <td><?php echo $service_list['name']; ?></td>
                        <td><?php echo "R$" . $service_list['price']; ?></td>
                    </tr>
                    <?php
                } // while($service_list = mysqli_fetch_array($searchQuery)) {

            } elseif ($_POST["typeitem"] == "product") {
                $searchQuery = searchProduct($_POST["searchitem"], $conecta);
                while($service_list = mysqli_fetch_array($searchQuery)) {
                    ?>
                    <tr>
                        <center>
                            <td><?php echo $service_list['productID']; ?></td>
                        </center>
    
                        <td><?php echo $service_list['name']; ?></td>
                        <td><?php echo "R$" . $service_list['pricetosell']; ?></td>
                    </tr>
                    <?php
                } // while($service_list = mysqli_fetch_array($searchQuery)) {
            }
                        
            ?>
            
            </tbody>

        </table><br><br>

        <?php
            
    } // if (isset($_POST["typeitem"])) {


        
    

        ?>
        <div class="form-insert-cart">
            <h3>Insira o item no carrinho: </h3>
            <form action="store.php?shop" method="post">
                <label for="inputtypeitem">Serviço:</label>
                <input type="radio" name="inputtypeitem" class="inputrcart" value="service"><br>
                <label for="inputtypeitem">Produto:</label>
                <input type="radio" name="inputtypeitem" class="inputrcart"value="product"><br>
                <label for="inputiditem">ID do item: </label>
                <input type="number" name="inputiditem" class="inputcart" placeholder="00" required><br>
                <label for="inputqtditem">Quantidade do item: </label>
                <input type="number" size="20" name="inputqtditem" class="inputcart" Value="1" required><br>
                <button type="submit">Enviar</button>

            </form>
        </div> <!-- form-insert-cart -->
         <?php
        // inserção de dados no carrinho
        if ( isset ( $_POST["inputtypeitem"] ) ) {
            if( $_POST["inputtypeitem"] == "service" ) {
                $item = selectservicebyid($_POST["inputiditem"],$conecta);
                $carrinho = [
                    "shopType" => $_POST["inputtypeitem"],
                    "storeID" => $_SESSION["cart"]["storeID"],
                    "itemID" => $item["servicesID"],
                    "itemName" => $item["name"],
                    "shopQtd" => $_POST["inputqtditem"],
                    "shopPrice" => $item["price"],
                ];
                $item_insert = addShop($carrinho,$conecta);
            // EDITAR O CODIGO ABAIXO
            } elseif( $_POST["inputtypeitem"] == "product" ) {
                $item = selectProduct($_POST["inputiditem"],$conecta);
                $carrinho = [
                    "shopType" => $_POST["inputtypeitem"],
                    "storeID" => $_SESSION["cart"]["storeID"],
                    "itemID" => $item["productID"],
                    "itemName" => $item["name"],
                    "shopQtd" => $_POST["inputqtditem"],
                    "shopPrice" => $item["pricetosell"],
                ];
                $item_insert = addShop($carrinho,$conecta);
            }
        } // if ( isset ( $_POST["inputtypeitem"] ) ) {
        
        listCart($_SESSION["cart"]["storeID"],$conecta);
        


    // div container-storeshop
    echo "</div>";

} // if( isset ($_SESSION["cart"]) ) {


?>