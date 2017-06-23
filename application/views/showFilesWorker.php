<?php
$this->load->helper('download');
$lista = null;
$flag = FALSE;
$stringUrl = "C:/subidas/trabajadores/$rut/$obra/";
if (!file_exists($stringUrl)) {
    
} else {
    $directorio = opendir($stringUrl);
    $flag = TRUE;
}
if (!$flag) {
    echo "No se encontraron archivos!";
} else {
    if ($estado != "") {
        ?>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-4 control-label">El trabajador:</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"  value="<?php echo $trabajador ?>" readonly="true"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"> en la obra:</label>
                <div class="col-md-4">
                    <input type="text" class="form-control"  value="<?php echo $obra ?>" readonly="true"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"> se encuentra en estado:</label>
                <div class="col-md-4">
                    <input type="text" class="form-control"  value="<?php echo $estado ?>" readonly="true"/>
                </div>
            </div>
        </div><?php } ?>
    <table class="table table-bordered">
        <tr><td class="table-headers">Nombre archivo</td><td></td></tr>
        <?php
        while ($elemento = readdir($directorio)) {
            if (is_dir($stringUrl . $elemento)) {
                
            } else {
                ?>
        <tr><td><a href="#" style="color: black"><?php echo $elemento ?></a></td>
                    <td>
                        <form action="<?php echo base_url() ?>index.php/controller/download2" method="post">
                            <input type="text" id="nombre" name="nombre" hidden="true" value="<?php echo $elemento ?>">
                            <input type="text" id="url" name="url" hidden="true" value="<?php echo $stringUrl ?>">
                        <input type="submit" value="Descargar"/></td>  
                    </form> 
                </tr>
                <?php
            }
        }
        ?>
    </table>
<?php } ?>
