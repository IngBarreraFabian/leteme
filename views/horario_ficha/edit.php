<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Editar Horario</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
    <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">EDITAR HORARIO</h1>
        <form action="<?php echo constant('URL'); ?>horario_ficha/editar" method="POST">
        <div class="col-sm-6 offset-sm-3">

        <div class="form-group">
                <label for="ficha_nroficha">Numero de Ficha</label>
                <input type="number" class="form-control" readonly name="ficha_nroficha" id="ficha_nroficha" value="<?php echo $this->nficha->ficha_nroficha; ?>">
        </div>
                <div class="form-group">
                    <label for="instructor_documento">Documento Instructor</label>
                    <input type="text" class="form-control" readonly name="instructor_documento" id="instructor_documento"value="<?php echo $this->nficha->instructor_documento; ?>">
                    <small id="nombresHelp" class="form-text text-muted">Diligencie Numero de Documento del Instructor</small>
                </div>
                    <div class="form-group">
                         <label for="sesion_jornada">Jornada</label>
                         <input type="text" class="form-control" readonly name="sesion_jornada" id="sesion_jornada" value="<?php echo $this->nficha->sesion_jornada; ?>">
                        <small id="nombresHelp" class="form-text text-muted">Elija la Jornada</small>
                    </div>
                <?php 
                ?>
            <div class="form-group">
            <label for="dia">Día</label>
            <input type="text" class="form-control" readonly name="dia" id="dia" value="<?php echo $this->nficha->dia; ?>">
            <small id="diaHelp" class="form-text text-muted">Día del horario</small>
            </div>
            
            <div class="form-group">
            <label for="hora_inicio">Hora de Inicio</label>
            <input type="time" class="form-control" name="hora_inicio" id="hora_inicio"value="<?php echo $this->nficha->hora_inicio; ?>">
            <small id="nombresHelp" class="form-text text-muted">Diligencie hora de Inicio</small>
            </div>

            <div class="form-group">
            <label for="hora_fin">Hora de Finalización</label>
            <input type="time" class="form-control" name="hora_fin" id="hora_fin" value="<?php echo $this->nficha->hora_fin; ?>" required>
            <small id="nombresHelp" class="form-text text-muted">Diligencie hora de Finalización</small>
            </div>
            <div class="form-group">
            
            <label for="ambiente">Ambiente</label>
            <input type="text" class="form-control" name="ambiente" id="ambiente" value="<?php echo $this->nficha->ambiente; ?>" required onblur="validatePassword()">
            <small id="nombresHelp" class="form-text text-muted">Digite el Ambiente</small>
            </div>
            
            <div class="form-group">
            <label for="fecha_inicio">Fecha de Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo $this->nficha->fecha_inicio; ?>" required>
            <small id="nombresHelp" class="form-text text-muted">Diligencie fecha de Inicio</small>
            </div>
            
            <div class="form-group">
            <label for="fecha_fin">Fecha de Finalización</label>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo $this->nficha->fecha_fin; ?>" required>
            <small id="nombresHelp" class="form-text text-muted">Diligencie fecha de Finalización</small>
            </div>
            
            
         <input type="submit" class="btn btn-primary" value="Guardar">       
        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>