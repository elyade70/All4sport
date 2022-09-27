<?php
include "../View/header.php"
?>

<style>
table{
  border: 2px
  solid black;

}
th{
  border: 1px
  solid black;
}
tr{
  border: 2px
  solid black;
}
</style>
 <table>

<thead>
<th>reference_produit</th>
<th>nom_fournisseur</th>
<th>cout_unitaire</th>
<th>description</th>
<th>stock_internet</th>
<th>stock_magasin</th>
<th>lieu_stockage</th>

</thead>
<tbody>
<tr>
  
<?php
if (is_array($produits) || is_object($produits))
{
  foreach ($produits as $produit) {

// echo "<tr>";
// echo "<td>".$produit["reference_produit"]."</td>";
// echo "<td>".$produit["nom_fournisseur"]."</td>";
// echo "<td>".$produit["cout_unitaire"]."</td>";
// echo "<td>".$produit["description"]."</td>";
// echo "<td>".$produit["stock_internet"]."</td>";
// echo "<td>".$produit["stock_magasin"]."</td>";
// echo "<td>".$produit["lieu_stockage"]."</td>";

// echo"</tr>";
}
} 

 ?>

 <div class="container">
    <div class="row">
         <div class="col s4"  id="brr"  class="col m4" >
                 <div class="card horizontal" >
                               <?php echo" <h3>" .$produit["description"]."</h3>";?>
                     <div class="card-image">
                     <img class="fit-picture"  src="../view/bouteille.jfif" alt="bouteille test">

                   
                        <div class="card-content">
                        <?php
  echo "<p>"."réf :".$produit["reference_produit"]."</p>";
echo "<p>"."Fourni par ".$produit["nom_fournisseur"]."</p>";
echo "<p>".$produit["cout_unitaire"]."€"."</p>";

?>
<style>

#brr{
    border: solid 1px white;
    padding: 5px;
    border-radius: 5px;
    
    display: flex;
}
.paragraphe{
   display: block;
}

p{
    font-weight: bold;
} 
  </style>
                             </div>
                        </div>
             </div>
             
                            
             </div>
     </div>
</div> 
</tr>
</tbody>
 </table> 
</body>
</html>

