<form action="adminpanel.php?services=3" method="POST">
    <input type="text" name="searchservice" id="searchuser" placeholder="Digite algo sobre o serviço" required>
    <button type="submit">Procurar</button>
</form>

<?php

 if( $_POST["searchservice"] ){

     ?>

     <table class="tabela-lista-servicos" border="1" cellspacing="0">
        <tr>
            <td>img: </td>
            <td>ID: </td>
            <td>Nome do serviço: </td>
            <td>Valor: </td>
            <td>Descrição: </td>
            <td>Selecionar: </td>
        </tr>

        <?php

        $sql_query = searchService($_POST["searchservice"], $conecta);
                    
        while($service_list = mysqli_fetch_array($sql_query)) {
            $serviceID = $service_list['servicesID'];
            
        ?>
        <tr>
            <td><figure><img class="img-service-list" width="195em" src="<?php echo $service_list["imgPath"];?>"></figure></td>
            <td><?php echo $serviceID ?></td>
            <td><?php echo $service_list['name']?></td>
            <td><?php echo $service_list['price']?></td>
            <td><?php echo $service_list['description']?></td>
            <td><a href="adminpanel.php?selectservice=<?php echo $serviceID ?>"><button type="submit">Modificar</button></a><br><a href="adminpanel.php?delservice=<?php echo $serviceID ?>"><button type="submit">Deletar</button></a></td>

        </tr>
        <?php 

        } 

        ?>
    </table>

     <?php
 }
 ?>