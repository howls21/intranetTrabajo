  <div class="jumbotron">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4"> 
        <?php if ($cantidad == 0): ?>
         <p>No hay Obras Almacenados!</p>
       <?php else: ?>
         <h2>Lista de Obras</h2><br>
         <div class="table-responsive">
           <table class="table" id="tableObras">
             <th>Nombre</th>
             <?php $i = 0; foreach ($resultado as $fila):?>
             <tr>
               <td><?php echo $fila->nombre_obra ?></td>
               <td>
                 <button id="editar<?php echo $i ?>" class="btn btn-sm btn-default"
                   data-toggle='modal' data-target='#editObraModal<?php echo $i ?>'><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>

                   <div class="modal fade bs-example-modal-sm" id="editObraModal<?php echo $i ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                          <h5 class="modal-title"><label>Editar Obra</label></h5>
                        </div>
                        <div class="modal-body">
                          <label>Nombre</label>
                          <input  id="inNameObra" class="form-control" value="<?php echo $fila->nombre_obra ?>" autofocus/>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-success" data-dismiss="modal" onclick="editObra(<?php echo $fila->id_obra ?>)"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Editar</button>
                          <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar</button>
                        </div>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
              </td>
              <td>
               <button id="eliminar<?php echo $i ?>" onclick="deleteObra(<?php echo $fila->id_obra ?>)" class="btn btn-sm btn-danger">
                 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
               </td>
             </tr>
             <?php $i++; endforeach; ?>
           </table>
         </div>
       <?php endif; ?>
     </div>
     <input type="hidden" id="oculto" value="<php echo $i ?>"/>
