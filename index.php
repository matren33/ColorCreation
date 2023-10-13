<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="./css/php.css">
    </head>
    <?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];

    /*Get quantity*/
    $quantity = $_POST['quantity'];

    /*Get colors*/
    $sliderBlue = $_POST['slider-blue'];
    $sliderGreen = $_POST['slider-green'];
    $sliderRed = $_POST['slider-red'];
    $colorChooser = $_POST['color-chooser'];

    /*Get catalogue / perso*/
    $cataloguePersonnel = $_POST['catalogue-personnel'];

    echo "<div><h1>Informations Personnel</h1><div>";
    echo "<p>Prenom : $firstName</p>";
    echo "<p>Nom : $lastName</p>";
    echo "<p>Addresse: $address</p></div>";

    /*If Catalogue echo colorChooser*/
    if($cataloguePersonnel == "Catalogue"){
        echo "<h1>Catalogue</h1><div>";
        echo "<p>Quantite : $quantity</p>";
        echo "<p>Couleur : $colorChooser</p></div>";
    }/*else echo sliders*/
    else{
        echo "<h2>Personnel</h2><div>";
        echo "<p>Quantite: $quantity</p>";
        echo "<p>Bleu : $sliderBlue</p>";
        echo "<p>Vert : $sliderGreen</p>";
        echo "<p>Rouge : $sliderRed</p></div></div>";
    }
    ?>
</html>