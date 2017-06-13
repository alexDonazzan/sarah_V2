<?php

$nom_plugin = $_GET['nom_plugin'];

$xml = '<grammar version="1.0" xml:lang="fr-FR" mode="voice" root="rule_' . $nom_plugin . '" xmlns="http://www.w3.org/2001/06/grammar" tag-format="semantics/1.0">
<rule id="rule_' . $nom_plugin . '" scope="public">

	<tag>out.action=new Object();</tag>

	<item></item>
	<one-of>


';

$xml .= "                ";

foreach (Fonction_crud::get_fonctions($nom_plugin) as $motcle) {

    $xml .= "<item>" . fonction_annexe::remove_quote($motcle['id_nom']) . "<tag>out.action.action=\"" . fonction_annexe::remove_quote($motcle['id_nom']) . "\";</tag></item>
                ";
}


$xml .= '</one-of>

	<tag>out.action._attributes.play = "medias/notification.wav"</tag>

	<tag>out.action._attributes.uri="http://127.0.0.1:8080/sarah/'. $nom_plugin .'";</tag>

</rule>
</grammar>';







// <--------------------------------------------------- CREATION DU FICHIER XML ------------------------------------>
// Ouverture en ecriture du fichier fonction_du_plugin.xml. Une alerte est créée par defaut si le fichier ne s'ouvre pas.
$fp = fopen('C:/SARAH/plugins/'.$nom_plugin.'/' . $nom_plugin . '.xml', 'w');
// Ecriture dans fonction_du_plugin de la variable $js
if (fwrite($fp, $xml) == false) {
    echo '<script>alert("Attention : le fichier ou est généré le js n\'a pas été correctement écris");</script>';
}
// Fermeture du fichier .prop + vérification d'erreurs eventuelles
if (fclose($fp) == false) {
    echo '<script>alert("Attention : le fichier ou est généré le js s\'est mal fermé");</script>';
}