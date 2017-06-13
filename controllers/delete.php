

    <?php
    require_once '../models/connexion.php';
    require_once '../models/Plugin_crud.php';
    $nom_plugin = $_GET['nom_plugin'];


    print_r(Plugin_crud::deleteNom_du_plugin($nom_plugin));

    header("Location: http://localhost/sarah_V2/controllers/menu.php");
        
        exit();