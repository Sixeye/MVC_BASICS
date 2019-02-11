<?php session_start();
if ($_SESSION['id'] == 1) {
    header("Location: admin_posts");
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
                    <a><i class="fa fa-user"></i> ANNA DESNOS</a>
                </li>
                <li>
                    <a href="logout"><i class="fa fa-fw fa-power-off"></i>LOG OUT</a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php include_once 'app/views/includes/admin_sidebar2.php'?>


            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <!-- Page Heading -->

                        <?php include_once 'app/views/includes/admin_header_update.php';
                        ?>

                        <form action="admin_nupdate" method="POST">

                            <div class="form-group">

                                <label for="id">ID</label>
                                <input value="<?= $nupdateId; ?>" type="text" class="form-control" name="nu_id" required>

                                <label for="title">TITRE</label>
                                <input value="<?= $nupdateTitle; ?>" type="text" class="form-control" name="nu_title" required>

                                <label for="sentence">PHRASE</label>
                                <input value="<?= $nupdateSentence ?>" type="text" class="form-control" name="nu_sentence" required>

                                <label for="content">CONTENU</label>
                                <input value="<?= $nupdateContent ?>" type="text" class="form-control" name="nu_content" id="content" required>

                                <label for="author_id">N° AUTEUR</label>
                                <input value="<?= $nupdateAuthor ?>" type="text" class="form-control" name="nu_author_id" value="2" required>

                                <label for="category_id">N°CATEGORIE</label>
                                <input value="<?= $nupdateCategory ?>" type="text" class="form-control" name="nu_category_id" value="2" required>
                           
                                <div class="form-group"><input type="submit" class="btn btn-primary" name="nUpdated_post" value="PUBLIER" required>
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
