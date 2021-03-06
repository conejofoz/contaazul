<h1>Estoque</h1>
<?php if ($add_permission): ?>
    <a href="<?php echo BASE_URL; ?>/inventory/add"><div class="button">Adicionar Produtos</div></a>
<?php endif; ?>
<input type="text" id="busca" data-type="search_inventory" />
<table border="0" width="100%">
    <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Quant. Mín.</th>
        <th>Açoes</th>
    </tr>
    <?php foreach ($inventory_list as $product): ?>
        <tr>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo number_format($product['price'], 2, ',', '.'); ?></td>
            <td><?php echo $product['quant']; ?></td>
            <td><?php
                if ($product['min_quant'] > $product['quant']) {
                    echo '<span style="color:red">' . $product['min_quant'] . '</span>';
                } else {
                    echo $product['min_quant'];
                }
                ?></td>
            <td width="160">
                    <div class="button button_small"><a href="<?php echo BASE_URL; ?>/inventory/edit/<?php echo $product['id']; ?>">Editar</a></div>
                    <div class="button button_small"><a href="<?php echo BASE_URL; ?>/inventory/delete/<?php echo $product['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div>
                </td>
        </tr>
    <?php endforeach; ?>
</table>
