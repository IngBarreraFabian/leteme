<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Iniciar Sesión</h1>
        <form action="<?php echo constant('URL'); ?>index/ValidarUsuario" method="POST">
        <div class="col-sm-6 offset-sm-3">

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email"required>
                <small id="emailHelp" class="form-text text-muted">Ingrese su email de usario</small>
            </div>
        <div class="form-group">
           <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <small id="passwordHelp" class="form-text text-muted">Ingrese su contreseña</small>
        </div> 
        <input type="hidden" name="auth" value="auth"/>
    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Autenticar">
        
        </div>
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>