<select class="form-control" id="slmes" onchange="loadAS()">
            <option value="">Seleccione..</option>
            <?php foreach ($meses as $key => $value) {?>
            <option value="<?php echo $key ?>"><?php echo $value ?></option>
           <?php  } ?>
        </select>

