<?php

session_start();

?>

<?php require_once('db.php');?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Chaustore :: Admin</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <header>
    	<div>
    		<h1>Bienvenue, <?php echo $_SESSION['username']; ?><h1>
    		<a href="disconnect.php">Deconnexion</a>
    	</div>
    </header>
	<?php
		if(isset($_SESSION['username'])){
            if($_GET['id']==0){
                $msg="";
                if(!empty($_POST)){
                    if(empty($_POST['name'])){
                    $msg .=" The name is required <br/>";
                    }
                    if(empty($_POST['price'])){
                    $msg .=" The price is required <br/>";    
                    }
                    if(empty($msg)){
    				$name = $_POST['name'];
    				$category_name = $_POST['category_name'];
    				$brand_name = $_POST['brand_name'];
    				$color_name = $_POST['color_name'];
    				$price = $_POST['price'];
    				$gender = $_POST['gender'];

                    $sql = "INSERT INTO product SET name='$name', price=$price, gender=$gender";
                    $select = mysqli_query($cnx, $sql);
                    }
                }
                echo $msg;
    ?>
    <form method="POST">
        <label>Nom</label>
        <input type="text" name="name">
        <label>Categorie</label>
        <select name="category_name">
            <?php       
                $sqla = 'SELECT * FROM category';
                $selecta = mysqli_query($cnx, $sqla);
                while($sa = mysqli_fetch_assoc($selecta)){
            ?>
            <option><?php echo $sa['name'];?></option>
            <?php
            }
            ?>
        </select>
        <label>Marque</label>
        <select name="brand_name">
            <?php       
                $sqla = 'SELECT * FROM brand';
                $selecta = mysqli_query($cnx, $sqla);
                while($sa = mysqli_fetch_assoc($selecta)){
            ?>
            <option><?php echo $sa['name'];?></option>
            <?php
            }
            ?>
        </select>
        <label>Couleur</label>
        <select name="color_name">
            <?php       
                $sqla = 'SELECT * FROM color';
                $selecta = mysqli_query($cnx, $sqla);
                while($sa = mysqli_fetch_assoc($selecta)){
            ?>
            <option><?php echo $sa['name'];?></option>
            <?php
            }
            ?>
        </select>
        <label>Prix</label>
        <input type="text" name="price">
        <label>Genre</label>
        <select name="gender">
            <option>H</option>
            <option>F</option>
        </select>
        <input type="submit" name="" value="Envoyer">
    </form>
<?php
            }
        }
        else{
            header('Location: index.php');
        }
?>
</body>
</html>

