<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Instructores</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Listado de Instructores</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th  scope="col"> Documento</th>
                    <th  scope="col">Nombres</th>
                    <th  scope="col">Apellidos</th>
                    <th  scope="col">Email</th>
                    <th  scope="col">Celular</th>
                    <th  scope="col" colspan="2">Acciones</th>
                    
                </tr>
            </thead>

            <tbody id="tbody-data">
            
        <?php
            include_once 'models/instructordao.php';
            if(count($this->instructores)>0){
                foreach ($this->instructores as $instructor) {
                    $ins = new instructorDAO();
                    $ins = $instructor;
        ?>
                    <tr id="fila-<?php echo $ins->documento; ?>">
                        <td><?php echo $ins->documento; ?></td>
                        <td><?php echo $ins->nombres; ?></td>
                        <td><?php echo $ins->apellidos; ?></td>
                        <td><?php echo $ins->email; ?>
                        <td><?php echo $ins->celular; ?>
                        <td><a href="<?php echo constant('URL') . 'instructor/leer/' . $instructor->documento; ?>">Actualizar</a></td>
                        <td><button class="bEliminar" data-controlador="instructor" data-accion="eliminar" data-id="<?php echo $ins->documento; ?>">Eliminar</button></td> 
                    </tr>
        <?php   
                } 
            }else{
        ?>
            <tr><td colspan="7" class="text-center">NO SE ENCONTRARON INSTRUCTORES</td></tr>
        <?php    
            }
        ?>
            </tbody>
        </table>
         <!-- <button type="button" class="btn btn-primary" onClick='window.location.assign("<?php echo constant('URL'); ?>/programa/crear")'>Crear Programa</button> -->
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>