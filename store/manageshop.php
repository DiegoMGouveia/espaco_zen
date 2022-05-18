<?php

if( isset ($_SESSION["cart"]) ) {

    if (isset($_POST["inputIdDel"])){
        $deleted = delItemCart($_POST["inputIdDel"], $conecta);

    }
    



    // pega o id do GET e inicia a sessão no shopstore


    echo "<div class='container-storeshop'>";

    ?>

    <!-- formulário para pesquisar o produto ou serviço -->
    <div class="search-itens">
        <form action="store.php?shop"  method="post">

            <p><strong>Pesquisar item</strong></p>
            <label for="searchitem">Nome do item:</label>
            <input type="text" name="searchitem" id="searchitem" placeholder="item a ser adicionado" <?php if ( isset ( $_POST["searchitem"] ) ) { echo "value = ". $_POST['searchitem']; }; ?> >
            <button type="submit">pesquisar</button><br>
            <label for="typeitem">Categoria do item: </label>
            <div class="container-type-item">
                <label for="typeitem"> serviço</label>
                <input type="radio" name="typeitem" <?php if ( $_POST["typeitem"] == "service" ) { echo "checked"; }; ?> class="inputshopsearch" value="service">
                <label for="typeitem">| Produto</label>
                <input type="radio" name="typeitem" <?php if ( $_POST["typeitem"] == "product" ) { echo "checked"; }; ?> class="inputshopsearch" value="product">
            </div> <br> <!-- "container-type-item" -->
        </form>
    <!-- fim do formulário -->
    <!-- inicio lista da pesquisa do formulário -->
    <?php
    if (isset($_POST["typeitem"])) {
        $service_add["itemType"] = $_POST['typeitem'];
        $service_add["storeID"] = $_SESSION['cart']['storeID'];
        ?>
        <div class="table-search-container">
            <table class="shop-table">
                <thead>
                    <tr>
                        <th width="30">ID</th>
                        <th width="200"><?php  if ($_POST["typeitem"] == "service") { echo "Serviço"; } elseif ( $_POST["typeitem"] == "product") { echo " Produto";}?> a ser adicionado</th>
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
        </div> <!-- table-search-container -->
    
        <?php
            
    } // if (isset($_POST["typeitem"])) {
    ?>
    </div> <!-- "search-itens --> <br>

    <div class="form-insert-cart">
        <h3>Insira o item no carrinho: </h3>
        <form action="store.php?shop" method="post" class="form-insert-item">
            <label for="inputtypeitem">Serviço:</label>
            <input type="radio" name="inputtypeitem" class="inputrcart" value="service">
            <label for="inputtypeitem">Produto:</label>
            <input type="radio" name="inputtypeitem" class="inputrcart"value="product">
            <label for="inputiditem">ID do item: </label>
            <input type="number" name="inputiditem" class="inputcart" placeholder="00" required>
            <label for="inputqtditem">Quantidade do item: </label>
            <input type="number" size="20" name="inputqtditem" class="inputcart" Value="1" required>
            <button type="submit">Enviar</button>

        </form>

        <?php
        if (haveCoupon($_SESSION["cart"]["storeID"], $conection) == "Nenhum."){
            ?>
            <form action="store.php?shop" method="post">

                <label for="coupon">Cupom de Desconto:</label>
                <input type="text" name="coupon" id="coupon" placeholder="X3D5-XD12" minlength="9" maxlength="9">
                <button type="submit">Inserir Cupom</button>
            </form>

        <?php
        }
        // inserção de dados no carrinho
        if ( isset ( $_POST["inputtypeitem"] ) ) {
            if( $_POST["inputtypeitem"] == "service" ) {
                $item = selectservicebyid($_POST["inputiditem"],$conecta);
                if ($item == false) {
                    
                } else {

                    $carrinho = [
                        "shopType" => $_POST["inputtypeitem"],
                        "storeID" => $_SESSION["cart"]["storeID"],
                        "itemID" => $item["servicesID"],
                        "itemName" => $item["name"],
                        "shopQtd" => $_POST["inputqtditem"],
                        "shopPrice" => $item["price"],
                    ];
                    $item_insert = addShop($carrinho,$conecta);

                }
                
            
            } elseif( $_POST["inputtypeitem"] == "product" ) {
                $item = selectProduct($_POST["inputiditem"],$conecta);
                if ($item == false) {
                    
                } else {

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
            }
        } // if ( isset ( $_POST["inputtypeitem"] ) ) {
        ?>
        <div class="list-shop-container">
        <?php
        listCart($_SESSION["cart"]["storeID"],$conecta);
        ?>
        </div> <!-- list-shop-container -->

    </div> <!-- form-insert-cart -->

        <div class="delitem">
            <p>Remover item do carrinho</p>
            <form action="store.php?shop" method="post">
                <label for="inputIdDel"><strong>Cód</strong> do item: </label>
                <input type="number" name="inputIdDel" class="inputcart" placeholder="00" required><br>
                <button type="submit">Enviar</button>
                
            </form>

        </div> <!-- "delitem" -->

        <?php
        
        


    // div container-storeshop
    echo "</div>";

} // if( isset ($_SESSION["cart"]) ) {


?>