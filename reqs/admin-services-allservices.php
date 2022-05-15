<table class="tabela-lista-servicos" border="1" cellspacing="0">
    <tr>
        <td>Imagem: </td>
        <td>ID: </td>
        <td>Nome do serviço: </td>
        <td>Valor: </td>
        <td>Descrição: </td>
        <td>Selecionar: </td>
    </tr>

    <?php
    
        
    while($service_list = mysqli_fetch_array($list_sql)) {
        $serviceID = $service_list['servicesID'];
    ?>
    <tr>
        <td><figure><img class="img-service-list" width="195em" src="<?php echo $service_list["imgPath"];?>"></figure></td>
        <td><?php echo $serviceID ?></td>
        <td><?php echo $service_list['name']?></td>
        <td><?php echo $service_list['price']?></td>
        <td><?php echo $service_list['description']?></td>
        <td><a href="admin-services.php?selectservice=<?php echo $serviceID ?>"><button type="submit">Modificar</button></a><br><a href="admin-services.php?delservice=<?php echo $serviceID ?>"><button type="submit">Deletar</button></a></td>

    </tr>
    <?php
    }
    ?>

</table>