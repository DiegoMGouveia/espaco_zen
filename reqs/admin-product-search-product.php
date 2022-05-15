<form action="admin-products.php?search" method="POST">
    <input type="text" name="searchproduct" id="searchuser" placeholder="Digite o ID, nome , valor ou parte da descrição do produto" required>
    <button type="submit">Buscar</button>
</form>

<?php

 if( $_POST["searchproduct"] ){

     ?>

     <table class="tabela-lista-users" border="1" cellspacing="0">
        <tr class="topo-tabela">
            <td>img: </td>
            <td>ID: </td>
            <td>Nome do produto: </td>
            <td>Preço de venda: </td>
            <td>Preço de compra: </td>
            <td>Quantidade em estoque: </td>
            <td>Descrição: </td>
            <td>Ação: </td>
        </tr>

        <?php

        $sql_query = searchProduct($_POST["searchproduct"], $conecta);
                    
        while($product_list = mysqli_fetch_array($sql_query)) {
            $productID = $product_list['productID'];
            
        ?>
        <tr>
            <td><figure><img class="img-service-list" width="195em" src="<?php echo $product_list["imgPath"];?>"></figure></td>
            <td><?php echo $productID ?></td>
            <td><?php echo $product_list['name']?></td>
            <td><?php echo $product_list['pricetosell']?></td>
            <td><?php echo $product_list['pricetobuy']?></td>
            <td><?php echo $product_list['stock']?></td>
            <td><?php echo $product_list['description']?></td>
            <td><a href="admin-products.php?editproduct=<?php echo $productID ?>"><button type="submit">Modificar</button></a><br><a href="admin-products.php?delproduct=<?php echo $productID ?>"><button type="submit">Deletar</button></a></td>

        </tr>
        <?php 

        } 

        ?>
    </table>

     <?php
 }
 ?>