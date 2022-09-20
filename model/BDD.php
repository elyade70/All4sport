<?php
class Bdd
{
  private $bdd;


   function __construct(){

    $dsn = 'mysql:dbname=all4sport;host=127.0.0.1';
    $dbUser = 'root';
    $dbPwd = '';

    try {
      $this->bdd = new PDO($dsn, $dbUser, $dbPwd);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }


   function getProduits()
  {
    $sql = "SELECT * FROM produits;";
    $query =  $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }


}
?>