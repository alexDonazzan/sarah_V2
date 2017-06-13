
<div class="regex_unitaire">
    <span class="regex_name">
        Réponse attendue <?php echo $j + 1; ?> : 
    </span>
    <input type="text" class="form-control" class="mot_cle" name="fonction[<?php echo $key; ?>][regex][<?php echo $key2; ?>][mot_cle]" value="<?php echo $data_motcle['libelle']; ?>"/>
    <br/>
    <label for="cbox1">
        <input type="checkbox" class="reponse_sarah_checked" value="premiere_checkbox" <?php
        if (Motcle_crud::get_motcle_reponse($data_motcle['reponse_de_sarah']) != NULL) {
            echo 'checked="true"';
        }
        ?>/>
        Réponse donnée 
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

<?php
$j++;
?>