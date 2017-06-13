<?php
include_once '../models/connexion.php';
include_once '../models/Plugin_crud.php';
include_once '../models/Motcle_crud.php';
include_once '../models/Fonction_crud.php';
include_once '../controllers/fonction_annexe.php';

var_dump(Fonction_crud::get_first_function(toto));
echo Fonction_crud::get_first_function('toto')[0]['id_nom'];
print_r(Fonction_crud::get_first_function(toto)['id_nom']);



       
