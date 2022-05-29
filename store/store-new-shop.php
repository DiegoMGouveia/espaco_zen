<?php

if (isset($_GET["newcart"]) && !$carrinho["openTime"]) {

    $carrinho["operatorID"] = useridset();
    
    if (isset($_POST["insertNewCpf"])){



        $cpf = validateCPF($_POST["insertNewCpf"]);
        
        if($cpf == true){

            $carrinho["cpfClient"] = $_POST["insertNewCpf"];

        
            $store_time = newShopCart($_POST["insertNewCpf"],$conecta);
            
            $carrinho["storeID"] = $store_time[0];
            $carrinho["openTime"] = $store_time[1];
            $_SESSION["cart"] = $carrinho;
            header("location: store.php?shop");



        } else {

            $cpfInvalid = "cpf inválido, tente novamente.";

        }
    }

    echo "<div class='container-new-shop'>";
    echo "Carrinho iniciado: <br>";

    echo "Operador: " . $carrinho["operatorID"] . "<br><br>";

    ?>

    <form action="store.php?newcart" method="POST">
        <label for="insertNewCpf">Insira o CPF da cliente: </label> <br>
        <input type="number" name="insertNewCpf" class="insertNewCpf" placeholder="ex: 01234567890" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        <button type="submit">Enviar</button><br><br>
    </form>
        

    <?php
    if (isset($cpfInvalid)) {
        
        echo "<center>" . $cpfInvalid . "</center>"; 

    }

    ?>

    <!-- container-new-shop -->
    </div>

    <?php

}

?>




