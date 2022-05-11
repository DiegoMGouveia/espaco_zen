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
    <form action="store.php?shop"  method="post">

        <label for="typeitem">Categoria do item: </label><br>
        <label for="typeitem"> serviço</label>
        <input type="radio" name="typeitem" <?php if ( $_POST["typeitem"] == "service" ) { echo "checked"; }; ?> class="inputshopsearch" value="service"><br>
        <label for="typeitem">Produto</label>
        <input type="radio" name="typeitem" <?php if ( $_POST["typeitem"] == "product" ) { echo "checked"; }; ?> class="inputshopsearch" value="product"><br>
        <label for="searchitem">Nome do item:</label>
        <input type="text" name="searchitem" id="searchitem" placeholder="item a ser adicionado" <?php if ( isset ( $_POST["searchitem"] ) ) { echo "value = ". $_POST['searchitem']; }; ?> >
        <button type="submit">pesquisar</button>

    </form>
    <!-- fim do formulário -->
    <!-- inicio lista da pesquisa do formulário -->
    <?php
    if (isset($_POST["typeitem"])) {
        if ($_POST["typeitem"] == "service") {
                
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
                        $serviceQuery = searchService($_POST["searchitem"], $conecta);
                        
                        while($service_list = mysqli_fetch_array($serviceQuery)) {
                            ?>
                            <tr>
                                <center>
                                    <td><?php echo $service_list['servicesID']; ?></td>
                                </center>

                                <td><?php echo $service_list['name']; ?></td>
                                <td><?php echo $service_list['price']; ?></td>
                            </tr>
                            <?php
                        } // while($service_list = mysqli_fetch_array($serviceQuery)) {
                        ?>

                        
                    </tbody>

                </table><br><br>

        <?php
            

        } // if ($_POST["typeitem"] == "service") {

         
    } // if (isset($_POST["typeitem"])) {


        
    

        ?>
        <div class="form-insert-cart">
            <h4>Insira o item no carrinho: </h4>
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
                $item = selectservice($_POST["inputiditem"],$conecta);
                $carrinho = [
                    "shopType" => $_POST["inputtypeitem"],
                    "storeID" => $_SESSION["cart"]["storeID"],
                    "itemID" => $item["servicesID"],
                    "itemName" => $item["name"],
                    "shopQtd" => $_POST["inputqtditem"],
                    "shopPrice" => $item["price"],
                ];
                $item_insert = addShop($carrinho,$conecta);
            } // if( $_POST["inputtypeitem"] == "service" ) {
        } // if ( isset ( $_POST["inputtypeitem"] ) ) {
        
        listCart($_SESSION["cart"]["storeID"],$conecta);
        


    // div container-storeshop
    echo "</div>";

} // if( isset ($_SESSION["cart"]) ) {


?>