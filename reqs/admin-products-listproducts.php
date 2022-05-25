
    <table cellspacing="0" class="darkTable" >
        <thead>
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

            $products_query = listproducts($conecta);
            while($produto_list = mysqli_fetch_array($products_query)) {
                $imagem_produto = $produto_list['imgPath'];

        ?>

            <tr>

            <td><figure><img width="195em" src="<?php echo $imagem_produto;?>"></figure></td>
                <td><?php echo $produto_list["productID"]?></td>
                <td><?php echo $produto_list["name"]?></td>
                <td><?php echo "R$" . $produto_list["pricetosell"]?></td>
                <td><?php echo "R$" . $produto_list["pricetobuy"]?></td>
                <td><?php echo $produto_list["stock"]?></td>
                <td><?php echo $produto_list["description"]?></td>
                <td><a href="admin-products.php?editproduct=<?php echo $produto_list['productID'];?>"><button>Editar</button></a><br><br><a href="admin-products.php?delproduct=<?php echo $produto_list["productID"];?>"><button>Deletar</button></a></td>

            </tr>

        <?php
            }

        ?>

        </tbody>
    </table>