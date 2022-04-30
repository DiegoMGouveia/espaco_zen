<div class="form-products">
    <h3>Cadastrando Foto: </h3>
    <form action="admin-gallery.php?newphoto" method="POST" enctype="multipart/form-data">

        <label for="newphotoname">Nome da Foto: </label><br>
        <input type="text" name="newphotoname" class="input-products" required><br>
        <label for="newphotodescription">Descrição da foto: </label><br>
        <textarea name="newphotodescription" class="input-products" required></textarea><br>
        <label for="newphoto">Upload da imagem: </label><br>
        <input type="file" name="newphoto" class="input-products" accept="image/*" required><br>
        <button type="reset">Limpar</button> <button type="submit">Enviar</button>

    </form>

    <?php

    if(isset($_POST["newphotoname"])){
        $newphoto = registerPhoto($conecta);
    }
    
    if ($newphoto == true) {

        echo "Foto enviada com sucesso!";
        
    } elseif (isset($newphoto) && $newphoto == false) {
        echo "Foto NÃO cadastrado, verifique os dados e tente novamente.";
    }
    ?>

</div>