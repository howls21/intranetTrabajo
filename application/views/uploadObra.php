<div id="uploadObraBack" class="jumbotron">
<form name="formObra" action="<?php echo base_url()?>index.php/controller/uploadObra" method="post" enctype="multipart/form-data" class="form-horizontal">
    
        <div class="form-group">
            <label class="col-md-4 control-label">Seleccione Obra</label>
            <div class="col-md-4">
            <select name="obra" id="fObra" class="form-control">
                <option value="">Seleccione..</option>
                 <?php
                   if($data != NULL){
                     foreach ($data->result() as $items){ ?>
                      <option value="<?php echo $items->nombre_obra?>"><?php echo $items->nombre_obra?></option>
                 <?php }} ?>
            </select>
            </div>
        </div>
    <div class="form-group">
         <label class="col-md-4 control-label">Seleccione Categoría</label>
         <div class="col-md-4">
             <select name="cat" id="fCat" class="form-control">
                 <option value="">Seleccione..</option>
                 <option value="vacaciones">vacaciones</option>
                 <option value="detallepago">Detalle Pago</option>
                 <option value="finiquito">Finiquito</option>
             </select>
         </div>
    </div>
    <div class="form-group">
         <label class="col-md-4 control-label">Ingrese Año</label>
         <div class="col-md-4">
             <input type="text" class="form-control" name="year" id="fyear" onkeypress="return soloNumeros(event)" maxlength="4" onblur="yearValidation()"/><br>
         </div>
    </div>    
    <div class="form-group">
        <label class="col-md-4 control-label">Seleccione Mes</label>
         <div class="col-md-4">
             <select name="month" id="fMonth" class="form-control">
                 <option value="">Seleccione..</option>
                 <option value="enero">Enero</option>
                 <option value="febrero">Febrero</option>
                 <option value="marzo">Marzo</option>
                 <option value="abril">Abril</option>
                 <option value="mayo">Mayo</option>
                 <option value="junio">Junio</option>
                 <option value="julio">Julio</option>
                 <option value="agosto">Agosto</option>
                 <option value="septiembre">Septiembre</option>
                 <option value="octubre">Octubre</option>
                 <option value="noviembre">Noviembre</option>
                 <option value="diciembre">Diciembre</option>
             </select>
         </div>
    </div>
    <div class="form-group">
         
         <div class="col-md-6">
             <input type="file" name="archivo" id="farchivo" class="form-control col-md-offset-4" multiple=""/> 
         </div>
    </div>
</form>
<div class="form-group">
         <label class="col-md-4 control-label"></label>
         <div class="col-md-4">
             <input type="submit" value="Subir archivo" class="btn btn-default col-md-offset-6" onclick="formVal()" /> 
         </div>
    </div>
</div>

