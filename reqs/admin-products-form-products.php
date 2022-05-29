<div class="form-products">
    <h2>Cadastrando produto: </h2>
    <form action="admin-products.php?newproduct" method="POST" enctype="multipart/form-data">

        <label for="newproductname">Nome do produto: </label><br>
        <input type="text" name="newproductname" class="input-products" required><br>
        <label for="newproductpricetosell">Preço de venda: </label><br>
        <input type="number" step=0.01 min=0 name="newproductpricetosell" class="input-products" required><br>
        <label for="newproductpricetobuy">Preço de custo</label><br>
        <input type="number" step=0.01 min=0 name="newproductpricetobuy" class="input-products" required><br>
        <label for="newproductdescription">Descrição do produto: </label><br>
        <textarea name="newproductdescription" class="input-products" required></textarea><br>
        <label for="newproductstock">Estoque: </label><br>
        <input type="number" name="newproductstock" class="input-products" required><br>
        <label for="newproductimg">Upload da imagem do produto: </label><br>
        <input type="file" name="newproductimg" class="input-products" accept="image/*" required><br>
        <button type="reset">Limpar</button> <button type="submit">Enviar</button>

    </form>

    <?php

    if(isset($_POST["newproductname"])){
        $newproduct = registerProduct($conecta);
    }
    
    if ($newproduct == true) {

        echo "Produto cadastrado com sucesso!";
        
    } elseif (isset($newproduct) && $newproduct == false) {
        echo "Produto NÃO cadastrado, verifique os dados e tente novamente.";
    }
    ?>

</div>