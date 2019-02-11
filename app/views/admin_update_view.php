<?php session_start();
if ($_SESSION['id'] == 2) {
    header("Location: admin_news");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <?php include_once 'app/views/includes/admin_head.php'?>
    <?php include_once 'app/views/includes/tiny_header.php' ?>

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
                    <a><i class="fa fa-user"></i> JEAN FORTEROCHE</a>
                </li>
                <li>
                    <a href="logout"><i class="fa fa-fw fa-power-off"></i>LOG OUT</a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php include_once 'views/includes/admin_sidebar.php'?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <!-- Page Heading -->

                        <?php include_once 'views/includes/admin_header_update.php';
                        ?>

                        <form action="admin_update" method="POST">

                            <div class="form-group">

                                <label for="id">ID</label>
                                <input value="<?= $updateId; ?>" type="text" class="form-control" name="u_id" required>

                                <label for="title">TITRE</label>
                                <input value="<?= $updateTitle; ?>" type="text" class="form-control" name="u_title" required>

                                <label for="sentence">PHRASE</label>
                                <input value="<?= $updateSentence ?>" type="text" class="form-control" name="u_sentence" required>

                                <label for="content">CONTENU</label>
                                <input value="<?= $updateContent ?>" type="text" class="form-control" name="u_content" id="content" required>

                                <label for="author_id">N° AUTEUR</label>
                                <input value="<?= $updateAuthor ?>" type="text" class="form-control" name="u_author_id" required>

                                <label for="category_id">N°CATEGORIE</label>
                                <input value="<?= $updateCategory ?>" type="text" class="form-control" name="u_category_id" required>
                           
                                <div class="form-group"><input type="submit" class="btn btn-primary" name="updated_post" value="PUBLIER" required>
                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php include_once 'app/views/includes/admin_footer.php'?>
    <?php include_once 'app/views/includes/admin_scriptsLink.php'?>

</body>

</html>
