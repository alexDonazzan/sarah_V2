<?php

require_once '../models/connexion.php';
require_once '../models/Motcle_crud.php';
require_once '../models/Fonction_crud.php';
require_once '../controllers/fonction_annexe.php';

$nom_plugin = $_GET['nom_plugin'];

$js = "var ScribeAskMe;
var ScribeSpeak;
var maConfig;";

$js .= "
    
exports.action = function(data, callback, config, SARAH){

ScribeAskMe = SARAH.ScribeAskMe;
ScribeSpeak = SARAH.ScribeSpeak;

maConfig = config.modules.". $nom_plugin .";
        ";


// ------------------------------------------   Faire une fonction qui va récupérer les noms de fonctions principals   --------------------------
//
$i =1;
$j = sizeof(Fonction_crud::get_fonctions($nom_plugin));
print_r($j);
var_dump(Motcle_crud::get_data_action($nom_plugin));
        foreach (Fonction_crud::get_fonctions($nom_plugin) as $motcle) {
            var_dump($motcle);
            echo '--------------------------';
            if($i < $j) {
            $js .= "
        if (data.action == '".  fonction_annexe::remove_quote($motcle['id_nom'])."') {
         ". fonction_annexe::remove_accent($motcle['id_nom']) ."(); 
        } else";
            } else {
                
            $js .= " if (data.action == '".$motcle['id_nom']."') {
                     ". fonction_annexe::remove_quote($motcle['id_nom']) ."(); 
                    }"; 
            }
            $i++;
        }

        

$js .= "
    callback();
        }";

mkdir('C:/SARAH/plugins/'.$nom_plugin.'/', 0777);

// Ouverture en ecriture du fichier nom_du_plugin.js utilisé dans l'index. 
// Une alerte est créée par defaut si le fichier ne s'ouvre pas.
$fp = fopen('C:/SARAH/plugins/'.$nom_plugin.'/'.$nom_plugin.'.js', 'w');
// Ecriture dans nom_du_plugin de la variable $js
if (fwrite($fp, $js)== false) {
    echo '<script>alert("Attention : le fichier ou est généré le js n\'a pas été correctement écris");</script>';
}
// Fermeture du fichier js + vérification d'erreurs eventuelles
if (fclose($fp)==false) {
    echo '<script>alert("Attention : le fichier ou est généré le js s\'est mal fermé");</script>';
}



?>