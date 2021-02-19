<?php
/////////////////////////////////////////////////////
//
//  CRUD LANGUE (PDO) - Modifié - 6 Décembre 2020
//
//  Script  : updateLangue.php  (ETUD)   -   BLOGART21
//
/////////////////////////////////////////////////////

require_once __DIR__ . '/../../util/utilErrOn.php';
require_once __DIR__ . '/../../CLASS_CRUD/langue.class.php';
require_once __DIR__ . '/../../CLASS_CRUD/motcle.class.php';
include __DIR__ . '/initMotCle.php';

if (!isset($_GET['id'])) $_GET['id'] = '';

$lang = new LANGUE;
$motcle = new MOTCLE;
$updated = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numMotCle = $_POST["id"];
    $libMotCle = $_POST["libMotCle"];
    $numLang = $_POST["numLang"];

    
    if (isset($numMotCle) && isset($libMotCle) && isset($numLang)) {
        $motcle->update($numMotCle, $libMotCle, $numLang);
        $updated = true;
    } else {
        $updated = false;

    }
} else {
    $numMotCle = $_GET["id"];
}

$resultMotCle = $motcle->get_1MotCle($numMotCle);

if ($resultMotCle) {
    $numMotCle = $resultMotCle["numMotCle"];
    $libMotCle = $resultMotCle["libMotCle"];
    $numLang = $resultMotCle["numLang"];
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Admin - Gestion du CRUD Langue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <h1>BLOGART21 Admin - Gestion du CRUD MotCle</h1>
    <h2>Modifification d'un mot cle</h2>

    <?php
    if ($updated) {
        echo '<p style="color:blue;">Le mot-clé "' . $libMotCle . '" a été bien modifié.</p>';
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo '<p style="color:red;">Le mot-clé pas été modifié</p>';
    }
    ?>


    <form method="post" action="<?= "./updateMotCle.php?id=" . $numMotCle; ?>" enctype="multipart/form-data">

        <fieldset>
            <legend class="legend1">Formulaire Langue...</legend>

            <input type="hidden" id="id" name="id" value="<?= $_GET['id']; ?>" />

            <div class="control-group">
                <label for="libMotCle">Libellé</label>
                <input type="text" name="libMotCle" id="libMotCle" placeholder="Désignation" value="<?= $libMotCle ?>" autofocus>

                <label class="control-label" for="numLang"><b>Pays :</b></label>
                <select name="numLang" id="numLang">
                    <?php
                    $allLang = $lang->get_AllLangues();
                    foreach ($allLang as $row) {
                        if ($row["numLang"] === $numLang) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                        echo '<option value="' . $row["numLang"] . '" ' . $selected . '>' . $row["lib2Lang"] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="control-group">
                <div class="controls">
                    <br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Initialiser" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                    <br>
                </div>
            </div>
        </fieldset>
    </form>
    <?php

    require_once __DIR__ . '/footerMotCle.php';
    require_once __DIR__ . '/footer.php';
    ?>
</body>

</html>