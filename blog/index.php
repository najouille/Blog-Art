<?php
require_once __DIR__ . '/../util/utilErrOn.php';
require_once __DIR__ . '/../CLASS_CRUD/article.class.php';
require_once __DIR__ . '/../CLASS_CRUD/motclearticle.class.php';
global $db;
$article = new ARTICLE;
$motcle = new MOTCLEARTICLE;
$allArticles = $article->get_AllArticles();

$jsonDataFile = file_get_contents("../front/assets/articles.json");
if ($jsonDataFile === false) {
    // deal with error...
    echo 'error with json';
}
$articles = json_decode($jsonDataFile, true);

function getDescription($articleName, $arts)
{
    $result = array_filter($arts, function ($k)  use ($articleName) {
        return $k['name'] == $articleName;
    }, ARRAY_FILTER_USE_BOTH);
    return array_values($result)[0]['description'];
};

function getPath($thematique, $id)
{
    switch ($thematique) {
        case 'THE0101':
            return './evenement?id=' . $id ;
            break;
        case 'THE0102':
            # code...
            return './portrait?id=' . $id ;
            break;
        case 'THE0104':
            # code...
            return './insolites?id=' . $id ;
            break;

        default:
            # code...
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <?php
    include('../front/includes/commons/headRequired.php')
    ?>
    <link rel="stylesheet" href="../front/assets/master.css" />
    <title>Document</title>
    <link rel="stylesheet" href="../front/assets/blog.css">
    <link rel="stylesheet" href="../front/assets/navbar.css">
    <link rel="stylesheet" href="../front/assets/footer.css">
</head>

<body class='style'>
    <?php
    include('../front/includes/commons/navbar.php');

    ?>
    <img src="../front/assets/image/blogbanniere.png" alt="urban banniere" id="banniere" />
    <div class="intro">
        <div class="text">
            <h2>Notre blog</h2>
            <p class="description">Nous nous sommes particulièrement intéressés à la culture urbaine, et après de multiples recherches personnelles et de magnifiques trouvailles, nous avons décidé de vous les partager. Alors, voici quelques articles, qui, on l’espère, te plairont ! Bonne lecture !</p>
        </div>
        <div class="search">

            <label for="searchInput" class="searchsvg">
                <input type="text" id="searchInput" name="searchInput" value="rechercher">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="35" height="35" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="10" cy="10" r="7" />
                    <line x1="21" y1="21" x2="15" y2="15" />
                </svg>
            </label>

            <select class="trier">
                <option value="">Trier par :</option>
                <option value="ascending">Ascending</option>
                <option value="descending">descending</option>
            </select>
        </div>
    </div>
    <div class='maxiconteneurblog'>

        <?php

        foreach ($allArticles as $value) {
            $libTitrArt = $value['libTitrArt'];
            echo '<!--';
            print_r($value);
            echo '-->';

        ?>

            <a href="<?= getPath($value['numThem'],$value['numArt']) ?>" class='etiquetteblog'>
                <img class='tailleimg' src="<?= '../' . $value['urlPhotArt'] ?>" alt="street art jazz">
                <div class='conteneurblog'>

                    <?php
                    $resultOfAllMotcles = $motcle->get_AllMotClesByArticle($value['numArt']);
                    $allMotcle = array_splice($resultOfAllMotcles, 0, 4);
                    foreach ($allMotcle as $motcleElm) {
                        echo '<span class="tag">' . $motcleElm['libMotCle'] . '</span>';
                    }

                    ?>

                </div>
                <h3><?= $value['libTitrArt'] ?></h3>
                <h4><?= getDescription($libTitrArt, $articles) ?></h4>
            </a>

        <?php
        }

        ?>


    </div>
    <div class='maxiconteneurblog opacity-10 soon-banner-container'>
        <div class="soon-banner">
            <span class="soon-texte"> Ne soit pas trop impatient...<br>
                Ça arrive très prochainement !</span>
        </div>
        <div class='etiquetteblog'>
            <img class='tailleimg' src="<?= '../front/assets/image/jon-tyson-HuRTqaEMD4I-unsplash 1.png' ?>" alt="street art jazz">
            <div class='conteneurblog'>
                <span class='tag'>
                    Street-Art
                </span>
                <span class='tag'>
                    photographie
                </span>
                <span class='tag'>
                    Evènement
                </span>
                <span class='tag'>
                    Art
                </span>
            </div>
            <h3>Le street-art à Bordeaux, un milieu des plus tendances</h3>
            <h4>Vous apprendrez ici beaucoup sur l’origine du street-art, son application à Bordeaux ainsi que les nombreux évennements organisés autour de cet art.</h4>
        </div>


        <div class='etiquetteblog'>
            <img class='tailleimg' src="<?= '../front/assets/image/portaitphotographe.png' ?>" alt="portrait">
            <div class='conteneurblog'>
                <span class='tag'>
                    Urbain
                </span>
                <span class='tag'>
                    Photographie
                </span>
                <span class='tag'>
                    Architecture
                </span>
                <span class='tag'>
                    Art
                </span>
            </div>
            <h3>Portrait de Frédéric Ducos, photographe bordelais</h3>
            <h4>Vous découvrirez, dans cet article, le parcours d’un photographe parti de rien qui, aujourd’hui, cotoie les plus grands.</h4>
        </div>



        <div class='etiquetteblog'>
            <img class='tailleimg' src="<?php '../front/assets/image/Statue.png' ?>" alt="Statue">
            <div class='conteneurblog'>
                <span class='tag'>
                    Street-Art
                </span>
                <span class='tag'>
                    photographie
                </span>
                <span class='tag'>
                    Insolite
                </span>
                <span class='tag'>
                    Art
                </span>
            </div>
            <h3>3 lieux insolites à découvrir absolument</h3>
            <h4>Bordeaux regorge de trésors cachés. Nous vous livrons dans cet article trois de ces derniers.</h4>
        </div>
    </div>


    <?php
    include('../front/includes/commons/footer.php');
    ?>
</body>

</html>