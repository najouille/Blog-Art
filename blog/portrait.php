<?php
require_once('../front/assets/vendors/parsedown.php');
$Parsedown = new Parsedown();
$numArt = "";
$dtCreArt = "";

///
$libTitrArt = "Portrait de Frédéric Ducos, photographe bordelais";
$libChapoArt = "En 2014, [Frédéric Ducos](https://fredericducos.com) a choisi de quitter le milieu du vin pour rejoindre celui de la
photographie. Une reconversion, on peut le dire, réussie ! En effet,
quelques années plus tard, il remporte le [Umbra International Photography Awards](https://www.umbrawards.com/), un concours de renommée mondiale. Pourtant, à première vue, le pari
était risqué. N’ayant jamais touché à un appareil, Frédéric a pris ses
premiers cours de photographie sur la place de la Bourse à Bordeaux.
Ce fut un réel déclic qui lui a donné envie de se lancer pleinement
dans le domaine. Un an et demi après, il s’installe en tant
qu’artiste-photographe. Aujourd’hui, âgé de 44 ans, il vit de sa
passion.";
$libAccrochArt = "## “La photographie est l’expression d’émotions par la recherche d’un certain minimalisme”";
$parag1Art = "### Le désir de créer et de partager

  Les périodes creuses de la vie ont parfois leurs avantages. Celle de
  Frédéric Ducos lui aura permis de se rendre compte d’une chose :
  l’importance de créer. C’est un véritable tremplin de motivation qui
  va le pousser à se lancer dans la photographie à plein temps. Un
  milieu qu’il nous décrit comme emprunt de diversité et de possibilités
  artistiques. En effet, on peut divaguer entre la photo d’art, la
  publicité et bien d’autres domaines. Ce moyen d’expression offre
  également la possibilité de rencontrer du monde et ainsi de partager
  sa passion, de la pluraliser.

  Très vite, la photographie urbaine a pris une grande place dans sa vie
  artistique. C’est à la suite de plusieurs voyages (en Espagne
  notamment) qu’il se rend compte de la beauté de l’architecture. Ces
  éléments géométriques, omniprésents dans nos villes, sont ainsi
  devenus une obsession pour le photographe. Il nous confie d’ailleurs
  passer beaucoup de temps à étudier les angles, les lignes ou encore
  les perspectives. Capturer l’aspect géométrique pour en retirer une
  émotion lui parle beaucoup.

  Bordeaux devient le terrain d’entraînement du photographe même si,
  dit-il, cette ville est assez difficile à photographier. La fusion
  entre l’ancien et le moderne mêle beaucoup de formes différentes et
  complexes. Il finira tout de même par choisir son quartier de
  prédilection : la place de la Bourse et les anciens bâtiments classés
  à l’[UNESCO](https://whc.unesco.org/fr/list/1256/) qui l’entourent. Le tramway offre également l’occasion de mêler
  l’architecture à la vie quotidienne bordelaise.";
$libSsTitr1Art = "### La démarche artistique : capturer l’instant présent";
$parag2Art = "Marcher. Découvrir. Ne rien prévoir. Telle est la philosophie qui
guide Frédéric Ducos. Ce photographe spécialisé dans la photographie
urbaine ne se pose pas de questions. Il part à la découverte de villes
toujours plus intéressantes d’un point de vue artistique et “parfois
les villes qui intéressent ne sont pas celles que l’on croit’’.
Explorer la vie telle qu’elle l’est, observer le monde changer et
capturer les instants d’exception… C’est le processus de réflexion
adopté par le photographe. En effet, Frédéric cherche à se rapprocher
de l'œil du visiteur lambda et soutient que l’inspiration vient
souvent lors d’une première rencontre avec l’endroit dans lequel il se
trouve. Peu importe la météo, ce photographe trouve toujours de
nouvelles inspirations notamment en jouant avec les motifs qui forment
le ciel en constante évolution.

‘’Dans la photo, mon état d’esprit est de ne rien forcer, je suis
observateur, je me balade et je vois ce qui sort.’’

L’utilisation d’un seul objectif (28-300 mm) lui permet une grande
polyvalence, ce n’est pas l’idéal en termes de qualité nous a-t-il
confié, mais cela augmente grandement les possibilités de prises de
vue. De plus, l’utilisation d’un tel objectif diminue son encombrement
et augmente sa mobilité à travers les villes.";
$libSsTitr2Art = "### Un minimalisme au service de l’émotion";
$parag3Art = "Frédéric Ducos est continuellement à la recherche d’une identité
forte. Selon lui, l’un des buts de la photographie est d'arriver à se
démarquer pour ne pas tomber dans le traditionnel. Sa ligne de
conduite est ainsi d’exprimer une vision conceptuelle et poétique du
monde à travers un style unique et reconnaissable. Pour cela,
l’artiste nous confie ses secrets dans une interview qu’il nous a
accordé.

“Selon moi, la photographie est l’expression d’émotions par la
recherche d’un certain minimalisme. Moins il y a d’informations et
plus la photo est forte.”

Il suffit de contempler les clichés du photographe pour s’apercevoir
de l’importance du noir et blanc dans son identité visuelle. Alors
pourquoi utiliser ce procédé ? Cela lui permet de rajouter du grain,
du flou ou encore de travailler la texture sans pour autant surcharger
la photo. L’allègement de l’image est donc à privilégier. Dans la
photo d’art, laisser place à l’imagination est primordial. Le noir et
blanc pousse à réfléchir à cette problématique et améliore la
lisibilité tout en apportant un apportant une touche artistique. On se
positionne sur un élément simple pour exprimer un maximum
d’informations. La couleur n’a de l’importance que si elle apporte
quelque chose. Cet état d’esprit conforte ce qui est mentionné plus
haut. Par ce minimalisme au service de l’émotion, Frédéric Ducos
retranscrit à merveille l’instant présent. Il pousse à l’imagination
et à la réflexion.";
$libConclArt = "En constante recherche d’équilibre artistique, Frédéric Ducos manipule
à la perfection nos sens. Entre beauté visuelle, conceptualisme et
imagination, ses photographies expriment les émotions de l’instant
présent. Parti de rien, l’artiste est aujourd’hui reconnu mondialement
pour son talent et sa personnalité. Cependant, il ne compte pas en
rester là : son objectif est de collaborer plus grandement avec les
marques et ainsi d’adapter ses connaissances de la photographie au
monde du commerce.";
///
$urlPhotArt = "";
$urlPhotArt = "";
$numAngl = "";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include('../front/includes/commons/headRequired.php') ?>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../front/assets/master.css" />
  <link rel="stylesheet" href="../front/assets/navbar.css" />
  <link rel="stylesheet" href="../front/assets/portrait.css" />
  <link rel="stylesheet" href="../front/assets/footer.css" />
  <link rel="stylesheet" href="../front/assets/commentaire.css" />
</head>

<body>
  <?php include('../front/includes/commons/navbar.php') ?>
  <main class="portrait-container">
    <section class="introduction">
      <h1 class="portrait-container">
        <?php
        echo $Parsedown->line($libTitrArt);
        ?>
      </h1>
      <p id="intro">
        <?php
        echo $Parsedown->text($libChapoArt);
        ?>
      <div class="tags">
        <h5>architecture</h5>
        <h5>photographie</h5>
        <h5>urbain</h5>
        <h5>art</h5>
      </div>
      <div class="button">
        <a href="https://www.fredericducos.com" id="Voir ses photos" target="blank">Voir ses photos</a>
      </div>
    </section>
    <div class="bandeau">
      <div class="portrait">
        <img src="../front/assets/image/portraitfredericducos.png" alt="frederic ducos" width="250" id="frederic" />
      </div>
      <?php
      echo $Parsedown->text($libAccrochArt);
      ?>
      <div class="quote">
        <img src="../front/assets/image/quote.svg" alt="" width="190" />
      </div>
    </div>
    <section class="article">
      <?php
      echo $Parsedown->text($parag1Art);
      echo $Parsedown->text($libSsTitr1Art);
      echo $Parsedown->text($parag2Art);
      echo $Parsedown->text($libSsTitr2Art);
      echo $Parsedown->text($parag3Art);
      ?>
      <br>
      <br>
      <?php
      echo $Parsedown->text($libConclArt);
      ?>

      <h6>Le 27/01/2021, Bordeaux</h6>
      <div class="social">
        <a class="social-button" href="https://www.instagram.com/fredericducosphotographer/" target="blank">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="4" y="4" width="16" height="16" rx="4" />
            <circle cx="12" cy="12" r="3" />
            <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
          </svg>
          <span>@fredericducosphotographer</span>
        </a>
        <a class="social-button" href="https://www.fredericducos.com" target="blank">
          <svg width="44" height="44" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M22 38.5c9.113 0 16.5-7.387 16.5-16.5S31.113 5.5 22 5.5 5.5 12.887 5.5 22 12.887 38.5 22 38.5zM6.6 16.5h30.8M6.6 27.5h30.8M21.083 5.5a31.166 31.166 0 000 33M22.916 5.5a31.167 31.167 0 010 33" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" stroke-linejoin="round" />
          </svg>

          <span>www.fredericducos.com</span>
        </a>

        <!-- <a class="website">
            <a href="https://www.fredericducos.com/" target="blank">
              <img
                src="./front/assets/image/internet.svg"
                alt="website"
                width="34"
                id="internet"
            /></a>
            <a href="" id="website" class="links">www.fredericducos.com</a>
          </a> -->
      </div>
    </section>
    <div class="oeuvres">
      <h4>Les oeuvres du photographe</h4>
      <div class="galerie">
        <img src="../front/assets/image/eiffel.jpg" alt="tour-eiffel" id="eiffel" />
        <img src="../front/assets/image/quais.jpg" alt="quais" id="quais" />
        <a href="https://www.fredericducos.com/" id="portfolio" target="blank">Découvrir son portfolio</a>
        <img src="../front/assets/image/bourse2.jpg" alt="bourse2" id="bourse2" />
        <img src="../front/assets/image/arene.jpg" alt="arene" id="arene" />
        <img src="../front/assets/image/bourse1.jpg" alt="bourse1" id="bourse1" />
      </div>
    </div>
  </main>
  <?php
  include('../commentaire.php');

  include('../front/includes/commons/footer.php');
  ?>
</body>

</html>

</html>