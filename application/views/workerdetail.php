        <?php 
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d", strtotime($date));
        $cond = false;
        $mes = date("m", strtotime($fecha));
        $year = date("Y", strtotime($fecha));
        $cdias = date("t", strtotime($fecha));
        foreach ($regw->result() as $key) {
        if ($cond == false) {?>
        		<div class="form-horizontal">
        	<div class="form-group">
    			<label class="col-sm-2 control-label">Nombre</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="mesT" value="<?php echo $key->nombre." ".$key->apellido_paterno." ".$key->apellido_materno; ?>" disabled="true">
    			</div>
  			</div>
  			<div class="form-group">
    			<label class="col-sm-2 control-label">Rut</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="mesU" value="<?php echo $key->rut; ?>" disabled="true">
    			</div>
  			</div>
  			<div class="form-group">
    			<label class="col-sm-2 control-label">Obra</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="mesC" value="<?php echo $key->nombre_obra ?>" disabled="true">
      				<input type="hidden" class="form-control" id="mesuid" value="" disabled="true">
    			</div>
  			</div>
      </div>
        	<?php $cond = true; }?>		
        
  			<?php }?>
  			<table class="table table-bordered">
  				<thead>
  					<tr>
  						<?php 
              $whours = 0;
              foreach ($dias as $k => $v) {?>
  							<td><?php echo $v ?></td>
  						<?php } ?>
  					</tr>
  				</thead>
  				<tbody>
  					<?php  $cond2 = false;$cnd = false;
              $qty = 0;
  					 for ($i=1; $i <= $cdias ; $i++) {
              
  					 	$dayn = 0;
  					 	if ($i < 10) {
  					 		$dayn = "0".$i;
  					 	}else{
  					 		$dayn = $i;
  					 	}?>
  					 	<?php
  					 	$nfecha = date("Y-m-d", strtotime($year."-".$mes."-".$dayn));
              $dateday = date("d", strtotime($nfecha));
  					 	$ndfecha = date("N", strtotime($nfecha));?>
                
  					 	<?php 
                if ($cnd == false) {?>
                  <tr>
                <?php $cnd = true; }
  					 		for ($z=1; $z <= 7 ; $z++) {

  					 			if ($z == $ndfecha) {
                    $c = false;
                    foreach ($regw->result() as $key) {
                      
                        $regdate = date("Y-m-d", strtotime($key->fecha));
                        if ($regdate == $nfecha) {?>
                          <td height="" style="background-color: green;" class="tdReg"><p class="ptdd top-p"><?php echo $dateday ?></p>
                          <p class="ptdd">E :<?php echo $key->entrada ?></p>
                          <p class="ptdd bot-p">S :<?php echo $key->salida ?></p>
                        </td>
                        <?php
                        $sum = $key->salida - $key->entrada;
                        $whours += $sum;
                         $c=true; break; }?>
                                 
                       <?php 
                    }
                    if ($c == false) {?>
                                <td class="tdReg"><?php echo $dateday ?></td>
                              <?php }
                    ?>
  					 				
  					 			<?php
  					 			$cond2 = true;
  					 			break;
  					 			}else{
  					 				if ($cond2 == false) {?>
  					 					<td class="tdReg"></td>
  					 				<?php $qty++; }
  					 			}
  					 		
  					 		}
  					 		if ($qty == 6) {
                  $qty = 0;
                  $cnd == false;?>
                </tr>
                <?php  }else{
                  $qty++;
                }
  					 		
  					 		
  					 	 ?>
                
              <?php
              
              ?>
  					 	
  					 	 
  						
  					<?php  } ?>
  				</tbody>
  			</table>
<div class="form-horizontal">
          <div class="form-group">
          <label class="col-sm-4 control-label">Horas trabajadas</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" id="wh" value="<?php if ($whours<0) {
                echo "0 horas trabajadas.";
              }else{
                echo $whours." horas trabajadas.";
              } ?>" disabled="true">
          </div>
        </div>
        
      </div>