<html>
    <head>
        <meta charset="UTF-8">
        <title>Painel - <?php echo $viewData['company_name']; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo BASE_URL; ?>/assets/css/template.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/font-awesome/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
        
    </head>
    <body>
        
        <div class="leftmenu">
            <div class="company_name">
                <?php echo $viewData['company_name']; ?>
            </div>
            <div class="menuarea">
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/permissions">Permissões</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/users">Usuários</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/clients">Clientes</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="top">
                <div class="top_right"><a href="<?php echo BASE_URL; ?>/login/logout">Sair</a></div>
                <div class="top_right"><?php echo $viewData['user_email']; ?></div>
            </div>
            <div class="area">
                <?php
                $this->loadViewInTemplate($viewName, $viewData);
                ?>
            </div>
        </div>


    </body>
</html>