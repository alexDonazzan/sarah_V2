<?php
require_once 'Spyc.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Connexion est un singleton qui permet la connexion à la base de donnée en utilisant un fichier de configuration database.yml dans le dossier config
 * @author Alexandre DONAZZAN
 */
class Connexion extends PDO{
    private static $instance;
    private $user;
    private $mdp;
    private $db_name;
    private $hote;

/**
 * 
 * @param string $user     (default "root")
 * @param string $mdp      (default "")
 * @param string $db_name  (default "sarah")
 * @param string $hote     (default "localhost")
 */
    function __construct($user = "root", $mdp ="", $db_name = "sarah", $hote = "localhost") {
        
        $this->user = $user;
        $this->mdp = $mdp;
        $this->db_name = $db_name;
        $this->hote = $hote;
        parent::__construct("mysql:dbname=$db_name;host=$hote;charset=utf8", $user, $mdp);
    }

    /**
     * 
     * @return Connexion objet de la classe connexion qui hérite de PDO
     */
        public static function getInstance(){
        if (self::$instance == NULL) {
            $array = Spyc::YAMLLoad('../config/database.yml');
            $db_name = $array['dsn']['db_name'];
            $hote = $array['dsn']['hote'];
            self::$instance = new Connexion($array['user'], $array['mdp'], $db_name, $hote);
        }
        return self::$instance;
    }
}
