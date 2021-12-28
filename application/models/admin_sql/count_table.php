<?php
require_once ('application/models/admin_sql/conn.php');

$row_persons = null;
if ($result = $conn->query("SELECT *FROM persona")) {

	/* determinar el número de filas del resultado */
	$row_persons = $result->num_rows;
}

$row_family = null;
if ($result = $conn->query("SELECT *FROM hogar")) {

	/* determinar el número de filas del resultado */
	$row_family = $result->num_rows;
}

$row_extremopobre = null;
if ($result = $conn->query("SELECT *FROM hogar WHERE cse = '3'")) {

	/* determinar el número de filas del resultado */
	$row_extremopobre = $result->num_rows;
}
$row_pobre = null;
if ($result = $conn->query("SELECT *FROM hogar WHERE cse = '2'")) {

	/* determinar el número de filas del resultado */
	$row_pobre = $result->num_rows;
}

$row_nopobre = null;
if ($result = $conn->query("SELECT *FROM hogar WHERE cse = '1'")) {

	/* determinar el número de filas del resultado */
	$row_nopobre = $result->num_rows;
}
