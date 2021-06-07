<?php

include "conexion.php";
$user_id=null;
$busqueda2= "select * from invex where campana like '%$_GET[s]%' or panoramix like '%$_GET[s]%' or carrier like '%$_GET[s]%' or ip like '%$_GET[s]%' or estatus like '%$_GET[s]%' ";
//$busqueda = pg_query($dbconn3, "select * from invex where campana like '%$_GET[s]%' or panoramix like '%$_GET[s]%' or carrier like '%$_GET[s]%' or ip like '%$_GET[s]%' or estatus like '%$_GET[s]%' ";
//$query = $con->query($sql1);
$busqueda = pg_query($dbconn3,$busqueda2);
?>

<?php if(pg_num_rows($busqueda) > 0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Campana</th>
	<th>Panormaix</th>
	<th>Carrier</th>
	<th>Ip</th>
	<th>Estatus</th>
	<th></th>
</thead>
<?php while ($r=pg_fetch_array($busqueda)):?>
<tr>
	<td><?php echo $r["campana"]; ?></td>
	<td><?php echo $r["panoramix"]; ?></td>
	<td><?php echo $r["carrier"]; ?></td>
	<td><?php echo $r["ip"]; ?></td>
	<td><?php echo $r["estatus"]; ?></td>
	<td style="width:150px;">
		<a data-id="<?php echo $r["id"];?>" class="btn btn-edit btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["id"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
$("#del-"+<?php echo $r["id"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				$.get("./php/eliminar.php","id="+<?php echo $r["id"];?>,function(data){
					loadTabla();
				});
			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>

  <!-- Modal -->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("./php/formulario.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#editModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->