<?php
header('Content-Type: application/json');


$dsn = 'mysql:dbname=all5sport;host=127.0.0.1';
$dbUser = 'root';
$dbPwd = '';

try {
  $pdo = new PDO($dsn, $dbUser, $dbPwd);
} catch (PDOException $e) {
  echo $e->getMessage();
}
if(!empty($_POST["code_client"])){
    $requete = $pdo->prepare("SELECT `code_client`, `adresse`, `email`, `telephone`, `date_naissance`, `password`
     FROM `client` 
     WHERE code_client=:code_client ; ");
   $requete->bindParam(  ":code_client",$_POST["code_client"]);
    $requete->execute();
}else{
    $requete = $pdo->prepare("SELECT * FROM `client`");
    $requete->execute();
}


$resultat=$requete->fetchAll();
// var_dump($resultat);

echo json_encode($resultat);