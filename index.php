<?php
// Obtenemos la cedula de la URL
$fechaActual = date("Y-m-d");
$filtro = array(
    "desde" => isset($_GET['desde']) ? $_GET['desde']:'0',
    "hasta" => isset($_GET['hasta']) ? $_GET['hasta']:$fechaActual,
    "id" => isset($_GET['id']) ? $_GET['id']:'0',
);

// Importamos las plantillas
require_once 'templates/plantillas.php';
$plantilla = new plantillas();

require_once 'database/database.php';
$db = new database();
$conn = $db->conn;

/**
 * Lo que hago aqui es que si los campos de filtro (desde) estan
 * vacios muestro todos los articulos, en caso contrario solo muestro 
 * los articulos que coinciden
 */

// filtro por fecha
if($filtro['desde'] != 0){
 echo 'Me ejecute 1';
    require_once 'vistas/m_articulos.php';
    listar($conn, $filtro);

}if($filtro['id'] != 0){
 echo 'Me ejecute 2';
    require_once 'vistas/m_articulo.php';
    ver($conn, $filtro);

}if($filtro['desde'] == 0 && $filtro['id'] == 0){
 echo 'Me ejecute 3';
    require_once 'vistas/m_articulos.php';
    listar($conn, NULL);
}


$plantilla->encabezado();
// Plantilla pie de pagina 
$plantilla->pie_pagina();
?>
