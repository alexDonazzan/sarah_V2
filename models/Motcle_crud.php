<?php

require_once '../models/connexion.php';

/**
 * Description of crud_motcle
 *
 * @author alexa
 */
class Motcle_crud {

    public static function insert_motcle_temp() {
        $sql = "INSERT INTO mot_cle(id_motcle, libelle, image, reponse_de_sarah, video,  pointe_vers_fonction, exec, id_nom)
                SELECT id_motcle, libelle, image, reponse_de_sarah, video,  pointe_vers_fonction, exec, id_nom 
                FROM mot_cle_temp ";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return "Les anciens mots clés ont été réinsérés car un problème est survenu lors de la mise à jour de la BD";
        } else {
            return($statement->errorInfo());
        }
    }


    public static function create_motcle($libelle = null, $reponse_de_sarah = null, $pointe_vers_fonction = null, $exec = null, $id_nom = null, $image = null, $video = null) {
        $sql = "INSERT INTO mot_cle(libelle, reponse_de_sarah, pointe_vers_fonction, exec, id_nom, image, video) "
                . "VALUES (?,?,?,?,?,?,?)  ON DUPLICATE KEY UPDATE pointe_vers_fonction = values(pointe_vers_fonction)";

//        '$libelle','$reponse_de_sarah', '$pointe_vers_fonction', '$exec',  '$id_nom', '$image', '$video'

        $statement = Connexion::getInstance()->prepare($sql);
        $statement->bindValue(1, $libelle);
        $statement->bindValue(2, $reponse_de_sarah);
        $statement->bindValue(3, $pointe_vers_fonction);
        $statement->bindValue(4, $exec);
        $statement->bindValue(5, $id_nom);
        $statement->bindValue(6, $image);
        $statement->bindValue(7, $video);

        if ($statement->execute()) {
            return TRUE;
        } else {
            //echo __FILE__ . ': ' . __LINE__ . ' ';
            
            return print_r($statement->errorInfo());
        }
    }

    public static function __construct_Reponse($id_nom, $libelle, $text) {
        $sql = "INSERT INTO mot_cle(id_nom, libelle, text_donne) VALUES ($id_nom, $libelle, $text)  ";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return "le mot clé " . $libelle . " est bien inséré.";
        } else {
            return($statement->errorInfo());
        }
    }

    public static function __construct_video_exe($id_nom, $libelle, $video) {
        $sql = "INSERT INTO mot_cle(id_nom, libelle, video) VALUES ($id_nom, $libelle, $video)  ";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return "le mot clé " . $libelle . " est bien inséré.";
        } else {
            return($statement->errorInfo());
        }
    }

    public static function __construct_reponse_exe($id_nom, $libelle, $reponse, $video) {
        $sql = "INSERT INTO mot_cle(id_nom, libelle, video, text_donne) VALUES ($id_nom, $libelle, $video, $reponse)  ";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return "le mot clé " . $libelle . " est bien inséré.";
        } else {
            return($statement->errorInfo());
        }
    }

    public function __construct_pointe($id_nom, $libelle, $pointe_vers_fonction) {
        $sql = "INSERT INTO mot_cle(id_nom, libelle, pointe_vers_fonction) VALUES ($id_nom, $libelle, $pointe_vers_fonction)";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return "le mot clé " . $libelle . " est bien inséré.";
        } else {
            return($statement->errorInfo());
        }
    }

    public static function get_data_action($nom_plugin) {
        $sql = "SELECT `libelle`, fonction.id_nom FROM mot_cle, fonction, plugin "
                . "WHERE mot_cle.id_nom = fonction.id_nom AND plugin.nom_plugin = fonction.nom_plugin "
                . " AND plugin.nom_plugin = ? "
                . "GROUP BY fonction.id_nom ";
        $statement = Connexion::getInstance()->prepare($sql);
        $statement->bindValue(1, $nom_plugin);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }

    public static function get_motcle_du_plugin($nom_plugin) {
        $sql = "SELECT * FROM mot_cle, fonction, plugin WHERE 
plugin.nom_plugin = fonction.nom_plugin
AND fonction.id_nom = mot_cle.id_nom 
AND plugin.nom_plugin = ? ";
        $statement = Connexion::getInstance()->prepare($sql);
        $statement->bindValue(1, $nom_plugin);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }

    public static function get_motcles($nom_fonction) {
        $sql = "SELECT * FROM mot_cle WHERE id_nom = '$nom_fonction' ";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }

    public static function get_motcle_fonction($libelle) {
        $sql = "SELECT * FROM mot_cle WHERE pointe_vers_fonction = '$libelle'";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }

    public static function get_motcle_exec($exec) {
        $sql = "SELECT * FROM mot_cle WHERE exec = '$exec'";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }

    public static function get_motcle_reponse($libelle) {
        $sql = "SELECT * FROM mot_cle WHERE reponse_de_sarah = '$libelle'";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }

    public static function set_motcle($id_motcle, $new_libelle, $new_image, $new_reponse_de_sarah, $new_video, $new_pointe_vers_fonction, $exec) {
        $sql = "UPDATE mot_cle SET libelle = $new_libelle, image = $new_image, reponse_de_sarah = $new_reponse_de_sarah, video = $new_video, pointe_vers_fonction = $new_pointe_vers_fonction, exec = $exec,  WHERE id_motcle = '$id_motcle' ";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return ($statement->fetchAll(PDO::FETCH_ASSOC));
        } else {
            return($statement->errorInfo());
        }
    }

    public static function set_motcle_image($id, $new_image) {
        $sql = "UPDATE mot_cle SET libelle = $new_image WHERE id_motcle = $id ";


        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return $new_image . " est bien modifié.";
        } else {
            return($statement->errorInfo());
        }
    }

    public static function set_motcle_text_donne($id, $new_text_donne) {
        $sql = "UPDATE mot_cle SET reponse_de_sarah = $new_text_donne WHERE id_motcle = $id ";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return $old_text_donne . " est bien modifié par " . $new_text_donne;
        } else {
            return($statement->errorInfo());
        }
    }

    public static function set_motcle_video($id, $new_video) {
        $sql = "UPDATE mot_cle SET video = $new_video WHERE id_motcle = $id ";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return $old_video . " est bien modifié par " . $new_video;
        } else {
            return($statement->errorInfo());
        }
    }

    public static function delete_motcle($id) {
        $sql = "DELETE FROM mot_cle WHERE id_motcle = $id";
        $statement = Connexion::getInstance()->prepare($sql);
        if ($statement->execute()) {
            return $id . " est bien supprimé";
        } else {
            return($statement->errorInfo());
        }
    }

    public static function delete_motcle_du_plugin($nom_plugin) {
        $sql = "DELETE FROM `mot_cle` WHERE mot_cle.id_nom IN ( SELECT id_nom FROM fonction WHERE nom_plugin = ?)";
        $statement = Connexion::getInstance()->prepare($sql);
        $statement->bindValue(1, $nom_plugin);
        if ($statement->execute()) {
            return "Les mots clés du plugin ".$nom_plugin." sont bien supprimés.";
        } else {
            return($statement->errorInfo());
        }
    }

}
