<h1>Usuários</h1>
<a href="<?php echo BASE_URL; ?>/users/add"><div class="button">Adicionar Usuário</div></a>

<table border="0" width="100%">
    <tr>
        <th>E-mail</th>
        <th>Grupo de permissões</th>
        <th>Açoes</th>
    </tr>
    <?php foreach ($users_list as $us): ?>
        <tr>
            <td><?php echo $us['email'];?></td>
            <td><?php echo $us['name'];?></td>
            <td width="160">
                <div class="button button_small"><a href="<?php echo BASE_URL; ?>/users/edit/<?php echo $us['id']; ?>">Editar</a></div>
                <div class="button button_small"><a href="<?php echo BASE_URL; ?>/users/delete/<?php echo $us['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>