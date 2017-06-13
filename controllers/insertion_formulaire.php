
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Formulaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="form.css" rel="stylesheet" type="text/css"/>
        <!--<meta HTTP-EQUIV="Refresh" content="4;../controllers/menu.php"> -->
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    </head>

<?php
// sert à afficher les var_dump un peu trop profond (ici limité a 5 niveau)
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

require_once '../models/connexion.php';
require_once '../models/Plugin_crud.php';
require_once '../models/Motcle_crud.php';
require_once '../models/Fonction_crud.php';
require_once '../models/Temp_mot_cle_crud.php';




$tableau_des_fonctions = $_POST;
var_dump($tableau_des_fonctions);
echo '---------------------------------
    ---------------------------------
    ';
$nom_du_plugin = $_POST['nom_plugin'];
print_r(Plugin_crud::create_plugin($nom_du_plugin));
Temp_mot_cle::create_table_motcle_temporaire($nom_du_plugin);
Temp_mot_cle::update_table_mot_cle_temporaire($nom_du_plugin);
Motcle_crud::delete_motcle_du_plugin($nom_du_plugin);
foreach ($tableau_des_fonctions['fonction'] as $key => $tab_fonction) {
    var_dump($tab_fonction);
    echo $tab_fonction['nom'];
    print_r(Fonction_crud::create_fonction($nom_du_plugin, $tab_fonction['nom'], $tab_fonction['question']));

    foreach ($tab_fonction['regex'] as $regex) {
        if (array_key_exists('fonction', $regex)) {
        $test = (isset($regex['fonction']) or $regex['fonction'] != '') ? $test = $regex['fonction'] : $test = NULL;
        } else {
            $test='';
        }
        if (Motcle_crud::create_motcle($regex['mot_cle'], $regex['reponse_sarah'], $test, $regex['executable'], $tab_fonction['nom'])) {
            echo $regex['mot_cle'] . " a été correctement inséré.<br/>";
        } else {
            echo '<br/> WARNING WARNING WARNING <br/>';
            // mettre le repeuplement de la base ici
            Motcle_crud::delete_motcle_du_plugin($nom_du_plugin);
            print_r(Motcle_crud::insert_motcle_temp());
            break 3;
        }
    }
}


echo "L'insertion des données est terminée !
Vous allez être redirigé au menu dans 5 secondes.";

//header('Location: menu.php');
//exit;