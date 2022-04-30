<?php 
    if (isset($_GET["editphoto"])){
        $galleryID = $_GET["editphoto"];
        
        ?>
            <?php
            $photo = selectPhoto($conecta);
        
            if (isset($_POST["changename"]) && (!empty($_POST["changename"]))){

                if (changePhoto($galleryID, $photo["photoPath"], $conecta)){
                    header('location: admin-gallery.php?listgallery');
                } else {
                    $changed = "Houve um erro.";
                }

            }

            ?>


        <div class="newservice">
        
            <form action="admin-gallery.php?editphoto=<?php echo $galleryID; ?>" method="post" enctype="multipart/form-data">

                <h3>Modificando a Foto:</h3>
                
                <label class="label-edit" for="changename">Novo nome da foto:</label>
                <input type="text" class="input-edit" name="changename" id="newNameS" value="<?php echo $photo['name'] ?>"><br>
                <label for="changedescription">Nova descrição: </label>
                <textarea name="changedescription" class="input-edit" id="changedescription" cols="30" rows="6" ><?php echo $photo['description'] ?></textarea><br><br><br>
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


