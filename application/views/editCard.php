      <div class="jumbotron">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4"> 
            <?php if ($cantidad == 0): ?>
             <p>No hay Tarjetas Ingresadas!</p>
           <?php else: ?>
             <h2>Tarjetas NFC</h2><br>
             <div class="table-responsive">
               <table class="table" id="tableObras">
                 <th>Tarjeta</th>
                 <th>Trabajador</th>
                 <th>Obra</th>
                 <?php $i = 0; foreach ($resultado as $fila):?>
                 <tr>
                   <td><?php echo $fila->id_tarjeta ?></td>
                   <td><?php echo $fila->trabajador_rut ?></td>
                   <td><?php echo $fila->nombre_obra ?></td>
                   <td>
                     <button id="editar<?php echo $i ?>" class="btn btn-sm btn-default" onclick="editCard('<?php echo $i ?>',<?php echo $fila->id_obra ?>,'<?php echo $fila->trabajador_rut ?>')" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>

                     <div class="modal fade bs-example-modal-sm" id="editCardModal<?php echo $i ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h5 class="modal-title"><label>Editar Tarjeta NFC</label></h5>
                          </div>
                          <div class="modal-body">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Tarjeta</span>
                              <input  id="inIdTarjeta<?php echo $i ?>" class="form-control" value="<?php echo $fila->id_tarjeta ?>" maxlength="20"  autofocus/>
                            </div>
                           <select id="selectTrabajador">
                               <?php $e=0; foreach ($trabajadores as $fil):?>
                               <option value="<?php echo $fil->rut?>">
                                   <?php echo $fil->rut?>
                               </option>
                               <?php $e++; endforeach; ?>
                        </select>
                            <select class="btn btn-default dropdown-toggle" type="button" id="selectObra">
                                <?php $a=0; foreach($obras as $file):?>
                                <option value="<?php echo $file->id_obra ?>">
                                    <?php echo $file->nombre_obra ?>
                                </option>
                                <?php $a++; endforeach;?>
                            </select>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-success" onclick="editObraId(<?php echo $fila->id_obra ?>,<?php echo $i ?> )"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Editar</button>
                          <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td>
               <button id="eliminar<?php echo $i ?>" onclick="deleteObra(<?php echo $fila->id_obra ?>)" class="btn btn-sm btn-danger">
                 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
               </td>
             </tr>
             <?php $i++; endforeach; ?>
           </table>
           <!--         </div>-->
         <?php endif; ?>
       </div>
       <input type="hidden" id="oculto" value="<php echo $i ?>"/>
