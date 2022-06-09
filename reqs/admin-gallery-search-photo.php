<form action="admin-gallery.php?search" method="POST">
    <input type="text" name="searchphoto" id="searchuser" placeholder="Digite o ID, nome ou parte da descrição da foto" required>
    <button type="submit">Procurar</button>
</form>
<br>

<?php

 if( $_POST["searchphoto"] ){
    echo "<center>Mostrando resultados para '". $_POST["searchphoto"] . "'.</center><br>";

     ?>
    <div class="tabela-lista-users">
        <table cellspacing="0" class="darkTable" >
            <thead>
                <tr>
                    <th>Imagem: </th>
                    <th>ID: </th>
                    <th>Nome: </th>
                    <th>Descrição: </th>
                    <th>Ação: </th>
                </tr>
            </thead>

            <tbody>

            <?php

                $gallery_query = searchPhoto($conecta);
                while($gallery_list = mysqli_fetch_array($gallery_query)) {
                    $imagem = $gallery_list['photoPath'];

            ?>
            <tr>

            <td><figure><img width="195em" src="<?php echo $imagem;?>"></figure></td>
                <td><?php echo $gallery_list["galleryID"]?></td>
                <td><strong><?php echo $gallery_list["name"]?></strong></td>
                <td class="desc-mob"><?php echo $gallery_list["description"]?></td>
                <td><a href="admin-gallery.php?editphoto=<?php echo $gallery_list['galleryID'];?>"><button>Editar</button></a><br><br><a href="admin-gallery.php?delphoto=<?php echo $gallery_list["galleryID"];?>"><button>Deletar</button></a></td>

            </tr>

            <?php
                }
            ?>
            <tbody>

        </table>
    </div>

     <?php
 }
 ?>