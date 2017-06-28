<div class="jumbotron">
<div class="row">
<div class="col-md-4">
  
</div>
<div class="col-md-4">
<div class="form-group">
    <label for="exampleInputEmail1">Trabajador</label>
    <select class="form-control" id="slCC">
        <option value="">Seleccione..</option>
        <?php foreach ($worker->result() as $items){?>
        <option value="<?php echo $items->rut ?>"><?php echo $items->nombre." ".$items->apellido_paterno." ".$items->apellido_materno ?></option>
        <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Código de Tarjeta</label>
    <input type="text" class="form-control" id="idCC">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Obra</label>
    <select class="form-control" id="idobra">
        <option value="">Seleccione..</option>
        <?php foreach ($obras->result() as $items){?>
        <option value="<?php echo $items->id_obra ?>"><?php echo $items->nombre_obra ?></option>
        <?php } ?>
    </select>
  </div>  
    <button type="submit" class="btn btn-default" onclick="saveCard()">Guardar</button>
</div>
</div>
</div>
