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
?>
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
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="form.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    </head>
    <body>
        <div class="formulaire container">
            <h2>
                Vous êtes sur le plugin : <?php echo $nom_plugin; ?>
            </h2>
            <form method="POST" class="form-inline" action="../controllers/insertion_formulaire.php">
                <h3>
                    Souhaitez vous le renommer ?
                </h3>
                <div class="col-md-6"><input type="text" class="form-control" name="nom_plugin" value="<?php echo $nom_plugin; ?>"/></div>
                <div class="fonctions clearfix">
                    <?php
                    $i = 0;
                    foreach (Fonction_crud::get_fonctions($nom_plugin) as $key => $data_fonction) :
                        ?>

                        <div class="fonction clearfix col-md-7 panel panel-default">
                            <div class="sup_fonction glyphicon-minus">
                                Supprimer la fonction <?php echo $data_fonction['id_nom']; ?>
                            </div>
                            <h1>
                                <?php echo $data_fonction['id_nom']; ?>
                            </h1>

                            <p>
                                Nom de la fonction : 

                                <input type="text" class="form-control" class="fonction_nom" name="fonction[<?php echo $key; ?>][nom]" value="<?php echo $data_fonction['id_nom']; ?>"/>
                            </p>

                            <br/>

                            <p>
                                Que doit dire SARAH ? 
                                <input type="text" class="form-control" class="question_sarah" name="fonction[<?php echo $key; ?>][question]" value="<?php echo $data_fonction['question_de_sarah']; ?>"/>

                            </p>

                            <br/>
                            <div class="regex">
                                <?php
                                $j = 0;
                                foreach (Motcle_crud::get_motcles($data_fonction['id_nom']) as $key2 => $data_motcle) :
                                    ?>

                                    <div class="regex_unitaire">
                                        <span class="regex_name">
                                            Expression régulière <?php echo $j + 1; ?> : 
                                        </span>
                                        <input type="text" class="form-control" class="mot_cle" name="fonction[<?php echo $key; ?>][regex][<?php echo $key2; ?>][mot_cle]" value="<?php echo $data_motcle['libelle']; ?>"/>
                                        <br/>
                                        <label for="cbox1">
                                            <input type="checkbox" class="reponse_sarah_checked" value="premiere_checkbox" <?php
                            if (Motcle_crud::get_motcle_reponse($data_motcle['reponse_de_sarah']) != NULL) {
                                echo 'checked="true"';
                            }
                                    ?>/>
                                            Donnera une réponse 
                                            <input type="text" class="form-control" class="reponse_sarah" name="fonction[<?php echo $key; ?>][regex][<?php echo $key2; ?>][reponse_sarah]" value="<?php echo $data_motcle['reponse_de_sarah']; ?>"/>

                                        </label>
                                        <br>
                                        <label for="cbox2">
                                            <input type="checkbox" class="redirection_fonction_checked" value="deuxieme_checkbox" 
                                            <?php
                                            if (Motcle_crud::get_motcle_fonction($data_motcle['pointe_vers_fonction']) != NULL) {
                                                echo 'checked="true"';
                                            }
                                            ?>/> 
                                            Redirige vers une autre fonction

                                            <SELECT class="redirection_fonction form-control" name="fonction[<?php echo $key; ?>][regex][<?php echo $key2; ?>][fonction]" size="1">
                                                <?php
                                                echo "<option value =''>'selectionnez une fonction'";
                                                foreach (Fonction_crud::get_fonctions($nom_plugin) as $nom_fonction) {
                                                    echo "<option value = " . $nom_fonction['id_nom'] . ">" . $nom_fonction['id_nom'];
                                                }
                                                ?>
                                            </SELECT>

                                        </label>
                                        </br>
                                        <label for="cbox3">
                                            <input type="checkbox" class="executable_checked" value="troisieme_checkbox" <?php
                                        if (Motcle_crud::get_motcle_exec($data_motcle['exec']) != NULL) {
                                            echo 'checked="true"';
                                        }
                                                ?>/> 
                                            Lance un exécutable 
                                            <input type="text" class="form-control" class="executable" name="fonction[<?php echo $key; ?>][regex][<?php echo $key2; ?>][executable]" value="<?php echo $data_motcle['exec']; ?>"/>
                                        </label>

                                        <div class="sup_regex glyphicon-minus">
                                            Supprimer un champ regex
                                        </div>
                                    </div>
                                    <? php $j++; ?>
                                <?php endforeach ?>

                            </div>

                            <div class="add_regex glyphicon-plus">
                                Ajouter un champ regex
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="add_fonction glyphicon-plus">
                    Ajouter une fonction
                </a>
                </br>
                <input class='submit btn btn-default' TYPE="submit" VALUE=" Envoyer ">
            </form>
        </div>
        <script src="../js/formulaire2.js"></script>
    </body>
</html>
