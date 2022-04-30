<!-- editando arquivo -->


<?php 
    if (isset($_GET["editproduct"])){
        $productID = $_GET["editproduct"];
        $product = selectProduct($conecta);
    
        if (isset($_POST["changename"]) && (!empty($_POST["changename"]))){

            if (changeProduct($productID, $product["imgPath"], $conecta)){
                header('location: admin-products.php?allproducts');
            } else {
                $changed = "Houve um erro.";
            }

        }

        ?>


        <div class="newservice">
        
            <form action="admin-products.php?editproduct=<?php echo $productID; ?>" method="post" enctype="multipart/form-data">

                <h3>Modificando o Produto:</h3>
                
                <label class="label-edit" for="changename">Novo nome do Produto: </label>
                <input type="text" class="input-edit" name="changename" value="<?php echo $product['name'] ?>"><br>
                <label class="label-edit" for="changeprices">Novo preço de venda: </label>
                <input type="number" class="input-edit" name="changeprices" value="<?php echo $product['pricetosell'] ?>"><br>
                <label class="label-edit" for="changepriceb">Novo preço de compra: </label>
                <input type="number" class="input-edit" name="changepriceb" value="<?php echo $product['pricetobuy'] ?>"><br>
                <label class="label-edit" for="changestock">Quantidade em estoque: </label>
                <input type="number" class="input-edit" name="changestock" value="<?php echo $product['stock'] ?>"><br>
                <label for="changedescription">Nova descrição: </label>
                <textarea name="changedescription" class="input-edit" id="changedescription" cols="30" rows="6" ><?php echo $product['description'] ?></textarea><br><br><br>
                <label for="changeimage">Atualize a imagem: </label>
                <input type="file" class="input-edit" name="changeimage" accept="image/*"><br>
               <button type="submit" value="managed">Atualizar</button>

            </form>

            <?php
            
            if ( isset ( $changed ) ) {
                echo $changed;
            }
            
            ?>


        </div>

    <?php

}


