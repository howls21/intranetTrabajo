<div class="col-md-10">
    <form action="<?php echo base_url() ?>index.php/controller/uploadTest" method="post" name="formuw" enctype="multipart/form-data" class="form-horizontal" onSubmit="return formVal()">
        <div class="form-group">
            <label class="col-md-4 control-label">Seleccione Obra</label>
            <div class="col-md-4">
                <select name="obra" id="obra" class="form-control">
                    <option>Seleccione..</option>
                    <?php
                    if ($data != NULL) {
                        foreach ($data->result() as $items) {
                            ?>
                            <option value="<?php echo $items->nombre_obra ?>"><?php echo $items->nombre_obra ?></option>
                    <?php }
                    } ?>
                </select>
                
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Seleccione Trabajador</label>
            <div class="col-md-4">
                <select name="worker" id="worker" class="form-control" onchange="searchState()">
                    <option>Seleccione..</option>
                    <?php
                    if ($data2 != NULL) {
                        foreach ($data2->result() as $items) {
                            ?>
                            <option value="<?php echo $items->rut ?>"><?php echo $items->nombre . " " . $items->apellido_paterno . " " . $items->apellido_materno ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
        </div>
        <div class="form-group" id="workerState">
            <label class="col-md-4 control-label">Seleccione Estado</label>
            <div class="col-md-4">
                <select name="estado" class="form-control">
                    <option value="">Seleccione..</option>
                   <option value="trabajando">Trabajando</option>
                   <option value="finiquitado">Finiquitado</option>
                   <option value="pendiente">Pendiente</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6">
                <input type="file" name="filesToUpload[]" id="filesToUpload" class="form-control col-md-offset-4" multiple=""/> 
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
                <input type="submit" value="Subir archivo" class="btn btn-default col-md-offset-6"/> 
            </div>
        </div>
        <script>
        function formVal(){
    
    
}
        </script>

    </form>
</div>

