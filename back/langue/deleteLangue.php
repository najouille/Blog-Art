<?php

require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/angle.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/motcle.class.php';
include __DIR__ . '/initLangue.php';


// Init variables form
if (!isset($_GET['id'])) $_GET['id'] = '';
$supprImpossible = false;
$deleted = false;
$numPays = '';
$frPays = '';
$langue = new LANGUE;
$thematique = new THEMATIQUE;
$angl = new ANGLE;
$motCle = new MOTCLE;

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if ($_POST["Submit"] === "Annuler") {
        header("Location: ./langue.php");
        die();
    }

    $numLang = $_POST["id"];
    $resultLangue = $langue->get_1LangueByPays($numLang);

    $thematiques = $thematique->get_AllThematiquesByLang($numLang);
    $angles = $angl->get_AllAnglesByLang($numLang);
    $motcles = $motCle->get_AllMotClesByLang($numLang);

    if (!$thematiques && !$angles && !$motcles) {
        $langue->delete($numLang);
        $deleted = true;
    } else {
        $supprImpossible = true;
    }
} else {
    $numLang = $_GET["id"];
    $resultLangue = $langue->get_1LangueByPays($numLang);
}

if ($resultLangue) {
    $lib1Lang = $resultLangue["lib1Lang"];
    $lib2Lang = $resultLangue["lib2Lang"];
    $numPays = $resultLangue["numPays"];
    $frPays = $resultLangue["frPays"];
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Langue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="../css/back-office.css" rel="stylesheet" type="text/css" />
    <link href="../css/footer-back.css" rel="stylesheet" type="text/css" />
</head>

<body class="twa-back">
    <<div class="title">
        <img class='logo' src="../../front/assets/image/Townyart.png" alt="logo-townyart">
        <h1>BLOGART21 Admin - Gestion du CRUD Langue</h1>
        </div>
        <h3>Suppression d'une langue</h3>

        <form method="post" action="<?= "./deleteLangue.php?id=" . $numLang; ?>" enctype="multipart/form-data">
            <div class="fieldset-container">
                <fieldset>
                    <legend class="legend1">Formulaire Langue...</legend>

                    <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

                    <div class="control-group">

                        <div class="container-input">
                            <label class="control-label" for="lib1Lang">Désignation :</label>
                            <input type="text" name="lib1Lang" id="lib1Lang" size="40" maxlength="80" value="<?= $deleted ? '' : $lib1Lang; ?>" disabled /><br><br>
                        </div>

                        <div class="container-input">
                            <label class="control-label" for="lib2Lang">Dénomination :</label>
                            <input type="text" name="lib2Lang" id="lib2Lang" size="40" maxlength="80" value="<?= $deleted ? '' : $lib2Lang; ?>" disabled /><br><br>
                        </div>

                        <div class="container-input">
                            <label class="control-label" for="numPays">Pays :</label>
                            <select name="numPays" id="numPays" disabled>
                                <option value="<?= $deleted ? '' : $numPays; ?>" selected><?php echo $deleted ? '' : $frPays; ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="controls">

                        <input class="input-button" type="submit" value="Annuler" name="Submit" />
                        <input class="input-button" type="submit" value="Valider" name="Submit" />

                    </div>
                </fieldset>
            </div>
            <div class="align-footer"> 
            <?php
            require_once __DIR__ . '/footerLangue.php';
            
            require_once __DIR__ . '/footer.php';
            ?>   
            </div> 
        </form>
        <br>
        <?php

        if ($supprImpossible) {
            echo '<p style="color:red;">Impossible de supprimer la langue "' . $lib2Lang . '" car elle est référencée par les éléments suivant :</p>';

            if ($thematiques) {
                echo '<p>Table THEMATIQUE :</p>';
                echo '<ul>';
                foreach ($thematiques as $row) {
                    echo '<li>' . $row["libThem"] . '</li>';
                }
                echo '</ul>';
            }

            if ($angles) {
                echo '<p>Table ANGLE :</p>';
                echo '<ul>';
                foreach ($angles as $row) {
                    echo '<li>' . $row["libAngl"] . '</li>';
                }
                echo '</ul>';
            }

            if ($motcles) {
                echo '<p>Table MOTCLE :</p>';
                echo '<ul>';
                foreach ($motcles as $row) {
                    echo '<li>' . $row["libMotCle"] . '</li>';
                }
                echo '</ul>';
            }
        } elseif ($deleted) {
            echo '<p style="color:green;">La langue "' . $lib2Lang . '" a été supprimée.</p>';
        }
        ?>
</body>

</html>