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

                    <div class="post-preview" id="article-<?= $article['id'] ?>">
                        <h2 class="section-heading">
                            <?= $article['title'] ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?= $article['sentence'] ?>
                        </h3>
                        <p>
                            <?= $article['content'] ?>
                        </p>
                        <br>
                        <p class="post-meta">Posté par&nbsp;<a href="index.php?page=contact">
                                <?= $article['firstname'] . ' ' . $article['lastname'] ?> &nbsp;
                                <?= date_format(date_create($article['date']), "d.m.Y H:i:s") ?></a>
                        </p>
                        <br>
                        <?php foreach ($getComments[$article['id']] as $comment): ?>
                        
                        <p>
                            <?= $comment['content'] ?>
                        </p>

                        <br>
                        <p class="post-meta">Posté par&nbsp;
                            <p>
                                <?= $comment['nom'] ?> &nbsp;
                                <?= date_format(date_create($comment['date']), "d.m.Y H:i:s" ) ?>
                            </p>
                            <form action="admin_comments" method="POST">
                            <div class="form-group">
                            &nbsp;
                            <button class="btn btn-outline-dark" type="submit" name="signaler" value="<?= $comment['id'] ?>" required>Signaler</button>
                            </form>
                        </div>
                        </p>
                        <?php endforeach; ?>
                        <form action="articles" method="POST">
                        <div class="form-group">
                            <label for="comment">Commentaire:</label>
                            <textarea class="form-control" rows="5" id="comment" name="comment_content" required></textarea>
                            <label for="comment">Nom:</label>
                            <input type="text" name="nom" required>
                            &nbsp;
                            <button class="btn btn-outline-dark" type="submit" name="comment_post" value="<?= $article['id']  ?>" required>Poster</button>
                        </div>
                    
                        </form>
                    </div>
                    <?php  endforeach; ?>
                    <hr>


                </div>
            </div>
            <p><span>&nbsp;Photographs by&nbsp;</span><a href="https://www.pexels.com" id="anciens-articles">John Doe</a>.</p>
        </div>
    </article>

    <?php include_once 'views/includes/footer.php'?>
    <?php include_once 'views/includes/scriptsLink.php'?>
</body>

</html>
