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

echo "<tr>";
echo "<td>".$produit["reference_produit"]."</td>";
echo "<td>".$produit["nom_fournisseur"]."</td>";
echo "<td>".$produit["cout_unitaire"]."</td>";
echo "<td>".$produit["description"]."</td>";
echo "<td>".$produit["stock_internet"]."</td>";
echo "<td>".$produit["stock_magasin"]."</td>";
echo "<td>".$produit["lieu_stockage"]."</td>";

echo"</tr>";
}
}

 ?>
</tr>
</tbody>
</table>
</body>
</html>

