<?php

require_once '../models/connexion.php';



//$sql = "SELECT plugin.nom_plugin as plugin, fonction.id_nom as nom_fonction, question_de_sarah, libelle, action.direction_action, mot_cle.id_nom as nom_motcle, reponse FROM sarah_v2.plugin, fonction, action, mot_cle "
//. "WHERE plugin.nom_plugin = fonction.nom_plugin AND fonction.id_nom = mot_cle.id_nom AND fonction.id_nom = action.id_nom AND action.direction_action = mot_cle.direction_action";

$sql = "SELECT nom_plugin FROM plugin";

$req = Connexion::getInstance()->prepare($sql);

// on insère les informations du formulaire dans la table
$req->execute() or die('Erreur SQL !'.$sql.'<br>'.Connexion::getInstance()->errorInfo());
$tab_fonctions = $req->fetchAll(pdo::FETCH_ASSOC);
var_dump($tab_fonctions);

echo '<div class="formulaire">
            <form method="POST">
            <h1>Plugin : '.$tab_fonctions[0]['nom_plugin'].'</h1>
                <div class="fonctions">';


foreach ($tab_fonctions as $data) {
    include '../templates/regex.php';
}
echo 'toto<br/>';



include "../templates/fonction.html";

