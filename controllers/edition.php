
<?php

require_once '../models/connexion.php';
require_once '../models/Plugin_crud.php';
require_once '../models/Motcle_crud.php';
require_once '../models/Fonction_crud.php';

if (isset($_GET['nom_plugin'])) {
    $nom_plugin = $_GET['nom_plugin'];
} else {
    $nom_plugin = "";
}

if (empty($_POST)) {

include_once '../templates/entete.php';

foreach (Fonction_crud::get_fonctions($nom_plugin) as $key => $data_fonction) {
    include '../templates/fonction.php';
}
include '../templates/footer.php';
} else {
    include '../controllers/insertion_formulaire.php';    
}

?>

