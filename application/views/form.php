<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Resultados</title>
</head>

<body>
<form action="<?php echo site_url('examen/up_images');?>" enctype="multipart/form-data" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="500000000" />
<table width="429" height="186" >
  <tr>
    <td width="125">Imagen 1&nbsp;</td>
    <td width="288"><input type="file" name="fulp[]" id="fulp" />&nbsp;</td>
  </tr>
  <tr>
    <td>Imagen 2&nbsp;</td>
    <td><input type="file" name="fulp[]"  />&nbsp;</td>
  </tr>
  <tr>
    <td>Imagen 3&nbsp;</td>
    <td><input type="file" name="fulp[]"  />&nbsp;</td>
  </tr>
  <tr>
    <td height="33">Imagen 4&nbsp;</td>
    <td><input type="file" name="fulp[]"  />&nbsp;</td>
  </tr>
   <tr>
    <td height="33" colspan="2"><input name="" type="submit" /></td>
   
  </tr>
</table>

</form>
</body>
</html>
