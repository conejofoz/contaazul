<html>
    <head>
        <meta charset="UTF-8">
        <title>Painel - <?php echo $viewData['company_name']; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo BASE_URL; ?>/assets/css/template.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/font-awesome/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="leftmenu">
            <div class="company_name">
                <?php echo $viewData['company_name']; ?>
            </div>
        </div>
        <div class="container">
            <div class="top">
                <div class="top_right"><a href="<?php echo BASE_URL; ?>/login/logout">Sair</a></div>
                <div class="top_right"><?php echo $viewData['user_email']; ?></div>
                
            </div>
        </div>
        
        <?php
        //$this->loadViewInTemplate($viewName, $viewData);
        ?>
    </body>
</html>