<?php
$serveur = "localhost";
$user = "root";
$pwd = "";
$bdd1 ="books";

$connectBooks = new mysqli ($serveur,$user,$pwd,$bdd1) or die (mysqli_error($connectBooks));
/* Modification du jeu de résultats en utf8mb4 */
$connectBooks->set_charset("utf8mb4");
?>