<?php

//if(!empty($_POST)){
	//if(isset($_POST["campana"]) &&isset($_POST["pano"]) &&isset($_POST["car"]) &&isset($_POST["ip"]) &&isset($_POST["esta"])){
		//if($_POST["campana"]!=""&& $_POST["pano"]!=""&&$_POST["car"]!=""){

			if (
    !isset($_POST["id"]) ||
    !isset($_POST["campana"]) ||
    !isset($_POST["pano"]) ||
		!isset($_POST["car"]) ||
		!isset($_POST["ip"]) ||
		!isset($_POST["esta"])
) 
{
    exit();
}
	include "conexion.php";
$id = $_POST["id"];
echo var_dump($id);
$campana = $_POST["campana"];
$pano = $_POST["pano"];
$car = $_POST["car"];
$ip = $_POST["ip"];
$esta = $_POST["esta"];
		
$query = pg_query($dbconn3 , "UPDATE invex SET campana = $campana , panoramix = $pano , carrier = $car , ip = $ip, esta = $esta WHERE campana = $campana;");
			$res = pg_update($db, 'post_log', $_POST, $data);
			if($query!=null){
				print "<script>alert(\"Actualizaexitosamentedo .\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";

			}
?>


