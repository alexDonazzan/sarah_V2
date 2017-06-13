<?php


/**
 * 
 * @param integer $question (id de la question)
 * paramêtre par défaut : question 1
 * Renvoi la reponse ainsi que le type d'objet lié à la question sous forme de tableau avec comme paramêtre le nom des champs
 */
function get_Reponse($question = 1) {
    $sql = "SELECT reponse, objet, type_obj FROM base WHERE id=?";

    $statement = Connexion::getInstance()->prepare($sql);
    $statement->bindValue(1, $question);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS);
}

/**
 * 
 * @param String $reponse
 * @param Int $id
 */
function set_Reponse($reponse, $id) {
    $sql = "UPDATE base SET reponse = ? WHERE id = ?";

    $statement = Connexion::getInstance()->prepare($sql);
    $statement->bindValue(1, $reponse);
    $statement->bindValue(2, $id);
    $statement->execute();
    if ($statement->execute()) {
        echo "<script>alert(\"La question est bien mise à jour.\")</script>";
    } else {
        echo "<script>alert(\"La question n'a pas été mise à jour.\")</script>";
    }
}

function delete_Reponse($id) {
    $sql = "DELETE FROM base WHERE id = ?";
    $statement = Connexion::getInstance()->prepare($sql);
    $statement->bindValue(1, $id);
    if ($statement->execute()) {
        echo "<script>alert(\"La question est bien supprimée.\")</script>";
    } else {
        echo "<script>alert(\"La question n'a pas été supprimé.\")</script>";
    }
}

function create_Reponse($category_id, $theme_id, $sujet_id, $question, $reponse, $objet = NULL, $type_obj = NULL, $type = "Q", $code = NULL) {
    $sql = "INSERT INTO base (category_id, theme_id, sujet_id, type, question, code, reponse, objet, type_obj)
VALUES ('$category_id', '$theme_id', '$sujet_id', '$type', '$question', '$code', '$reponse', '$objet', '$type_obj')";

    $statement = Connexion::getInstance()->prepare($sql);
    if ($statement->execute()) {
        echo "<script>alert(\"La question est bien crée.\")</script>";
    } else {
        echo "<script>alert(\"La question n'a pas été créé.\")</script>";
    }
}
