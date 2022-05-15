<?php 

echo "<div class='delservice'>";
if (isset($_GET['Deluser'])){

    echo "<p>Você tem certeza de que quer <STRONG>DELETAR este usuário</STRONG>?</p> <br> <p>Isso será irreversivel!</p><br>";
    echo "<a href='admin-users.php?allusers'><button>Voltar</button></a>";

    echo "<a href='admin-users.php?deleted=" . $_GET['Deluser'] . "'><button>EXCLUIR</button></a>";
    echo "</div>";

} elseif ($_GET['deleted'] > 1) {

    delUser($conecta);

} 
// fim div 'delservice'
echo "</div>";