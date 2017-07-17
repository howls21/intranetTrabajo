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
               <button id="eliminar<?php echo $i ?>" onclick="deleteCard('<?php echo $fila->id_tarjeta ?>')" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
               </td>
             </tr>
             <?php $i++; endforeach; ?>
           </table>
           <!--         </div>-->
         <?php endif; ?>
       </div>
       <input type="hidden" id="oculto" value="<php echo $i ?>"/>
