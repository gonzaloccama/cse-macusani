<?php
require_once ('application/models/admin_sql/conn.php');
$no_ficha_ = $_GET['no_ficha_'];
$sql_s = "SELECT d.id_direccion, d.direccion, b.barrio, c.ciudad, d.fecha_registro, d.no_ficha 
									FROM direccion AS d 
									INNER JOIN barrio AS b
										ON d.barrio = b.id_barrio 
									INNER JOIN ciudad AS c
										ON d.ciudad = c.id_ciudad
									WHERE d.no_ficha = '$no_ficha_'";

$result_d = $conn->query($sql_s);

$sql_c = "SELECT h.no_ficha, c.cse 
								FROM hogar AS h 
								INNER JOIN cse AS c 
									ON h.cse = c.id_cse 
								WHERE h.no_ficha = '$no_ficha_'";


//					print_r($result_s->fetch_assoc());

$cse_cse = $conn->query($sql_c)->fetch_assoc()['cse'];





$sql_cs = "SELECT h.no_ficha, c.cse FROM hogar AS h INNER JOIN cse AS c ON h.cse = c.id_cse WHERE h.no_ficha = '$no_ficha_'";
$cse_cse = $conn->query($sql_cs)->fetch_assoc()['cse'];

$sql_cs = "SELECT h.no_ficha, c.ciudad FROM hogar AS h INNER JOIN ciudad AS c ON h.ciudad = c.id_ciudad WHERE h.no_ficha = '$no_ficha_'";
$ciudad = $conn->query($sql_cs)->fetch_assoc()['ciudad'];

$sql_cs = "SELECT h.no_ficha, b.barrio FROM hogar AS h INNER JOIN barrio AS b ON h.barrio = b.id_barrio WHERE h.no_ficha = '$no_ficha_'";
$barrio = $conn->query($sql_cs)->fetch_assoc()['barrio'];


$sql_c = "SELECT *FROM hogar";
$resulthogar = $conn->query($sql_c);
$hogar = $resulthogar->fetch_assoc();
