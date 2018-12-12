<!DOCTYPE html>
<html lang="fr">
<head>

       <?php include_once 'views/includes/head.php'?>    

</head>
<body>
    <?php include_once 'views/includes/nav.php'?>
    <?php include_once 'views/includes/header_2.php'?>

<article>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
   
                <!-- Only sentences href to chapitres page-->
                    <?php foreach ($allArticles as $index => $article): ?>
                        <div class="post-preview">
                            <h2 class="section-heading"><?= $article['title'] ?></h2>
                            <h3 class="post-subtitle"><?= $article['sentence'] ?></h3>
                            <p><?= $article['content'] ?></p>
                            <br>
                            <p class="post-meta">Posté par&nbsp;<a href="index.php?page=contact"><?= $article['firstname'].' '.$article['lastname'] ?> &nbsp;<?= date_format(date_create($article['date']), "d.m.Y H:i:s") ?></a></p>
                        </div>
                    <?php endforeach; ?>                
                    <hr>

                    
                </div>
            </div>
            <p><span>&nbsp;Photographs by&nbsp;</span><a href="https://www.pexels.com">John Doe</a>.</p>
        </div>
    </article>

<?php include_once 'views/includes/footer.php'?>
<?php include_once 'views/includes/scriptsLink.php'?>
</body>
</html>