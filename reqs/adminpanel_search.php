<div class="tabela-lista-users">
    <table border="1" cellspacing="0">
        <tr class="topo-tabela">
            <td>ID: </td>
            <td>Privilégio</td>
            <td>Usuário: </td>
            <td>Nome: </td>
            <td>Email: </td>
            <td>Celular: </td>
            <td>Selecionar: </td>
        </tr>


        <?php
            while($usuario_list = mysqli_fetch_array($users)) {


                $user_id = $usuario_list["userID"];
                $privilege = privilegename($usuario_list["privileges"], $conecta);

        ?>
        <tr>

            <td><?php echo $user_id;?></td>
            <td><?php echo $privilege;?></td>
            <td><?php echo $usuario_list["username"]?></td>
            <td><?php echo $usuario_list["name"]?></td>
            <td><?php echo $usuario_list["email"]?></td>
            <td><?php echo $usuario_list["cellphone"]?></td>
            <td><a href="admin-users.php?edit-user=<?php echo $user_id;?>"><button>Editar</button></a><br><a href="admin-users.php?Deluser=<?php echo $user_id; ?>"><button type="submit">Deletar</button></a></td>

        </tr>


        <?php
            }
        ?>

    </table>
</div>