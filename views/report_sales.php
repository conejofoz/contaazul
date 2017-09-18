<h1>Relatórios de Vendas</h1>
<form method="GET">
    <div class="report-grid-4">
        Nome do Cliente:<br/>
        <input type="text" name="client_name" />
    </div>
    
    <div class="report-grid-4">
    Período:<br/>

    <input type="date" name="period1" /><br/>
    até<br/>
    <input type="date" name="period2" />
    </div>
    
    <div class="report-grid-4">
        Status da Venda:<br/>
        <select name="status">
            <option value="">Todos os status</option>
            <?php foreach ($statuses as $statusKey => $statusValue ):?>
            <option value="<?php echo $statusKey;?>"><?php echo $statusValue;?></option>
            <?php endforeach;?>
        </select>
    </div>
    
    <div class="report-grid-4">4</div>

</form>