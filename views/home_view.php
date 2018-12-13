<!DOCTYPE html>
<html lang="fr">
<head>

    <?php include_once 'views/includes/head.php'?>    

</head>

<body>

    <?php include_once 'views/includes/nav.php'?>
    <?php include_once 'views/includes/header_1.php'?>
    
   <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <!-- Only sentences href to chapitres page-->
                <?php foreach ($allArticles as $index => $article): ?>
                <div class="post-preview">
                    <a href="index.php?page=articles#article-<?= $article['id'] ?>">
                        <h2 class="post-title"><?= $article['title'] ?></h2>
                        <h3 class="post-subtitle"><?= $article['sentence'] ?></h3>
                    </a>
                    <p class="post-meta">Posté par&nbsp;<a href="index.php?page=contact"><?= $article['firstname'].' '.$article['lastname'] ?> &nbsp;<?= date_format(date_create($article['date']), "d.m.Y H:i:s") ?></a></p>
                </div>
                <?php endforeach; ?>                

                <hr>
                <div class="clearfix"><button class="btn btn-primary float-right" type="button"><a href= "index.php?page=articles">ANCIENS CHAPITRES ⇒</a></button></div>
            </div>
        </div>
    </div>
    
<?php include_once 'views/includes/footer.php'?>
<?php include_once 'views/includes/scriptsLink.php'?>

</body>
</html>