<h1>Vendas</h1>

<a href="<?php echo BASE_URL; ?>/sales/add"><div class="button">Adicionar Venda</div></a>

<table border="0" width="100%">
    <tr>
        <th>Nome do Cliente</th>
        <th>Data</th>
        <th>Status</th>
        <th>valor</th>
        <th>Açoes</th>
    </tr>
    <?php foreach ($sales_list as $sale_item): ?>
        <tr>
            <td><?php echo $sale_item['name'];?></td>
            <td><?php echo date('d/m/Y', strtotime($sale_item['date_sale']));?></td>
            <td><?php echo $statuses[$sale_item['status']];?></td>
            <td><?php echo number_format($sale_item['total_price'], 2, ',','.');?></td>
            <td width="160">
                <?php if($sales_edit): ?>
                <div class="button button_small"><a href="<?php echo BASE_URL; ?>/sales/edit/<?php echo $sale_item['id']; ?>">Editar</a></div>
                <div class="button button_small"><a href="<?php echo BASE_URL; ?>/sales/delete/<?php echo $sale_item['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div>
                <?php else: ?>
                <div class="button button_small"><a href="<?php echo BASE_URL; ?>/sales/view/<?php echo $sale_item['id']; ?>">Visualizar</a></div>
                
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
