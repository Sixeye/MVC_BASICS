<!DOCTYPE html>
<html lang="fr">

<head>

    <?php include_once 'app/views/includes/head.php'?>

</head>

<body>

    <?php include_once 'app/views/includes/nav.php'?>
    <?php include_once 'app/views/includes/header_3.php'?>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">

                <!-- Only sentences href to chapitres page-->
                <?php foreach ($allActualites as $index => $actualite): ?>
                <div class="post-preview">
                    <h2 class="section-heading">
                        <?= $actualite['title'] ?>
                    </h2>
                    <h3 class="post-subtitle">
                        <?= $actualite['sentence'] ?>
                    </h3>
                    <p>
                        <?= $actualite['content'] ?>
                    </p>
                    <br>
                    <p class="post-meta">Posté par&nbsp;<a href="index.php?page=contact">
                            <?= $actualite['firstname'].' '.$actualite['lastname'] ?> &nbsp;
                            <?= date_format(date_create($actualite['date']), "d.m.Y H:i:s") ?></a></p>
                </div>
                <?php endforeach; ?>
                <hr>


            </div>
        </div>
    </div>
    <hr>

    <?php include_once 'app/views/includes/footer.php'?>
    <?php include_once 'app/views/includes/scriptsLink.php'?>
</body>

</html>
