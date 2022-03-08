<?php
$serveur = "localhost";
$user = "root";
$pwd = "";
$bdd ="books";

$connectBooks = new mysqli ($serveur,$user,$pwd,$bdd) or die (mysqli_error($connectBooks));
/* Modification du jeu de résultats en utf8mb4 */
$connectBooks->set_charset("utf8mb4");
?>