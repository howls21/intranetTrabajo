<?php if ($cantidad == 0): ?>
   <p>No hay Trabajadores Almacenados!</p>
 <?php else: ?>
   <h3>Lista de Usuarios</h3>
   <div class="table-responsive">
     <table class="table" id="tableUsers">
       <th>Nombre</th>
       <th>Apellido Paterno</th>
       <th>Apellido Materno</th>
       <th>Rut</th>
       <?php $i = 0; foreach ($resultado as $fila):?>
         <tr>
           <td><?php echo $fila->nombre ?></td>
           <td><?php echo $fila->apellido_paterno ?></td>
           <td><?php echo $fila->apellido_materno ?></td>
           <td><?php echo $fila->rut ?></td>
           <td>
             <button id='eliminar<?php echo $i ?>'
             onclick="delete_worker(<?php echo $fila->rut ?>)" class="btn btn-sm btn-default">
             <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
           </td>
           <td>
             <button id='editar<?php echo $i ?>'
               onclick="editWorkerRut(<?php echo $fila->rut ?>)" class="btn btn-sm btn-default"
               data-toggle='modal' data-target='#editWorkerModal'>
               <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
           </td>
         </tr>
         <?php $i++; endforeach; ?>
       </table>
     </div>
<?php endif; ?>
<input type="hidden" id="oculto" value="<php echo $i ?>"/>

  <div class="modal fade" id="editWorkerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h5 class="modal-title">Editar Trabajador</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <form class="form-signin">
                            <label>nombre</label>
                            <input  id="inNameWorker" class="form-control" placeholder="Ej: Roberto" autofocus/>
                            <label>Apellido Paterno</label>
                            <input id="inApellidoPaterno" class="form-control" placeholder="Ej: Nahuel" />
                            <label>Dirección</label>
                            <input id="inApellidoMaterno" class="form-control" placeholder="Ej: Pje 8 #230 SanClemente, Talca"/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal" onclick="addUser()"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Agregar Usuario</button>
                <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
