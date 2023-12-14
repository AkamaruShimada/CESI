<?php
// Récupération des données du formulaire
$volume1 = $_POST['volume1'];
$volume2 = $_POST['volume2'];
$quantite = $_POST['quantite'];

// Définition des tableaux de conversion
$conversions = array(
    'millilitre' => array(
        'millilitre' => 1,
        'centilitre' => 0.1,
        'decilitre' => 0.01,
        'litre' => 0.001,
    ),
    'centilitre' => array(
        'millilitre' => 10,
        'centilitre' => 1,
        'decilitre' => 0.1,
        'litre' => 0.01,
    ),
    'decilitre' => array(
        'millilitre' => 100,
        'centilitre' => 10,
        'decilitre' => 1,
        'litre' => 0.1,
    ),
    'litre' => array(
        'millilitre' => 1000,
        'centilitre' => 100,
        'decilitre' => 10,
        'litre' => 1,
    ),
);

// Conversion de la quantité
$resultat = $quantite * $conversions[$volume1][$volume2];

// Affichage du résultat
echo $quantite . ' ' . $volume1 . ' = ' . $resultat . ' ' . $volume2;
?>