<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./img/colorlogo.PNG" type="image/icon type">
        <link rel="stylesheet" href="./css/php.css">
        <title>Creation d'une couleur | Recapitulatif</title>
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

    /*Conversion RGB a CMJN*/
    $r2 = $sliderRed / 255;
    $g2 = $sliderGreen / 255;
    $b2 = $sliderBlue / 255;

    $k = 1 - max($r2, $g2, $b2);

    $c = (1 - $r2 - $k) / (1 - $k);
    $m = (1 - $g2 - $k) / (1 - $k);
    $y = (1 - $b2 - $k) / (1 - $k);

    /*Arrondir au millieme*/
    $c = round($c, 3)*100;
    $m = round($m, 3)*100;
    $y = round($y, 3)*100;
    $k = round($k, 3)*100;

    /*Get catalogue / perso*/
    $cataloguePersonnel = $_POST['catalogue-personnel'];

    echo "<div><h1>Informations Personnelles</h1><div>";
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
        echo "<h1>Personnel</h1><div>";
        echo "<p>Quantite : $quantity L</p>";
        echo "<h3>RGB</h3>";
        echo "<p>Red: $sliderRed</p>";
        echo "<p>Green: $sliderGreen</p>";
        echo "<p>Blue: $sliderBlue</p>";
        echo "<h3>CMYK</h3>";
        echo "<p>Cyan: $c%</p>";
        echo "<p>Yellow: $y%</p>";
        echo "<p>Magenta: $m%</p>";
        echo "<p>Black: $k%</p></div></div>";
    }

    /*BDD connection*/
    echo "<!--";
    $servername = "10.187.52.4";
    $username = "renaudm";
    $password = "renaudm";
    $dbname = "renaudm_b";

    $bdd = new mysqli("$servername", "$username", "$password", "$dbname");
    if ($bdd->connect_errno) {
        die("Connection failed: " . $bdd->connect_error);
    }

    $requete = "SELECT * FROM CLIENT";
    /*Requete nombre de lignes totale*/
    if($bdd->query($requete) == TRUE) {
        $rowsnumber = $bdd->affected_rows;
    } else {
        echo "Error: " . $requete . "<br>" . $bdd->error;
    }

    /*Ajout des information*/
    $requete = "INSERT INTO CLIENT VALUES($rowsnumber + 1,'$lastName','$firstName','$address')";
    if (mysqli_query($bdd, $requete)) {
        echo " New record created successfully";
    } else {
        echo " Error: " . $sql . "<br>" . mysqli_error($bdd);
    }

    /*Ajout des couleurs*/
    $requete = "INSERT INTO COMMANDE VALUES($rowsnumber + 1,$rowsnumber + 1,'$sliderRed','$sliderGreen','$sliderBlue','$c','$m','$y','$k','$quantity')";
    if (mysqli_query($bdd, $requete)) {
        echo " New record created successfully";
    } else {
        echo " Error: " . $sql . "<br>" . mysqli_error($bdd);
    }

    /*calcul litre de CMJN besoin*/
    $c = ($c/100) * $quantity;
    $m = ($m/100) * $quantity;
    $y = ($y/100) * $quantity;
    $k = ($k/100) * $quantity;
    
    $requete = "UPDATE STOCK SET cyan = cyan - $c";
    if (mysqli_query($bdd, $requete)) {
        echo " New record created successfully";
    } else {
        echo " Error: " . $sql . "<br>" . mysqli_error($bdd);
    }

    $requete = "UPDATE STOCK SET magenta = magenta - $m";
    if (mysqli_query($bdd, $requete)) {
        echo " New record created successfully";
    } else {
        echo " Error: " . $sql . "<br>" . mysqli_error($bdd);
    }

    $requete = "UPDATE STOCK SET yellow = yellow - $y";
    if (mysqli_query($bdd, $requete)) {
        echo " New record created successfully";
    } else {
        echo " Error: " . $sql . "<br>" . mysqli_error($bdd);
    }

    $requete = "UPDATE STOCK SET black = black - $k";
    if (mysqli_query($bdd, $requete)) {
        echo " New record created successfully";
    } else {
        echo " Error: " . $sql . "<br>" . mysqli_error($bdd);
    }

    echo "-->"
    /*
    CREATE TABLE CLIENT(
        idClient INT PRIMARY KEY,
        nom VARCHAR(30),
        prenom VARCHAR(30),  
        adresse VARCHAR(60)
    );
    CREATE TABLE COMMANDE (
        idCommande INT PRIMARY KEY,
        idClient INT,
        red SMALLINT NOT NULL,
        green SMALLINT NOT NULL,
        blue SMALLINT NOT NULL,
        cyan DECIMAL(5,2) NOT NULL,
        magenta DECIMAL(5,2) NOT NULL,
        yellow DECIMAL(5,2) NOT NULL,
        black DECIMAL(5,2) NOT NULL,
        quantite DECIMAL(5,2) NOT NULL,
        FOREIGN KEY (idClient) REFERENCES CLIENT(idClient)
    );
    CREATE TABLE STOCK (
        idStock INT PRIMARY KEY,
        cyan REAL NOT NULL,
        magenta REAL NOT NULL,
        yellow REAL NOT NULL,
        black REAL NOT NULL,
    );
    INSERT INTO CLIENT VALUES(1,"Rolda","Pierre","rue de samodie");
    INSERT INTO CLIENT VALUES(2,"Toulou","Pascal","rue de la majoet");
    INSERT INTO COMMANDE VALUES(1,1,20,40,60,66.7,33.3,0,76.5,25);
    INSERT INTO COMMANDE VALUES(2,2,20,40,60,66.7,33.3,0,76.5,6.5);
    INSERT INTO STOCK VALUES(1,20000,4000,600,6006.7);
    */
    ?>
</html>