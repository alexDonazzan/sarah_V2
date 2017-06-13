<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Temp_mot_cle
 *
 * @author alexa
 */
class Temp_mot_cle {

    public static function create_table_motcle_temporaire($nom_plugin) {

        $sql = "DROP TABLE IF EXISTS `mot_cle_temp`;
CREATE TABLE IF NOT EXISTS `mot_cle_temp` (
  `id_motcle` int(11) NOT NULL,
  `libelle` varchar(1000) DEFAULT NULL,
  `image` varchar(2500) DEFAULT NULL,
  `reponse_de_sarah` varchar(25000) DEFAULT NULL,
  `video` varchar(2500) DEFAULT NULL,
  `pointe_vers_fonction` varchar(1000) DEFAULT NULL,
  `exec` varchar(150) DEFAULT NULL,
  `id_nom` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_motcle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return "la table mots clés temporaire pour le plugin " . $nom_plugin . " a bien été créée.";
        } else {
            echo __FILE__ . ': ' . __LINE__ . ' ';
            echo $sql;
            return($statement->errorInfo());
        }
    }

    public static function update_table_mot_cle_temporaire($nom_plugin) {

        $sql = "INSERT INTO mot_cle_temp(id_motcle, libelle, image, reponse_de_sarah, video,  pointe_vers_fonction, exec, id_nom)
                SELECT id_motcle, libelle, image, reponse_de_sarah, video,  pointe_vers_fonction, exec, id_nom 
                FROM mot_cle 
                WHERE mot_cle.id_nom IN ( SELECT id_nom FROM fonction WHERE nom_plugin = ?)";

        $statement = Connexion::getInstance()->prepare($sql);
        $statement->bindValue(1, $nom_plugin);
        if ($statement->execute()) {
            return "La table temporaire a bien été peuplé pour le plugin " . $nom_plugin;
        } else {
            return($statement->errorInfo());
        }
    }

    public static function delete_mot_cle_temp() {
        $sql = "DROP TABLE IF EXISTS `mot_cle_temp`";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return "La table temporaire a bien été supprimé.";
        } else {
            return($statement->errorInfo());
        }
    }

}
