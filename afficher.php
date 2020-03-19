<!DOCTYPE html>
<html>
<head>
	<title>Afficher les produits</title>
</head>
<style type="text/css">
	.block {
  display: block;
  width: 100%;
  border: none;
  background-color: #4CAF50;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}
</style>
<body>
	<?php
$ref=$_GET['refpdt'];
$a= mysqli_connect('localhost','root','','Vente');
    $b="select * from produit where refpdt='".$ref."'";
    $resultat=mysqli_query($a,$b);
    while($row=mysqli_fetch_array($resultat)){ 
    	?><img src="<?php echo $row['image'];?>" width=50%>
<table border=2px align="right" width="50%" height=430>
	<tr>
		<td>Reference Produit</td>
	    <td><?php echo $row['refpdt'] ?></td>
    </tr>
    <tr>
		<td>Libellé produit</td>
	    <td><?php echo $row['libpdt'] ?></td>
    </tr>
    <tr>
		<td>Prix produit</td>
	    <td><?php echo $row['prix'] ?></td>
    </tr>
    <tr>
		<td>Quantité produit</td>
	    <td><?php echo $row['qte'] ?></td>
    </tr>
    <tr>
		<td>Description produit</td>
	    <td><?php echo $row['description'] ?></td>
    </tr>
    <tr>
		<td>Type produit</td>
	    <td><?php echo $row['type'] ?></td>
    </tr>

</table>
<?php }?>
<a href=list.php><button type="button" class="block">Retour</button></a>
</body>
</html>