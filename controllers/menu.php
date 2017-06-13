<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu de création des plugins</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#menu").menu();
            });
        </script>
        <style>
            .ui-menu { width: 150px; }
        </style>
    </head>
    <body>

        <?php
        include_once '../models/Plugin_crud.php';
        ?>
<div class="container">
        <ul id="menu">
            <li><a href="../controllers/edition.php">Créer un plugin</a></li>
            <li><div class="editer">Éditer un plugin</div>
                <ul>
                    <?php foreach (Plugin_crud::getNoms_des_plugins() as $data) : ?>
                    <li><a href="../controllers/edition.php?nom_plugin=<?php echo $data['nom_plugin']; ?>" ><?php echo $data['nom_plugin']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><div class="supprimer">Supprimer un plugin</div>
                <ul>
                    <?php foreach (Plugin_crud::getNoms_des_plugins() as $data) : ?>
                    <li><a href="../controllers/delete.php?nom_plugin=<?php echo $data['nom_plugin']; ?>" ><?php echo $data['nom_plugin']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><div class="generer">Générer un plugin</div>
                <ul>
                    <?php foreach (Plugin_crud::getNoms_des_plugins() as $data) : ?>
                        <li><a href="../controllers/generateur_de_js.php?nom_plugin=<?php echo $data['nom_plugin']; ?>" ><?php echo $data['nom_plugin']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><a href="http://www.expreg.com/metacaracteres.php">Les expressions régulières</a></li>

            <li><div><a href="../templates/contacter_moi.php">Contact</a></div></li>
        </ul>

</div>
    </body>
