<div class="container1-conteudo1">
    <div class="conteudo1">
        <h2>
            Aqui você encontra:
        </h2>
        <ul>
        <?php
        $list_sql = selectservices($conecta);
        while($service_list = mysqli_fetch_array($list_sql)) {
            $serviceID = $service_list['servicesID'];

        ?>
            <li><?php echo $service_list["name"]; ?></li>
        <?php
                } 
                ?>
        </ul>
    </div>
</div>
