<?php
$service = selectservicebyid($_GET["selectservice"], $conecta);

if (isset($_POST["changename"]) && (!empty($_POST["changename"]))){

    if (change($service["servicesID"], $service["imgPath"], $conecta)){
        header('location: admin-services.php?allservices');
    } else {
    $changed = "Houve um erro.";
    }

}

?>


<div class="newservice">
<h3>Modificando serviço:</h3>

<form action="admin-services.php?selectservice=<?php echo $service["servicesID"]; ?>" method="post" enctype="multipart/form-data">
    
    <label class="label-edit" for="changename">Novo nome do serviço:</label>
    <input type="text" class="input-edit" name="changename" id="newNameS" value="<?php echo $service['name'] ?>"><br>
    <label for="changeprice">Digite o novo valor: </label>
    <input type="text" class="input-edit" name="changeprice" id="changeprice" value="<?php echo $service['price'] ?>"><br>
    <label for="changedescription">Nova descrição: </label>
    <textarea name="changedescription" class="input-edit" id="changedescription" cols="30" rows="6" ><?php echo $service['description'] ?></textarea><br><br><br>
    <label for="changeimage">Atualize a imagem: </label>
    <input type="file" class="input-edit" name="changeimage" accept="image/*"><br>
    <a href="admin-services.php?selectservice=<?php echo $service["servicesID"];?>"><button type="submit" value="managed">Atualizar</button></a>

</form>

<?php
if ( isset ( $changed ) ) {
    echo $changed;
}

?>


</div>
