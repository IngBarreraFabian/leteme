<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Crear Instructor</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Nuevo Instructor</h1>
        <form action="<?php echo constant('URL'); ?>instructor/crear" method="POST">
        <div class="col-sm-6 offset-sm-3">

            <div class="form-group">
                <label for="documento">Documento</label>
                <input type="text" class="form-control" name="documento" id="documento">
                <small id="documentoHelp" class="form-text text-muted">Diligencie el documento del instructor</small>
            </div>
                    <div class="form-group">
                         <label for="nombre">Nombres</label>
                         <input type="text" class="form-control" name="nombres" id="nombres"required>
                         <small id="nombresHelp" class="form-text text-muted">Diligencie los nombres del instructor</small>
                    </div>
                            <div class="form-group">
                                 <label for="nombre">Apellidos</label>
                                 <input type="text" class="form-control" name="apellidos" id="apellidos"required>
                                 <small id="apellidosHelp" class="form-text text-muted">Diligencie los apellidos del instructor</small>
                            </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email"required>
                    <small id="emailHelp" class="form-text text-muted">Diligencie el email del instructor</small>
                </div>
        <div class="form-group">
           <label for="celular">Celular</label>
            <input type="text" class="form-control" name="celular" id="nombre">
            <small id="celularHelp" class="form-text text-muted">Diligencie el celular del instructor</small>
        </div> 
        <label class="form-text text-muted">Whatsapp</label>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="whatsapp1" name="whatsapp" class="custom-control-input">
                <label class="custom-control-label" for="whatsapp1">Si</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="whatsapp2" name="whatsapp" class="custom-control-input">
                <label class="custom-control-label" for="whatsapp2">No</label>
                </div>     
    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Registrar">
        
        </div>
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>