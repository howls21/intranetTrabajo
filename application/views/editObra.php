  <div class="jumbotron">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4"> 
        <?php if ($cantidad == 0): ?>
         <p>No hay Obras Almacenadas!</p>
       <?php else: ?>
         <h2>Lista de Obras</h2><br>
         <div class="table-responsive" id="tobrac">
           <table class="table" id="tableObras">
             <th>Nombre</th>
             <?php $i = 0; foreach ($resultado as $fila):?>
             <tr>
               <td><?php echo $fila->nombre_obra ?></td>
               <td>
                 <button id="editar<?php echo $i ?>" class="btn btn-sm btn-default" onclick="editObra('<?php echo $i ?>')" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</button>

                   <div class="modal fade bs-example-modal-sm" id="editObraModal<?php echo $i ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                          <h5 class="modal-title"><label>Editar Obra</label></h5>
                        </div>
                        <div class="modal-body">
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Nombre</span>
                            <input  id="inNameObra<?php echo $i ?>" class="form-control" value="<?php echo $fila->nombre_obra ?>" onkeypress="return soloLetras(event)"  autofocus/>
                          </div>
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
               <button id="eliminar<?php echo $i ?>" onclick="showDeleteObra(<?php echo $fila->id_obra ?>)" class="btn btn-sm btn-danger">
                 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
               </td>
             </tr>
             <?php $i++; endforeach; ?>
           </table>
         </div>
       <?php endif; ?>
     </div>
     <input type="hidden" id="oculto" value="<php echo $i ?>"/>
<div class="modal fade" tabindex="-1" role="dialog" id="ModalDelObra">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Eliminar Obra</h4>
        </div>
        <div class="modal-body">
          <div class="form-horizontal">
            <p class="passTl">Para confirmar Ingrese su contraseña!</p>
          <div class="form-group" id="passCont">
            <label class="col-sm-4 control-label">Contraseña</label>
            <div class="col-sm-8" id="ecErrorP2">
                <input type="password" class="form-control" id="mepPass2" onblur="passVer2(this.value)">
                <input type="hidden" id="ecpass2" value="" disabled="true">
                <span id="ecspanE2" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
              <span id="inputError2Status" class="sr-only">(error)</span>
              <span id="ecspanS2" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
              <span id="inputSuccess2Status" class="sr-only">(success)</span>
            </div>
          </div>
          <input type="hidden" id="oid" value="" disabled="true">
        </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="deleteObra()">Eliminar</button>
        </div>
      </div>
    </div>
    </div>