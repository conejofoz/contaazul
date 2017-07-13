<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="<?php echo BASE_URL; ?>/assets/css/login.css" rel="stylesheet" />
    </head>
    <body>
    <div class="loginArea">
        
        

        <form method="POST">
            
            <input type="email" name="email" placeholder="Digite seu e-mail"/><br/><br/>

            
            <input type="password" name="password" placeholder="Digite sua senha"/><br/><br/>
            <input type="submit" value="Entrar"/><br/><br/>
            
            <?php if (!empty($error)): ?>
            <div class="warning"><?php echo $error; ?></div>
        <?php endif; ?>
        </form>

    </div>
    <div style="clear: both"></div>
    </body>
</html>