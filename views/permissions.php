<h1>Permissões</h1>

<div class="tabarea">
    <div class="tabitem activetab">Grupos de permissões</div>
    <div class="tabitem">Permissões</div>
</div>
<div class="tabcontent">
    <div class="tabbody" style="display: block">
        GRUPOS DE PERMISSÕES
    </div>
    
    
    <div class="tabbody">
        <a href="<?php echo BASE_URL; ?>/permissions/add">Adicionar permissões</a>
        
        <table border="0" width="100%">
            <tr>
                <th>Nome da Permissão</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($permissions_list as $p): ?>
            <tr>
                <td><?php echo $p['name']; ?></td>
                <td><a href="<?php echo BASE_URL; ?>/permissions/delete/<?php echo $p['id']; ?>">Excluir</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>