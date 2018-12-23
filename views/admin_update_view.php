<!DOCTYPE html>
<html lang="fr">

<head>

    <?php include_once 'views/includes/admin_head.php'?>

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

                        <form action="admin_posts" method="POST">

                            <div class="form-group">

                                <label for="title">ID</label>
                                <input value="<?=$article['id']?>" type="text" class="form-control" name="title" required>

                                <label for="title">TITRE</label>
                                <input value="<?= $article['title'] ?>" type="text" class="form-control" name="title" required>

                                <label for="sentence">PHRASE</label>
                                <input value="<?=$article['sentence']?>" type="text" class="form-control" name="sentence" required>

                                <label for="content">CONTENU</label>
                                <input value="<?=$article['content']?>" type="text" class="form-control" name="content" required>

                                <label for="author_id">N° AUTEUR</label>
                                <input value="<?=$article['author_id']?>" type="text" class="form-control" name="author_id" required>

                                <label for="category_id">N°CATEGORIE</label>
                                <input value="<?=$article['category_id']?>" type="text" class="form-control" name="category_id" required>

                                <div class="form-group"><input type="submit" class="btn btn-primary" name="create_post" value="PUBLIER" required>
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

    <?php include_once 'views/includes/admin_footer.php'?>
    <?php include_once 'views/includes/admin_scriptsLink.php'?>

</body>

</html>
