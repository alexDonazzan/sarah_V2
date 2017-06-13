<?php

$nom_plugin = $_GET['nom_plugin'];

$prop = '{
	"modules" : { 
		"'.$nom_plugin.'"  : {
			"description": "Exemples d\'utilisation du plugin '.$nom_plugin.'",
			"version": "1.0",
			"timeout_msec": 15000
		}
	}
}';


// <--------------------------------------------------- CREATION DU FICHIER PROP ------------------------------------>
// Ouverture en ecriture du fichier fonction_du_plugin.prop. Une alerte est créée par defaut si le fichier ne s'ouvre pas.
$fp = fopen('C:/SARAH/plugins/'.$nom_plugin.'/' . $nom_plugin . '.prop', 'w');
// Ecriture dans fonction_du_plugin de la variable $prop
if (fwrite($fp, $prop) == false) {
    echo '<script>alert("Attention : le fichier ou est généré le js n\'a pas été correctement écris");</script>';
}
// Fermeture du fichier .prop + vérification d'erreurs eventuelles
if (fclose($fp) == false) {
    echo '<script>alert("Attention : le fichier ou est généré le js s\'est mal fermé");</script>';
}