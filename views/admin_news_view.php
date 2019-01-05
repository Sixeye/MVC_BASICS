<?php session_start();
if ($_SESSION['id'] == 1) {
    header("Location: admin_posts");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <?php include_once 'views/includes/admin_head.php'?>
    <?php include_once 'views/includes/tiny_header.php'?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> ADMIN</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a><i class="fa fa-user"></i>AGENT ANNA DESNOS</a>
                </li>
                <li>
                    <a href="_functions/logout.php"><i class="fa fa-fw fa-power-off"></i>LOG OUT</a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php include_once 'views/includes/admin_sidebar2.php'?>


            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <!-- Page Heading -->

                        <?php include_once 'views/includes/admin_header_news.php'?>

                        <form action="admin_news" method="POST">

                            <div class="form-group">

                                <label for="title">TITRE</label>
                                <input type="text" class="form-control" name="ntitle" required>

                                <label for="sentence">PHRASE</label>
                                <input type="text" class="form-control" name="nsentence" required>

                                <label for="content">CONTENU</label>
                                <input type="text" class="form-control" name="content" id="content">

                                <label for="author_id">N° AUTEUR</label>
                                <input type="text" class="form-control" name="nauthor_id"  value="2" required>

                                <label for="category_id">N°CATEGORIE</label>
                                <input type="text" class="form-control" name="ncategory_id"  value="2" required>

                                <div class="form-group"><input type="submit" class="btn btn-primary" name="create_news" value="PUBLIER" required>
                                </div>

                            </div>

                        </form>

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Titre</th>
                                    <th>Phrase d'accroche</th>
                                    <th>Contenu</th>
                                    <th>Date</th>
                                    <th>Administrateur</th>
                                    <th>Catégorie</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($allActualites as $index => $actualite): ?>

                                <tr>
                                    <td>
                                        <?=$actualite['id']?>
                                    </td>
                                    <td>
                                        <?=$actualite['title']?>
                                    </td>
                                    <td>
                                        <?=$actualite['sentence']?>
                                    </td>
                                    <td>
                                        <?=$actualite['content']?>
                                    </td>
                                    <td>
                                        <?=$actualite['date']?>
                                    </td>
                                    <td>
                                        <?=$actualite['author_id']?>
                                    </td>
                                    <td>
                                        <?=$actualite['category_id']?>
                                    </td>
                                    <td>
                                        <form action="admin_nupdate" method="post">
                                            <input type="hidden" name='nupdate' value="<?php echo $actualite['id']?>">
                                            <button type='submit' name='nUpdate'>Modifier</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="admin_news" method="post">
                                            <input type="hidden" name='n_delete' value="<?php echo $actualite['id']?>">
                                            <button type='submit' name='actualitesDelete'>Effacer</button>
                                        </form>
                                    </td>

                                </tr>

                                <?php endforeach; ?>

                            </tbody>
                        </table>



                    </div>
                </div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include_once 'views/includes/admin_footer.php'?>
    <?php include_once 'views/includes/admin_scriptsLink.php'?>

</body>

</html>
