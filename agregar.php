<?php

if(!empty($_POST)){
	if(isset($_POST["campana"]) &&isset($_POST["pano"]) &&isset($_POST["car"]) &&isset($_POST["ip"]) &&isset($_POST["esta"])){
		if($_POST["campana"]!=""&& $_POST["pano"]!=""&&$_POST["car"]!=""){
			include "conexion.php";
			
			//"insert into invex(campana,panoramix,carrier,ip,estatus) value ($_POST["campana"],$_POST["pano"],$_POST["car"],$_POST["ip"],$_POST["esta"])";
$query = pg_query($dbconn3 , "INSERT INTO invex (campana,panoramix,carrier,ip,estatus) VALUES ('" . pg_escape_string($_POST['campana']) . "','" . pg_escape_string($_POST['pano']) . "','" .  pg_escape_string ($_POST['car']) . "','" . pg_escape_string ($_POST['ip']) . "','" . pg_escape_string ($_POST['esta']) . "')");
			//var_dump($sql);
			//$query = $con->query($sql);
			//$query = pg_query($dbconn3,$sql);
			//echo $query;
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../ver.php';</script>";
				
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>