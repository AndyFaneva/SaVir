<?php
$server="localhost";
$utilisateur="root";
$password="";
$dbname="mon_bdd";
try{
    $con = new PDO("mysql:host=$server;dbname=$dbname",$utilisateur,$password);
}
catch(PDOException $e){
    echo "erreur".$e->getMessage();
}
?>