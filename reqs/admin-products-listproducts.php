<div class="tabela-lista-users">
    <table border="1" cellspacing="0">
        <tr class="topo-tabela">
            <td>Imagem: </td>
            <td>ID: </td>
            <td>Produto: </td>
            <td>Preço de venda: </td>
            <td>Preço de custo: </td>
            <td>Estoque: </td>
            <td>Descrição: </td>
            <td>Ação: </td>
        </tr>


        <?php

            $products_query = listproducts($conecta);
            while($produto_list = mysqli_fetch_array($products_query)) {
                $imagem_produto = $produto_list['imgPath'];

        ?>
        <tr>

        <td><figure><img width="195em" src="<?php echo $imagem_produto;?>"></figure></td>
            <td><?php echo $produto_list["productID"]?></td>
            <td><?php echo $produto_list["name"]?></td>
            <td><?php echo $produto_list["pricetosell"]?></td>
            <td><?php echo $produto_list["pricetobuy"]?></td>
            <td><?php echo $produto_list["stock"]?></td>
            <td><?php echo $produto_list["description"]?></td>
            <td><a href="admin-products.php?editproduct=<?php echo $produto_list['productID'];?>"><button>Editar</button></a><a href="admin-products.php?delproduct=<?php echo $produto_list["productID"];?>"><button>Deletar</button></a></td>

        </tr>


        <?php
            }
        ?>

    </table>
</div>