<?php

require_once '../models/connexion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fonction_crud
 *
 * @author alexa
 */
class Fonction_crud {

    public static function create_fonction($nom_du_plugin, $nom_fonction, $question_de_sarah = NULL) {
        $sql = "INSERT INTO fonction(id_nom, question_de_sarah, nom_plugin) VALUES (?,?,?) "
                . " ON DUPLICATE KEY UPDATE id_nom = values(id_nom), question_de_sarah = values(question_de_sarah), nom_plugin = values(nom_plugin) ";

        $statement = Connexion::getInstance()->prepare($sql);
        $statement->bindValue(1, $nom_fonction);
        $statement->bindValue(2, $question_de_sarah);
        $statement->bindValue(3, $nom_du_plugin);
        if ($statement->execute()) {
            return "la fonction " . $nom_du_plugin . " est bien inséré dans la base.";
        } else {
            echo __FILE__ . ': ' . __LINE__ . ' ';
            echo $sql;
            return($statement->errorInfo());
        }
    }
    

    function get_fonction($id_nom) {
        $sql = "SELECT * FROM fonction WHERE id_nom = $id_nom ";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }

    public static function get_first_function ($nom_plugin) {
        $sql = "SELECT * FROM fonction WHERE nom_plugin = ? GROUP BY nom_plugin";
        $statement = Connexion::getInstance()->prepare($sql);
        
        $statement->bindValue(1, $nom_plugin);
        if ($statement->execute()) {
            $tab = $statement->fetchAll(PDO::FETCH_ASSOC);
            var_dump($tab);
            return ($tab[0]['id_nom']);
        } else {
            return($statement->errorInfo());
        }
    }

        public static function get_fonctions($nom_plugin) {
        $sql = "SELECT * FROM fonction WHERE nom_plugin = '$nom_plugin' ";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }

    function set_fonction($old_id_nom, $numero, $question_de_sarah, $nom_de_plugin) {
        $sql = "UPDATE fonction SET numero = $numero, question_de_sarah = $question_de_sarah, nom_plugin = $nom_de_plugin, id_nom = $nom_de_plugin$numero "
                . " WHERE id_nom = $old_id_nom";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return $old_id_nom . " est bien modifié par " . $nom_de_plugin + $numero;
        } else {
            return($statement->errorInfo());
        }
    }

    function delete_fonction($id_nom) {
        $sql = "DELETE FROM fonction WHERE id_nom = $id_nom";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return $id_nom . " est bien supprimé";
        } else {
            return($statement->errorInfo());
        }
    }

}
