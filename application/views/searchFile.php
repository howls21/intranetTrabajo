<div class="jumbotron">
<div class="form-horizontal">
        <div class="form-group">
            <label class="col-md-4 control-label">Seleccione Obra</label>
            <div class="col-md-4">
            <select id="nameObra" class="form-control">
                <option>Seleccione..</option>
                 <?php
                   if($data != NULL){
                     foreach ($data->result() as $items){ ?>
                      <option value="<?php echo $items->nombre_obra?>"><?php echo $items->nombre_obra?></option>
                 <?php }} ?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Seleccione Categoria</label>
            <div class="col-md-4">
            <select id="cat" class="form-control">
                <option>Seleccione..</option>
                <option value="vacaciones">Vacaciones</option>
                <option value="detallepago">Detalle Pago</option>
                <option value="finiquito">Finiquito</option>
            </select>
            </div>
        </div>
        <div class="form-group">
             <label class="col-md-4 control-label">Ingrese Año</label>
             <div class="col-md-4">
             <input type="text" class="form-control" name="year" id="year" onkeypress="numberValidation()" maxlength="4" onblur="yearValidation()"/><br>
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
             <input type="submit" value="Buscar" class="form-control btn-info" onclick="showFiles()"/>
            </div>
        </div>
</div>
</div>
<div class="col-md-8" id="showFiles2">
    
</div>
 

