<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Resultados</title>
</head>

<body>
    <?php //print_r($imagenes)?>
<form action="<?php echo site_url('examen/up_images');?>" enctype="multipart/form-data" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="500000000" />
<?php if ( isset($errores) and count($errores)>0):?>
<table>
 <?php foreach ($errores as $img=>$err):?>
          <tr>
            <td ><?php echo $img; ?>&nbsp;</td>
           
            <td ><?php echo $errores[$img]["error"]; ?> &nbsp;</td>
          </tr>
    <?php  endforeach;?> 
</table>
<?php else: ?>
<p>Imagenes Correctas</p>
<table>
    <?php foreach ($imagenes as $img):?>
          <tr>
            <td >imagen</td>
            <td ><?php 
            
            echo substr($img->imagen,strlen(UPLOAD_DIR)+1,  strlen($img->imagen)); 
            
            ?> &nbsp;</td>
          </tr>
    <?php  endforeach;?> 
</table>
    
<?php 
endif;
?>
</form>
</body>
</html>
