<?php

require_once '../models/connexion.php';
require_once '../models/Motcle_crud.php';
require_once '../models/Fonction_crud.php';
require_once '../controllers/fonction_annexe.php';

$nom_plugin = $_GET['nom_plugin'];
var_dump($nom_plugin);
var_dump(Fonction_crud::get_fonctions($nom_plugin));
$js = "";


foreach (Fonction_crud::get_fonctions($nom_plugin) as $fonction) {
    $js .= "
             //-------------------------------  Fonction ". $fonction['id_nom']."  -----------------------------------------
        
function " . fonction_annexe::remove_accent($fonction['id_nom']) . "(callback) {
        ScribeAskMe('" . $fonction['question_de_sarah'] . "', [";
    $i = 1;
    foreach (Motcle_crud::get_motcles($fonction['id_nom']) as $motcle) {
        if ($i < sizeof(Motcle_crud::get_motcles($fonction['id_nom']))) {
            $js .= "
                {'regex':'" . $motcle['libelle'] . "',	answer:'" . $motcle['libelle'] . "'},";
        } else {
            $js .= "
                {'regex':'" . $motcle['libelle'] . "',	answer:'" . $motcle['libelle'] . "'}";
        }
        $i++;
    }

    $js .= "
    ], function(answer,phrase,match,wholeMatch) {
            ";


    foreach (Motcle_crud::get_motcles($fonction['id_nom']) as $motcle) {
        var_dump($motcle);
        $js .= "if (answer == '" . fonction_annexe::remove_quote($motcle['libelle']) . "') {
                ScribeSpeak('" . fonction_annexe::remove_quote($motcle['reponse_de_sarah']) . "', "
                . "function() {
                    ". fonction_annexe::remove_accent(Fonction_crud::get_first_function($nom_plugin)) . "(match, callback)});"
                . "} else 
            ";
    }

    $js .= "
                    ScribeSpeak(\"Tu n'as rien répondu. Tant pis.\");
		}, 
                {'timeout':maConfig.timeout_msec, 'retryIfNoMatch': \"Je ne suis pas sûre d'avoir compris. Peux-tu répéter ?\", 'essais': 2}
	);
}";
}


// <--------------------------------------------------- CREATION DU FICHIER JS ------------------------------------>
// Ré-ouverture en ecriture du fichier nom_plugin.js utilisé. 
// Le curseur d'écriture se met à la fin du document pour ne pas effacer l'entete créé plus tôt.
// Une alerte est créée par defaut si le fichier ne s'ouvre pas.

$fp = fopen('C:/SARAH/plugins/'.$nom_plugin.'/' . $nom_plugin . '.js', 'a+');
// Ecriture dans nom_plugin.js de la variable $js
if (fwrite($fp, $js) == false) {
    echo '<script>alert("Attention : le fichier ou est généré le js n\'a pas été correctement écris");</script>';
}
// Fermeture du fichier nom_plugin.js + vérification d'erreurs eventuelles
if (fclose($fp) == false) {
    echo '<script>alert("Attention : le fichier ou est généré le js s\'est mal fermé");</script>';
}

