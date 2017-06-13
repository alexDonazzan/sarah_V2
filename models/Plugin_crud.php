<?php

require_once '../models/connexion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of crud_plugin
 *
 * @author alexa
 */
class Plugin_crud {

    public function __construct() {
    }

    public static function create_plugin($nom_du_plugin) {
        $sql = "INSERT INTO plugin(nom_plugin) values (?)"
                . " ON DUPLICATE KEY UPDATE nom_plugin = values(nom_plugin)";
        $statement = Connexion::getInstance()->prepare($sql);
        $statement->bindValue(1, $nom_du_plugin);
        if ($statement->execute()) {
            return $nom_du_plugin . " est bien inséré.";
        } else {
            return($statement->errorInfo());
        }
    }

    public static function getNoms_des_plugins() {
        $sql = "SELECT * FROM plugin";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }

    public function getNom_du_plugin($id) {
        $sql = "SELECT * FROM plugin WHERE nom_plugin = $id ";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }

    public function setNom_du_plugin($new_name, $old_name) {
        $sql = "UPDATE plugin SET nom_plugin = :new_name WHERE nom_plugin = '$old_name' ";
        $statement = Connexion::getInstance()->prepare($sql);
        $statement->bindParam('new_name', $new_name);
        if ($statement->execute()) {
            return ($old_name.' a bien été renommé');
        } else {
            return($statement->errorInfo());
        }
    }

    public static function deleteNom_du_plugin($name) {
        $sql = "DELETE FROM plugin WHERE nom_plugin = :name";
        $statement = Connexion::getInstance()->prepare($sql);
        $statement->bindParam('name', $name);
        if ($statement->execute()) {
            return $name . " est bien supprimé";
        } else {
            return($statement->errorInfo());
        }
    }

}
