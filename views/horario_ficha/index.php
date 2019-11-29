<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Horario</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Listado de Horarios</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th  scope="col">Ficha</th>
                    <th  scope="col">Documento</th>
                    <th  scope="col">Jornada</th>
                    <th  scope="col">Dias</th>
                    <th  scope="col">Hora de Inicio</th>
                    <th  scope="col">Hora Fin</th>
                    <th  scope="col">Ambiente</th>
                    <th  scope="col">Fecha Inicio</th>
                    <th  scope="col">Fecha Fin</th>
                    <th  scope="col" colspan="2">Acciones</th>
                    
                </tr>
        </thead>

                        <tbody id="tbody-data">
           
        <?php
            include_once 'models/horario_fichadao.php';
            if(count($this->horarios)>0){
                
                foreach ($this->horarios as $horario) {
                    $nficha = new Horario_fichaDAO();
                    $nficha = $horario;
                    $i=0;
        ?>
        
            <tr id="fila-<?php echo $i; ?>">
                <td><?php echo $nficha->ficha_nroficha; ?></td>
                        <td><?php echo $nficha->instructor_documento; ?></td>
                        <td><?php echo strtoupper($nficha->sesion_jornada); ?></td>
                        <td><?php echo $nficha->dia; ?>
                        <td><?php echo $nficha->hora_inicio; ?>
                        <td><?php echo $nficha->hora_fin; ?>
                        <td><?php echo $nficha->ambiente; ?>
                        <td><?php echo $nficha->fecha_inicio; ?>
                        <td><?php echo $nficha->fecha_fin; ?>
                        <td><a href="<?php echo constant('URL') . 'horario_ficha/leer/'.$nficha->ficha_nroficha.'/'.$nficha->instructor_documento.'/'.$nficha->sesion_jornada.'/'.$nficha->dia; ?>">Actualizar</a></td>
                        <td><button class="bEliminar2" data-id='<?php echo $i;?>' data-controlador="horario_ficha" data-accion="eliminar" data-key="<?php echo $nficha->ficha_nroficha.'/'.$nficha->instructor_documento.'/'.$nficha->sesion_jornada.'/'.$nficha->dia; ?>">Eliminar</button></td>
            </tr>
        <?php  
                    $i+=1;
                }
            }else{
        ?>
            <tr><td colspan="11" class="text-center">NO HAY HORARIOS DISPONIBLES</td></tr>
        <?php    
            }
        ?>
            </tbody>
        </table>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>