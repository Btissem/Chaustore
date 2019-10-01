<?php
    $link = mysqli_connect("164.132.110.233","simplon","xCIwyTKo3)?(31;*", "simplon_chaustore");

    if (!$link) {
      echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
      echo "Errno de débogage: " . mysqli_connect_erno() . PHP_EOL;
      echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
      exit;
    }
echo "Succès : Une connexion correcte à MySQL a été faite";
mysqli_close($link);
?>
