<div class="jumbotron">
<div class="row">
<div class="modal-back" id="modal-back">
    
</div>
<div class="col-md-10" id="addObraBack">
    <div class="form-horizontal">
        <div class="form-group">
            <label for="inputEmail3" class="col-md-4 control-label">Nombre de obra</label>
            <div class="col-md-5">
                <input type="text" id="nombreObra"  class="form-control" placeholder="Nombre Obra" maxlength="30" onkeypress="return soloLetras(event)">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-7 col-md-4">
                <button class="btn btn-default" onclick="saveObra()">Guardar</button>
            </div>
        </div>
    </div>
    <div class="col-md-offset-4 col-md-5">
        <div id="tobrasc">
        <table id="table-obra" class="table table-bordered">
            <tr><th class="table">Obras</th></tr>
            <?php
            if ($data != NULL) {
                foreach ($data->result() as $items) {
                    ?>
            <tr><td class="bg-info" id="tdObra"><?php echo $items->nombre_obra ?></td>
    <?php }
} ?></tr>
        </table>
        </div>
    </div>
    </div>
</div>
</div>
