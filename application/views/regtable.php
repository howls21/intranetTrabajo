<div class="modal fade" tabindex="-1" role="dialog" id="ModalWorkerD">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detalle Trabajador</h4>
      </div>
        <div class="modal-body" id="wdetailc">
            
        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="saveES()">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>


<?php $var = 0; 
foreach ($reg->result() as $item){
    $var++;
}

if($var != 0){ ?>
<table class="table">
    <thead>
        <tr>
            <th>nombre</th>
            <th>rut</th>
            <th>obra</th>
            <th>dias trabajados</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $r = NULL;$cond = false;
        $nombre = null; $obra = null;
        foreach ($reg->result() as $items){
            $num = 0;
            if(!$cond){
            foreach($reg->result() as $it){
                if($it->rut == $items->rut){
            $num++;}$cond = true;}}
            if($r != $items->rut){?>
        <tr><td> <?php echo $items->nombre." ".$items->apellido_paterno." ".$items->apellido_materno ?> </td>
            <td> <?php echo $items->rut ?> </td><td> <?php echo $items->nombre_obra ?> </td><td> <?php echo $num ?> </td>
            <td><button class="btn btn-default" onclick="showDet('<?php echo $items->rut; ?>')">Detalle</button></td>
        </tr>
         <?php $r = $items->rut;  }?>
      <?php  $cond = false;  } ?>
    </tbody>
</table>
<?php }else{ ?>
<h2 style="margin: auto">¡No existen registros!</h2>
<?php }