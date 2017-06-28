<div class="jumbotron">
    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-md-4 control-label">Seleccione Trabajador</label>
            <div class="col-md-4">
                <select id="rut" class="form-control">
                    <option value="">Seleccione..</option>
                    <?php
                    if ($data2 != NULL) {
                        foreach ($data2->result() as $items2) {
                            ?>
                            <option value="<?php echo $items2->rut ?>"><?php echo $items2->nombre." ".$items2->apellido_paterno." ".$items2->apellido_materno?></option>
    <?php }
} ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Seleccione Obra</label>
            <div class="col-md-4">
                <select id="obra" class="form-control">
                    <option value="">Seleccione..</option>
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
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
                <input type="submit" value="Buscar" class="form-control btn-info" onclick="showFilesWorker()"/>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8" id="showFiles2">

</div>