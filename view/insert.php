<div class="container">
    <form method="POST" action="../controller/addproduits.php">

    
  <div class="corps-formulaire">
  <div class="">
        <select class="rayons" name="rayons">
        <?php  
      if (is_array($rayons) || is_object($rayons))
      {
        foreach ($rayons as $rayon) {
          
      echo"  <option value=``>".$rayon["rayon_libelle"]. "</option>";
      echo" <p name=`idrayon` style=display:block; >".$rayon["id_rayon"]."</p>";
        }
      }
        ?>
        </select>
      </div>
      <br>
  <div class="">
        <select class="fournisseur" name="fournisseur">
          <?php
          if (is_array($produits) || is_object($produits))
          {
            foreach ($produits as $produit) {
          echo"  <option value=`nomfournisseur`>".$produit["nom_fournisseur"]. "</option>";
            }
          }
            ?>
        </select>
      </div>
      <br>
      

      <div class="">
        <label>prix</label>
        <input type="number"  name="prix">
      </div>
      <br>

      <div class="">
        <label>description</label>
        <input type="text"  name="description">
      </div>
      <br>

      <div class="">
        <select class="lieu" name="lieu">
        <?php  
      if (is_array($produits) || is_object($produits))
      {
        foreach ($produits as $produit) {
      echo"  <option value=`stockage`>".$produit["lieu_stockage"]. "</option>";
        }
      }
        ?>
        </select>
      </div>
      <br>

      <div class="">
        <label>quantité de stock en ligne</label>
        <input type="number"  name="stockonline">
      </div>
      <br>

    
        <div class="">
        <label>quantité de stock en magasin</label>
        <input type="number"  name="storestock">
      </div>
      <br>
      

        <div class="">
        <label>photo du produit</label>
        <input type="file"  alt="Submit" width="48" height="48" name="image">

      </div>


      <br>
      <br>
      <input type="submit" value="Insert" name="ajouter">
    </form>