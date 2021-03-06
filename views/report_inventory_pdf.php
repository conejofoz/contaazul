<style type="text/css">
    th {text-align: left;}
</style>

<h1>Relatório de Estoque</h1>

<fieldset>
    Itens com estoque abaixo do mínimo.
</fieldset>
<br/>
<table border="0" width="100%">
    <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Quant. Mín.</th>
        <th>Diferença</th>
 
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
            <td>
                <?php echo $product['min_quant'] - $product['quant']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

