<div class="tabela-lista-users">
    <table border="1" cellspacing="0">
        <tr class="topo-tabela">
            <td>Imagem: </td>
            <td>ID: </td>
            <td>Nome: </td>
            <td>Descrição: </td>
            <td>Ação: </td>
        </tr>

        <?php

            $gallery_query = listgallery($conecta);
            while($gallery_list = mysqli_fetch_array($gallery_query)) {
                $imagem = $gallery_list['photoPath'];

        ?>
        <tr>

        <td><figure><img width="195em" src="<?php echo $imagem;?>"></figure></td>
            <td><?php echo $gallery_list["galleryID"]?></td>
            <td><strong><?php echo $gallery_list["name"]?></strong></td>
            <td><?php echo $gallery_list["description"]?></td>
            <td><a href="admin-gallery.php?editphoto=<?php echo $gallery_list['galleryID'];?>"><button>Editar</button></a><br><a href="admin-gallery.php?delphoto=<?php echo $gallery_list["galleryID"];?>"><button>Deletar</button></a></td>

        </tr>

        <?php
            }
        ?>

    </table>
</div>