<?php
// alterando Usuário
if (isset($_POST["changeusername"]) && isset($_POST["changename"]) && isset($_POST["changeemail"]) && isset($_POST["changecell"])){
    if(empty($_POST["changeusername"]) || empty($_POST["changename"]) || empty($_POST["changeemail"]) || empty($_POST["changecell"])){
        
        $error_empty = "Há campos a serem preenchido, verifique e tente novamente.";

    } else {
                
    $change_ok = admChangeUser($conecta);
    
    }

} 

?>
<?php
$selected_user = selectuserbyid($conecta);
?>
<div class="manageuser">
    <?php
    if (isset($error_empty)){
        echo $error_empty;
        
        echo "<br>";

        echo "<a href='admin-users.php?allusers'><button>Voltar</button></a>";

        echo " <META HTTP-EQUIV='REFRESH' CONTENT='3; URL=admin-users.php?allusers'>";

    }elseif (($change_ok) && (!$error_empty)){
        
        echo "Alterado com sucesso!";
        
        echo "<br>";

        echo "redirecionando de volta...";


        echo " <META HTTP-EQUIV='REFRESH' CONTENT='3; URL=admin-users.php?allusers'>";

    } else {
    ?>
        <form action="admin-users.php?edit-user=<?php echo $selected_user['userID'];?>" method="post">
            
            <label for="changeusername">Usuário: </label><br>
            <input type="text" name="changeusername" required id="changeusername" value="<?php echo $selected_user["username"];?>">
            
            <label for="changepwd">Nova senha: </label><br>
            <input type="text" name="changepwd" id="changepwd" placeholder="Digite uma NOVA senha">
            
            <label for="changepwd2">Repita a nova senha: </label><br>
            <input type="text" name="changepwd2" id="changpwd2" placeholder="Repita a NOVA senha">

            <label for="changename">Nome: </label><br>
            <input type="text" name="changename" required id="changename" value="<?php echo $selected_user["name"];?>">

            <label for="changeemail">Email: </label><br>
            <input type="email" name="changeemail" required id="changeemail" value="<?php echo $selected_user["email"];?>">

            <label for="changecell">Celular: ex(53991111111) </label><br>
            <input type="tel" pattern="[0-9]{11}" required name="changecell" id="changecell" value="<?php echo $selected_user["cellphone"];?>">

            <label for="changeprivilege">Privilégios: </label><br>
            <select name="changeprivilege">

                <?php $privilegelist = listprivileges($conecta);
                $selected_user = selectuserbyid($conecta);

                while($privileges = mysqli_fetch_array($privilegelist)) {
                    if($privileges["privID"] == $selected_user["privileges"]){
                        $privoption = $privileges["privID"];
                        $privname   = $privileges["privname"];
                        echo "<option value='$privoption' selected>$privname</option>";
                    } else {
                        $privoption = $privileges["privID"];
                        $privname   = $privileges["privname"];
                        echo "<option value='$privoption'>$privname</option>";

                    }
                }
                ?>
            </select>

            <br><br>
            <a href="admin-users.php?edit-user=<?php echo $selected_user['userID'];?>"><button> Atualizar </button></a>
        </form>
        <a href='admin-users.php?allusers'><button>Voltar</button></a>
    <?php } ?>
</div> <!-- manageuser -->


<?php