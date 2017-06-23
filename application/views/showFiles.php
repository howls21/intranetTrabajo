<?php
$this->load->helper('download');
$lista = null;
$flag = FALSE;
$stringUrl ="C:/subidas/obras/$obra/$cat/$year/";
if (!file_exists($stringUrl)){
   
}else{
    $directorio = opendir($stringUrl);
    $flag = TRUE;
}
if(!$flag){
    echo "No se encontraron archivos!";
}else{
?>
 
<table class="table table-bordered">
    <tr><td class="table-headers">Nombre archivo</td><td></td></tr>
<?php
while ($elemento = readdir($directorio)){
    if(is_dir($stringUrl.$elemento)){
    }else{?>
       <tr><td><a href="#" ><?php echo $elemento ?></a></td>
           <td>
                <form action="<?php echo base_url()?>index.php/controller/download2" method="post">
                   <input type="text" id="nombre" name="nombre" hidden="true" value="<?php echo $elemento?>">
                   <input type="text" id="url" name="url" hidden="true" value="<?php echo $stringUrl?>">
                   <input type="submit" value="Descargar"/></td>  
                </form> 
       </tr>
     <?php    
    }
}?>
 </table>
<?php }?>
