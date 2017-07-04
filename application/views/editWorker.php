  <div class="jumbotron">
    <?php if ($cantidad == 0): ?>
     <p>No hay Trabajadores Almacenados!</p>
   <?php else: ?>
     <h2>Lista de Trabajadores</h2><br>
     <div class="table-responsive">
       <table class="table" id="tableWorkers">
         <th>Rut</th>
         <th>Nombre</th>
         <th>Apellido Paterno</th>
         <th>Apellido Materno</th>
         <?php $i = 0; foreach ($resultado as $fila):?>
         <tr>
           <td><?php echo $fila->rut ?></td>
           <td><?php echo $fila->nombre ?></td>
           <td><?php echo $fila->apellido_paterno ?></td>
           <td><?php echo $fila->apellido_materno ?></td>
           <td>
             <button id="editar<?php echo $i ?>" onclick="editWorkerRut(<?php echo $fila->rut ?>)" class="btn btn-sm btn-block btn-default"
               data-toggle='modal' data-target='#editWorkerModal<?php echo $i ?>'><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>
               <div class="modal fade bs-example-modal-sm" id="editWorkerModal<?php echo $i ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                      <h5 class="modal-title"><label>Editar Trabajador</label></h5>
                    </div>
                    <div class="modal-body">
                      <label>Rut</label>
                      <input  id="inRutWorker" class="form-control" value="<?php echo $fila->rut ?>" disabled/><br>
                      <label>Nombre</label>
                      <input  id="inNameWorker" class="form-control" value="<?php echo $fila->nombre ?>" autofocus/><br>
                      <label>Apellido Paterno</label>
                      <input id="inApellidoPaterno" class="form-control" value="<?php echo $fila->apellido_paterno ?>" /><br>
                      <label>Apellido Materno</label>
                      <input id="inApellidoMaterno" class="form-control" value="<?php echo $fila->apellido_materno ?>" /><br>
                      <div class="alert alert-info">Si quieres editar el Rut, debes eliminar al trabajador y crearlo nuevamente!</div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-success" data-dismiss="modal" onclick="editWorkerRut('<?php echo $fila->rut ?>')"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Editar</button>
                      <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

            </td>
            <td>
             <button id="delete<?php echo $i ?>" onclick="deleteWorker('<?php echo $fila->rut ?>')" class="btn btn-sm btn-block btn-danger">
               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
             </td>
           </tr>
           <?php $i++; endforeach; ?>
         </table>
       </div>
     <?php endif; ?>
   </div>
   <input type="hidden" id="oculto" value="<php echo $i ?>"/>
