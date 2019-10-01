<?php

session_start();

?>

<?php 
	require_once('db.php');
	require_once('product.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Chaustore :: Admin</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<?php
	include_once('includes/header.php');
	if(isset($_SESSION['username'])){
?>
	<table>
		<tr>
			<td>Nom</td>
			<td>Categorie</td>
			<td>Marque</td>
			<td>Couleur</td>
			<td>Prix</td>
			<td>Genre</td>
			<td><button onclick="location.href='add.php?id=0'">Ajouter</button></td>
		</tr>
<?php	
	$sql = "SELECT product.*, category.name AS category_name, brand.name AS brand_name, color.name AS color_name FROM product, category, brand, color WHERE product.category_id = category.id AND product.brand_id = brand.id AND product.color_id = color.id;";

	$select = mysqli_query($cnx, $sql);

	while($s = mysqli_fetch_assoc($select)){
		$product = new Product($s);
?>	
		<tr>	
			<td><?php echo $product->getName(); ?></td>
			<td><?php echo $product->getCategory_name(); ?></td>
			<td><?php echo $product->getBrand_name(); ?></td>
			<td><?php echo $product->getColor_name(); ?></td>
			<td><?php echo $product->getPrice()."€"; ?></td>
			<td><?php echo $product->getGender(); ?></td>
			<td>
				<button onclick="location.href='update.php?id=<?php echo $product->getId(); ?>'">Modifier</button>
				<button onclick="location.href='delete.php?id=<?php echo $product->getId(); ?>'">Supprimer</button>
			</td>
		</tr>
<?php
	}
?>
	</table>

<?php
}
else {
		header('Location: index.php');
	}
?>	
</body>
</html>

