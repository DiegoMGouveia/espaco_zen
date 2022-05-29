<form action="admin-products.php?search" method="POST">
    <input type="text" name="searchproduct" id="searchuser" placeholder="Digite o ID, nome , valor ou parte da descrição do produto" required>
    <button type="submit">Buscar</button>
</form>
<br>

<?php

 if( $_POST["searchproduct"] ){
   

    echo "<center>Mostrando resultados para '". $_POST["searchproduct"] . "'.</center><br>";

     ?>


    <table border="1" cellspacing="0" class="darkTable" >
        <thead>
            <!-- <tr class="topo-tabela"> -->
            <tr>
                <th>Imagem: </th>
                <th>ID: </th>
                <th>Produto: </th>
                <th>Preço de venda: </th>
                <th>Preço de custo: </th>
                <th>Estoque: </th>
                <th>Descrição: </th>
                <th>Ação: </th>
            </tr>
        </thead>
        <tbody>


        <?php

        $sql_query = searchProduct($_POST["searchproduct"], $conecta);
                    
        while($product_list = mysqli_fetch_array($sql_query)) {
            $productID = $product_list['productID'];

            
        ?>
        <tr>

            <td><figure><img width="195em" src="<?php echo $product_list['imgPath'] ;?>"></figure></td>
            <td><?php echo $product_list["productID"]?></td>
            <td><?php echo $product_list["name"]?></td>
            <td><?php echo "R$" . $product_list["pricetosell"]?></td>
            <td><?php echo "R$" . $product_list["pricetobuy"]?></td>
            <td><?php echo $product_list["stock"]?></td>
            <td><?php echo $product_list["description"]?></td>
            <td><a href="admin-products.php?editproduct=<?php echo $product_list['productID'];?>"><button>Editar</button></a><br><br><a href="admin-products.php?delproduct=<?php echo $product_list["productID"];?>"><button>Deletar</button></a></td>

        </tr>
        <?php 

        } 

        ?>
    </table>

     <?php
 }
 ?>