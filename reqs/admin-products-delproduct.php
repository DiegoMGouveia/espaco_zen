<?php 
if (isset($_GET['delproduct'])){

    echo "<div class='delservice'>";
    echo "<p>Você tem certeza de que quer deletar este produto?</p> <br> <p>Isso será irreversivel!</p><br>";
    echo "<a href='admin-products.php?allproducts'><button>Voltar</button></a>";

    echo "<a href='admin-products.php?del=" . $_GET['delproduct'] . "'><button>EXCLUIR</button></a>";
    echo "</div>";

} elseif ($_GET['del'] > 0) {

    delProduct($conecta);

} 