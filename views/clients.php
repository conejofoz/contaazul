<h1>Clientes</h1>
<?php if($edit_permition): ?>
<a href="<?php echo BASE_URL; ?>/clients/add"><div class="button">Adicionar Clientes</div></a>
<?php endif; ?>
<table border="0" width="100%">
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Cidade</th>
        <th>Estrelas</th>
        <th>Açoes</th>
    </tr>
    <?php foreach ($clients_list as $c): ?>
        <tr>
            <td><?php echo $c['name'];?></td>
            <td><?php echo $c['phone'];?></td>
            <td><?php echo $c['address_city'];?></td>
            <td><?php echo $c['stars'];?></td>
            <td width="160">
                <div class="button button_small"><a href="<?php echo BASE_URL; ?>/users/edit/<?php echo $c['id']; ?>">Editar</a></div>
                <div class="button button_small"><a href="<?php echo BASE_URL; ?>/users/delete/<?php echo $c['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div>
            </td>
        </tr>
    <?php endforeach; ?>
    
</table>