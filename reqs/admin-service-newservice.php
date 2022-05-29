<div class="newservice">
    <h3>Criando um novo serviço:</h3>

    <form action="admin-services.php?newservice" method="POST" enctype="multipart/form-data">

        <label for="newname">Nome do serviço</label><br>
        <input type="text" name="newname" class="inputservices" placeholder="Digite o nome do serviço aqui."><br>
        <label for="newprice">Valor R$:</label><br>
        <input type="number" name="newprice" class="inputservices"><br>
        <label for="newdescription">Descrição: </label><br>
        <textarea class="inputservices" name="newdescription" placeholder="Digite uma breve descrição aqui..."></textarea><br><br>
        <label for="newimg">Enviar imagem: </label><br>
        <input type="file" name="newimg" class="inputservices" accept="image/*"><br><br>
        <button type="reset">Resetar</button><button type="submit">Enviar</button>

        

    </form>

    

    <?php
    

    // verificação de todos campos de criação de serviço estão preenchidos

    if (isset($_POST["newname"])){
        if(empty($_POST["newname"]) || empty($_POST["newprice"]) || empty($_POST["newdescription"]) || empty($_FILES["newimg"])) {
            $notvalor = "Existe um ou mais campos vazio, <br> verifique e preencha-o";
        } else {

            $servicename = limpaaspas($_POST['newname']);
            $servicevalor = $_POST["newprice"];
            $servicedesc = limpaaspas($_POST["newdescription"]);
            // limpar descrição
            $serviceImg = $_FILES["newimg"];
            if (empty($serviceImg['name'])){

                $img_path = "_imgs/noimg.png";
            
            } else {
                echo "aqui";
                $new_name = uniqid() . "."; // Novo nome aleatório do arquivo
                $extension = strtolower(pathinfo($serviceImg["name"], PATHINFO_EXTENSION)); // Pega extensão de arquivo e converte em caracteres minúsculos.      
                $tempPast = $serviceImg["tmp_name"];
                $imagem = $new_name . $extension;
                $past   = "_img-service/";
                $img_path = $past . $imagem;
                move_uploaded_file($tempPast, $img_path);
            
        }

            $sql = "INSERT INTO services(name,price,imgPath,description) VALUES('$servicename', '$servicevalor', '$img_path', '$servicedesc') ";
            
            $service_send = mysqli_query($conecta, $sql);


            if ($service_send){
                // mensagem de sucesso, quero um log do usuário, data e hora da criação
                $msg_sucesso = "Cadastro de serviço realizado com sucesso!";
            } else {
                //mensagem de erro, quero um log disso
                echo "Error: " . $newservice . "<br>" . mysqli_error($conecta);
            }
        }
    }


    ?>

        <?php 
        if(isset($notvalor)) {
            echo $notvalor;
        } 

        if(isset($msg_sucesso)) {
            echo "$msg_sucesso";
        }
        // -------------fim do novo serviço -----------------------------------
        ?>



</div> <!-- newservice -->