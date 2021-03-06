<?php
///////////////////////////////////////////////////////////////
//
//  CRUD STATUT (PDO) - Code Modifié - 23 Janvier 2021
//
//  Script  : deleteStatut.php  (ETUD)   -   BLOGART21
//
///////////////////////////////////////////////////////////////

require_once __DIR__ . "/../../util/utilErrOn.php";
require_once __DIR__ . "/../../util/ctrlSaisies.php";
require_once __DIR__ . "/../../CLASS_CRUD/statut.class.php";
require_once __DIR__ . "/../../CLASS_CRUD/user.class.php";

global $db;
$statut = new STATUT();
$monUser = new USER();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Opérateur ternaire
    $Submit = isset($_POST["Submit"]) ? $_POST["Submit"] : "";

    if (isset($_POST["Submit"]) and $_POST["Submit"] === "Annuler") {
        header("Location: ./statut.php");
    }

    if (
        isset($_POST["id"]) &&
        $_POST["id"] > 0 &&
        (!empty($_POST["Submit"]) && $Submit === "Valider")
    ) {
        $idStat = ctrlSaisies($_POST["id"]);

        $allUser = $monUser->get_NbAllUsersByidStat($idStat);

        if (!($allUser > 0)) {
            $statut->delete($idStat);
            header("Location: ./statut.php?user_count=" . $allUser);
        } else {
            header("Location: ./statut.php?result=error&user_count" . $allUser);
        }
    } // End of if ((isset($_POST['id'])
} // End of if ($_SERVER["REQUEST_METHOD"] === "POST")
include __DIR__ . "/initStatut.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Statut</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="../css/back-office.css" rel="stylesheet" type="text/css" />
    <link href="../css/footer-back.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        #p1 {
            max-width: 600px;
            width: 600px;
            max-height: 200px;
            height: 200px;
            border: 1px solid #000000;
            background-color: whitesmoke;
            /* Coins arrondis et couleur du cadre */
            border: 2px solid grey;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius: 8px;
        }

        .error {
            padding: 2px;
            border: solid 0px black;
            color: red;
            font-style: italic;
            border-radius: 5px;
        }
    </style>
</head>

<body class="twa-back">
    <div class="title">
        <img class='logo' src="../../front/assets/image/Townyart.png" alt="logo-townyart">
        <h1>BLOGART21 Admin - Gestion du CRUD Statut</h1>
    </div>
    <h3>Suppression d'un Statut</h3>
    <?php

    if (isset($_GET["id"]) and $_GET["id"] > 0) {
        $id = ctrlSaisies($_GET["id"]);
        $query = $statut->get_1Statut($id);

        if ($query) {
            $libStat = $query[0]["libStat"];
            $idStat = $query[0]["idStat"];
        } // Fin if ($query)
    }
    // Fin if (isset($_GET['id'])...)
    ?> <form method="post" action="./deleteStatut.php" enctype="multipart/form-data">
        <div class="fieldset-container">
            <fieldset>
                <legend class="legend1">Formulaire Statut...</legend>

                <input type="hidden" id="id" name="id" value="<?= $_GET["id"] ?>" />

                <div class="control-group">
                    <div class="container-input">
                        <label class="control-label" for="libStat"><b>Nom du statut :</b></label>
                        <input type="text" name="libStat" id="libStat" size="80" maxlength="80" value="<?= $libStat ?>" disabled="disabled" />
                    </div>
                </div>


                <div class="controls">
                    <input class="input-button" type="submit" value="Annuler" name="Submit" />
                    <input class="input-button" type="submit" value="Valider" name="Submit" />
                </div>

            </fieldset>
            <div class="align-footer">
                <?php
                require_once __DIR__ . "/footerStatut.php";
                require_once __DIR__ . "/footer.php";
                ?>
            </div>
    </form>

</body>

</html>