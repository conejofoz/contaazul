<h1>Vendas - Editar</h1>
<strong>Nome do cliente:</strong><br/>
<?php echo $sales_info['info']['client_name'] ;?><br/><br/>
<strong>Data da venda:</strong><br/>
<?php echo date('d/m/Y', strtotime($sales_info['info']['date_sale'])) ;?><br/><br/>
<strong>Total da venda:</strong><br/>
<?php echo number_format($sales_info['info']['total_price'],2,',','.') ;?><br/><br/>
<strong>Status da Venda</strong><br/>
<?php if($permission_edit): ?>

<?php else: ?>
<?php echo $statuses[$sales_info['info']['status']]; ?>
<?php endif; ?>
<br/><br/>
<hr/>

<table border="0" width="100%">
    <tr>
        <th>Nome do produto</th>
        <th>Quantidade</th>
        <th>Preço Unitário</th>
        <th>Preço Total</th>
    </tr>
    <?php foreach ($sales_info['products'] as $productitem): ?>
    <tr>
        <td><?php echo $productitem['name']; ?></td>
        <td><?php echo $productitem['quant']; ?></td>
        <td><?php echo number_format($productitem['sale_price'],2,',','.'); ?></td>
        <td><?php echo number_format($productitem['sale_price'] * $productitem['quant'],2,',','.'); ?></td>
    </tr>
    <?php endforeach; ?>
    
</table>