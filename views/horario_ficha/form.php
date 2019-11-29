<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Crear Horario</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Nuevo Horario</h1>
        <form action="<?php echo constant('URL'); ?>horario_ficha/crear" method="POST">
        <div class="col-sm-6 offset-sm-3">

        <div class="form-group">
                <label for="ficha_nroficha">Nro de Ficha</label>
                <select class="custom-select" id="ficha_nroficha" name="ficha_nroficha">
                <option selected value="">Seleccione...</option> 
                <?php
            include_once 'models/fichadao.php';
            if(count($this->ddl_fichas)>0);
                foreach ($this->ddl_fichas as $ficha) {
                    $ddl_ficha = new FichaDAO();
                    $ddl_ficha = $ficha;
        ?>
        <option value="<?php echo $ddl_ficha->nroficha;?>"><?php echo $ddl_ficha->nroficha. "-" .$ddl_ficha->programa;?></option>
        <?php
        }
        ?>
        </select> 
        </div>
                <div class="form-group">
                     <label for="instructor_documento">Documento Instructor</label>
                     <select class="custom-select" id="instructor_documento" name="instructor_documento">
                     <option selected value="">Seleccione...</option> 
                     <?php
                        include_once 'models/instructordao.php';
                        if(count($this->ddl_instructores)>0);
                            foreach ($this->ddl_instructores as $instructor) {
                                $ddl_instructor = new InstructorDAO();
                                $ddl_instructor = $instructor;
                    ?>
                    <option value="<?php echo $ddl_instructor->documento;?>"><?php echo $ddl_instructor->documento. "-".$ddl_instructor->nombres;?></option>
                    <?php
                                }
                                ?>
                            </select>
                    
                        </div>               
                            <div class="form-group">
                                <label for="sesion_jornada">Jornada</label>
                                <select class="custom-select"  id="sesion_jornada" name="sesion_jornada">
                                <option selected value="">Seleccione...</option>
                                <?php
                                    include_once 'models/jornadadao.php';
                                    if(count($this->ddl_jornadas)>0);
                foreach ($this->ddl_jornadas as $jornadas) {
                    $ddl_jornadas = new JornadaDAO();
                    $ddl_jornadas = $jornadas;
        ?>
        <option value="<?php echo $ddl_jornadas->jornada;?>"><?php echo $ddl_jornadas->jornada;?></option>
        <?php
                    }
                    ?>
                </select>
           
            </div>

            <label for="dia">Dias</label>
        	<div class="form-check custom-control">
            <input type="checkbox" id="dia_0" name="dia[0]" value= "Lunes" class="form-check-input">
            <label class="form-check-label" for="dia_0">Lunes</label>
            </div>
            
                <div class="form-check custom-control">
                <input type="checkbox" id="dia_1" name="dia[1]" value= "Martes" class="form-check-input">
                <label class="form-check-label" for="dia_1">Martes</label>
                </div>
            
                    <div class="form-check custom-control">
                    <input type="checkbox" id="dia_2" name="dia[2]" value= "Miercoles" class="form-check-input">
                    <label class="form-check-label" for="dia_2">Miercoles</label>
                    </div>
            
                        <div class="form-check custom-control">
                        <input type="checkbox" id="dia_3" name="dia[3]" value= "Jueves" class="form-check-input">
                        <label class="form-check-label" for="dia_3">Jueves</label>
                        </div>
            
                    <div class="form-check custom-control">
                    <input type="checkbox" id="dia_4" name="dia[4]" value= "Viernes" class="form-check-input">
                    <label class="form-check-label" for="dia_4">Viernes</label>
                    </div>
            
                <div class="form-check custom-control">
                <input type="checkbox" id="dia_5" name="dia[5]" value= "Sabado" class="form-check-input">
                <label class="form-check-label" for="dia_5">Sabado</label>
                </div>
            
            <div class="form-check custom-control">
            <input type="checkbox" id="dia_6" name="dia[6]" value= "Domingo" class="form-check-input">
            <label class="form-check-label" for="dia_6">Domingo</label>
            <small id="diaHelp" class="form-text text-muted">Seleccione los Dias</small>
            </div>
                <div class="form-group">
                <label for="hora_inicio">Hora de Inicio</label>
                <input type="time" class="form-control" name="hora_inicio" id="hora_inicio">
                <small id="hora_inicioHelp" class="form-text text-muted">Diligencie hora de Inicio</small>
                </div>

                    <div class="form-group">
                    <label for="hora_fin">Hora de Finalización</label>
                    <input type="time" class="form-control" name="hora_fin" id="hora_fin" required>
                    <small id="hora_finHelp" class="form-text text-muted">Diligencie hora de Finalización</small>
                    </div>
                    <div class="form-group">
            
                <label for="ambiente">Ambiente</label>
                <input type="text" class="form-control" name="ambiente" id="ambiente" required onblur="validatePassword()">
                <small id="ambienteHelp" class="form-text text-muted">Digite el Ambiente</small>
                </div>
            
                    <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
                    <small id="fecha_inicioHelp" class="form-text text-muted">Diligencie Fecha de Inicio</small>
                    </div>
            
                <div class="form-group">
                <label for="fecha_fin">Fecha Final</label>
                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required>
                <small id="fecha_finHelp" class="form-text text-muted">Diligencie Fecha Final</small>
                </div>
            
            
            <input type="submit" class="btn btn-primary" value="Guardar">       
            </form>
            </div>
            </div>
     
    
     <?php require 'views/footer.php'; ?>
    
     </body>
</html>