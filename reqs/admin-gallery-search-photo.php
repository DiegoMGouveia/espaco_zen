<form action="admin-gallery.php?search" method="POST">
    <input type="text" name="searchphoto" id="searchuser" placeholder="Digite o ID, nome ou parte da descrição da foto" required>
    <button type="submit">Procurar</button>
</form>

<?php

 if( $_POST["searchphoto"] ){

     ?>

     <table class="tabela-lista-users" border="1" cellspacing="0">
        <tr class="topo-tabela">
            <td>img: </td>
            <td>ID: </td>
            <td>Nome da foto: </td>
            <td>Descrição: </td>
            <td>Ação: </td>
        </tr>

        <?php

        $sql_query = searchPhoto($conecta);
                    
        while($gallery_list = mysqli_fetch_array($sql_query)) {
            $galleryID = $gallery_list['galleryID'];
            
        ?>
        <tr>
            <td><figure><img class="img-service-list" width="195em" src="<?php echo $gallery_list["photoPath"];?>"></figure></td>
            <td><?php echo $galleryID ?></td>
            <td><?php echo $gallery_list['name']?></td>
            <td><?php echo $gallery_list['description']?></td>
            <td><a href="admin-gallery.php?editphoto=<?php echo $galleryID ?>"><button type="submit">Modificar</button></a><br><a href="admin-gallery.php?delphoto=<?php echo $galleryID ?>"><button type="submit">Deletar</button></a></td>

        </tr>
        <?php 

        } 

        ?>
    </table>

     <?php
 }
 ?>