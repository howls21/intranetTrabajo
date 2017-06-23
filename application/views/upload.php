<form action="<?php echo base_url()?>index.php/controller/uploadFile" method="post" enctype="multipart/form-data">
    <div class="col-md-8">
        <div class="form-group">
        <label>Nombres</label><input class="form-control" type="text" placeholder="Nombres" name="nombreT" style="float: left"/>
        </div>
    
     <div class="form-group">
         <label>Apellido Paterno</label><div class="col-md-6"><input type="text" placeholder="Paterno" name="apellidoP"/></div>
     </div>
    <label>Apellido Materno</label>   <input type="text" placeholder="Materno" name="apellidoM"/>
    <select name="select">
        <option>Seleccione Obra..</option>
        <?php
            if($data != NULL){
            foreach ($data->result() as $items){ ?>
        <option value="<?php echo $items->nombre_obra ?>"><?php echo $items->nombre_obra ?></option>
                
            <?php }} ?>
 
    </select>
    <input type="file" name="archivo" id="archivo"></input>
    <input type="submit" value="Subir archivo"></input>
    </div>
</form>


