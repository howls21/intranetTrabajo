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
               <button id="eliminar<?php echo $i ?>" onclick="showDeleteCard('<?php echo $fila->id_tarjeta ?>')" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
               </td>
             </tr>
             <?php $i++; endforeach; ?>
           </table>
           <!--         </div>-->
         <?php endif; ?>
       </div>
       <input type="hidden" id="oculto" value="<php echo $i ?>"/>
<div class="modal fade" tabindex="-1" role="dialog" id="ModalDelCard">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Eliminar Tarjeta</h4>
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
          <input type="hidden" id="cardid" value="" disabled="true">
        </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="deleteCard()">Eliminar</button>
        </div>
      </div>
    </div>
    </div>