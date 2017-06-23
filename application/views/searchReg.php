<div class="sfCont">
<div class="form-group">
    <label for="exampleInputEmail1">Obra</label>
    <select class="form-control" id="slobra">
        <option value="">Seleccione..</option>
        <?php foreach ($obras->result() as $items){?>
        <option value="<?php echo $items->id_obra ?>"><?php echo $items->nombre_obra ?></option>
        <?php } ?>
    </select>
  </div>
    <div class="form-group">
        <label>Año</label>
        <select class="form-control" id="slaño" onchange="loadMonths()">
            <option value="">Seleccione..</option>
            <?php foreach ($años as $key => $value) {?>
            <option value="<?php echo $value ?>"><?php echo $value ?></option>
           <?php  } ?>
        </select>
    </div>
    <div class="form-group" id="meses">
        
    </div>
</div>
<div id="aCont">
    
</div>

