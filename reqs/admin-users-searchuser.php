<form action="admin-users.php?search" method="post">
    <input type="text" name="searchuser" id="searchuser" placeholder="Digite alguma informação do usuário">
    <button type="submit">Buscar</button>
</form>

<?php

if(isset($_POST["searchuser"])){
$users = searchusers($conecta);

    require("reqs/adminpanel_search.php");

}

