<?php
define ("DBHOST", "127.0.0.1"); 
define ("DBUSER", "root");
define ("DBPASS", "Tidoune0309!");
define ("DBNAME", "grandangle2");

$dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;
// $dsn = "mysql:dbname=".DBNAME."mysql:host=".DBHOST;

// try = if _ catch = else
try {
    $db = new PDO($dsn, DBUSER, DBPASS);
    $db->exec("SET NAMES utf8");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     // PDO::ATTR_DEFAULT_FETCH_MODE = Mode de recup par défaut de l'ensemble des objets de la BDD
    // PDO::FETCH_ASSOC = Mode de conversion en tableaux associatifs : noms des colonnes utilisés comme clés associatives associées à leurs valeurs 
}
catch(PDOException $e)
    {die("Erreur de connexion à la BDD".$e->getMessage());} 
    
?>