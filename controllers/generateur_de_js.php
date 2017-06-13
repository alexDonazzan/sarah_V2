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
        <meta HTTP-EQUIV="Refresh" content="4;../test/menu.php"> 
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    </head>


<?php

require_once '../models/connexion.php';
require_once '../models/Motcle_crud.php';
require_once '../models/Fonction_crud.php';
require_once '../controllers/fonction_annexe.php';

$nom_plugin = $_GET['nom_plugin'];

include_once '../controllers/entete_du_js.php';

include_once '../controllers/fonction_du_js.php';

include_once '../controllers/fichier_pour_prop.php';

include_once '../controllers/fichier_pour_xml.php';

