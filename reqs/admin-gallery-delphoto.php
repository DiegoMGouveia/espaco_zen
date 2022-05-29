<?php 
if (isset($_GET['delphoto'])){

    echo "<div class='delservice'>";
    echo "<p>Você tem certeza de que quer <strong>DELETAR</strong> esta foto da galeria?</p> <br> <p>Isso será irreversivel!</p><br>";
    echo "<a href='admin-gallery.php?listgallery'><button>Voltar</button></a>";

    echo "<a href='admin-gallery.php?del=" . $_GET['delphoto'] . "'><button>EXCLUIR</button></a>";
    echo "</div>";

} elseif ($_GET['del'] > 0) {

    delPhoto($conecta);

} 