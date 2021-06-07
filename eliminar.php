<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

if(!empty($_GET)){
			include "conexion.php";
			
			//$sql = "DELETE FROM invex WHERE id=".$_GET["id"];
			//$query = $con->query($sql);
			$eliminar = pg_query($dbconn3, "DELETE FROM invex WHERE id=".$_GET["id"]);
			if($eliminar!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../ver.php';</script>";
			//swal("Eliminado Exitosamente");
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../ver.php';</script>";

			}
}

?>