<div class="tabela-lista-users">
    <table class="darkTable">
        <thead>
            <tr>
                <th>ID: </th>
                <th>Privilégio</th>
                <th>Usuário: </th>
                <th>Nome: </th>
                <th>Email: </th>
                <th>Celular: </th>
                <th>Selecionar: </th>
            </tr>
        </thead>

        <tbody>

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

        </tbody>

    </table>
</div>