<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from invex where id = ".$_GET["id"];
//$query = $con->query($sql1);
$query = pg_query($dbconn3,$sql1);
$frio= null;
if(pg_num_rows($query) > 0){
while ($r=pg_fetch_object($query)){
  $frio=$r;
  break;
        }
    }
?>

<?php if($frio!=null):?>

<form role="form" id="actualizar" >
  <div class="form-group">
    <label for="campana">Campana</label>
    <input type="text" class="form-control" value="<?php echo $frio->campana; ?>" name="campana" required>
  </div>
  <div class="form-group">
    <label for="pano">Panoramix</label>
    <input type="text" class="form-control" value="<?php echo $frio->panoramix; ?>" name="pano" required>
  </div>
  <div class="form-group">
    <label for="car">Carrier</label>
    <input type="text" class="form-control" value="<?php echo $frio->carrier; ?>" name="car" required>
  </div>
  <div class="form-group">
    <label for="ip">Ip</label>
    <input type="text" class="form-control" value="<?php echo $frio->ip; ?>" name="ip" >
  </div>
  <div class="form-group">
    <label for="esta">Estatus</label>
    <input type="text" class="form-control" value="<?php echo $frio->estatus; ?>" name="esta" >
  </div>
<input type="hidden" name="id" value="<?php echo $frio->id; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./php/actualizar.php",$("#actualizar").serialize(),function(data){
    });
    swal("Actualizado exitosamente!");
    //$("#actualizar")[0].reset();
    $('#editModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();
    loadTabla();
  //location.reload();
  });
</script>

<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>