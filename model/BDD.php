<?php
class Bdd
{
  private $bdd;


   function __construct(){

    $dsn = 'mysql:dbname=all5sport;host=127.0.0.1';
    $dbUser = 'root';
    $dbPwd = '';

    try {
      $this->bdd = new PDO($dsn, $dbUser, $dbPwd);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
function getUser($mail,$pwd){
  $sql = " SELECT * FROM `client` where email = '$mail'  AND password = '$pwd'
  ;"; 
  $query =  $this->bdd->prepare($sql);
  $query->execute();
  return $query->fetchAll();

}

function getOneUser($codeclient){
  $sql = " SELECT * FROM `client` WHERE code_client='$codeclient';
  ;"; 
  $query =  $this->bdd->prepare($sql);
  $query->execute();
  return $query->fetchAll();

}





   function getProduitsByRayon($idrayon)
  {
    $sql = "SELECT reference_produit,cout_unitaire,description_produit,quantite_stock_internet,fournisseur_nom,quantite_stock_magasin,photo,photo_libelle FROM produits 
    Inner join photo on reference_produit=photo.fk_prr 
    Inner join fournisseur on fk_fo=id_fournisseur 
    inner join eststock on reference_produit=eststock.fk_pr
    JOIN rayon on fk_ray=id_rayon
    where fk_ray='$idrayon'
    group by reference_produit;
    
    ;"; 
    $query =  $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
  
  function getProduits() {
    $sql = "SELECT reference_produit,cout_unitaire,description_produit,quantite_stock_internet,fournisseur_nom,quantite_stock_magasin,photo,photo_libelle FROM produits 
    Inner join photo on reference_produit=photo.fk_prr 
    Inner join fournisseur on fk_fo=id_fournisseur 
    inner join eststock on reference_produit=eststock.fk_pr
    JOIN rayon on fk_ray=id_rayon
 
    group by reference_produit;
    
    ;"; 
    $query =  $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
  function GetOneProduit($idproduit){
   $sql= "SELECT photo_id,reference_produit,cout_unitaire,description_produit,quantite_stock_internet,fournisseur_nom,quantite_stock_magasin,photo,photo_libelle,lieu
    FROM produits 
   Inner join photo on reference_produit=photo.fk_prr 
   Inner join fournisseur on fk_fo=id_fournisseur 
   inner join eststock on reference_produit=eststock.fk_pr
   inner join stock on fk_sto=stock_id
   WHERE reference_produit= '$idproduit'";
   $query = $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
    header("Refresh:0");

  }
  function getPhoto($idproduit){
    $sql="SELECT * from photo 
    Join produits on fk_prr=reference_produit
    where fk_prr='$idproduit';";
        $query =  $this->bdd->prepare($sql);
        $query->execute();
        return $query->fetchAll();
      } 
  function getRayons(){
    $sql = "SELECT * FROM rayon;";
    $query =  $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
  function getOneRayon($idrayon){
    $sql = "SELECT * FROM `rayon` where id_rayon=$idrayon;";
    $query =  $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
  


  function getNbPanier($codeclient){
    $sql = "SELECT count(0) as nbart FROM all5sport.achat 
    where fk_cl='$codeclient'
    ";
  $query =  $this->bdd->prepare($sql);
  $query->execute();
  return $query->fetchAll();

  }

      function Creerachat($idproduit,$codeclient,$prixproduit){
        $d = new DateTime();
        $insert="INSERT INTO `achat`(`fk_pr`, `fk_cl`, `date`, `fk_statut`, `prix`) VALUES (:idproduit,:codeclient,:dateI,1,:prix);"; 
        $update="UPDATE `produits` SET `quantite_stock_internet`= `quantite_stock_internet`-1
        WHERE reference_produit=':idproduit'";
          $query1 =  $this->bdd->prepare($insert);
          $query2 =  $this->bdd->prepare($update);
         
         $query1->execute(array(  ":idproduit" => "$idproduit",
                                    ":codeclient"=>"$codeclient",
                                    ":dateI" => $d->format("Y-m-d H:i:s"),
                                    ":prix"=>$prixproduit, ));
         $query2->execute(array(  ":idproduit" => "$idproduit",
                                    ));
  

          var_dump($query1->errorInfo());
          var_dump($query2->errorInfo());
      echo$idproduit;
      
        }
        function getCommandes($codeclient){
          $sql = "SELECT * FROM all5sport.achat
          join photo on fk_prr=fk_pr
          join produits on reference_produit=achat.fk_pr
          join statut on fk_statut = id_statut
           WHERE fk_cl='$codeclient'
           order by fk_pr; 
          
           ";
          $query =  $this->bdd->prepare($sql);
          $query->execute();
          return $query->fetchAll();
        }
        function getNbCommandes($codeclient){
          $sql = "SELECT COUNT(0) as nbart from achat
          WHERE fk_cl='$codeclient'
          ";
        $query =  $this->bdd->prepare($sql);
        $query->execute();
        return $query->fetchAll();
      
        }
}
   