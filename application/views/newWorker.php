
<div class="col-md-10">
    <form class="form-horizontal" action="<?php echo base_url()?>index.php/controller/saveNewWorker" method="post">
        <div class="form-group">
            <label class="col-md-4 control-label">Nombre</label>
            <div class="col-md-5">
                <input type="text" id="workerName" name="workerName" class="form-control" placeholder="Nombre.." maxlength="30">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Apellido Paterno</label>
            <div class="col-md-5">
                <input type="text" id="workerLastame1" name="workerLastname1" class="form-control" placeholder="Apellido Paterno.." maxlength="15">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Apellido Materno</label>
            <div class="col-md-5">
                <input type="text" id="workerLastame2" name="workerLastname2" class="form-control" placeholder="Apellido Materno.." maxlength="15">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Rut</label>
            <div class="col-md-5">
                <input type="text" id="rutWorker" name="rutWorker" class="form-control" value="" onkeypress="rutValidation()" maxlength="12"/><br>
            <script>
              $('#rutWorker').Rut({
              on_error: function(){ alert('Rut incorrecto'); },
              format_on: 'keyup'
            });
          </script>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-5">
                <button class="btn btn-default col-md-offset-6">Guardar</button>
            </div>
        </div>
    </form>
</div>

