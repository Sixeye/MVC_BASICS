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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>JEAN
                                                FORTEROCHE</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>JEAN
                                                FORTEROCHE</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>JEAN
                                                FORTEROCHE</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> JEAN FORTEROCHE <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> PROFIL</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> MESSAGES</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> REGLAGES</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> LOG OUT</a>
                        </li>
                    </ul>
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

                        <?php include_once 'views/includes/admin_header_posts.php'?>

                        <form action="admin_posts" method="POST">

                            <div class="form-group">
                                <label for="title">TITRE</label>
                                <input type="text" class="form-control" name="title">

                                <label for="sentence">PHRASE</label>
                                <input type="text" class="form-control" name="sentence">

                                <label for="content">CONTENU</label>
                                <input type="text" class="form-control" name="content">

                                <label for="author_id">N° AUTEUR</label>
                                <input type="text" class="form-control" name="author_id">

                                <label for="category_id">N°CATEGORIE</label>
                                <input type="text" class="form-control" name="category_id">

                                <div class="form-group"><input type="submit" class="btn btn-primary" name"create_post" value="PUBLIER">
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

                                <?php foreach ($allArticles as $index => $article): ?>

                                <tr>
                                    <td>
                                        <?=$article['id']?>
                                    </td>
                                    <td>
                                        <?=$article['title']?>
                                    </td>
                                    <td>
                                        <?=$article['sentence']?>
                                    </td>
                                    <td>
                                        <?=$article['content']?>
                                    </td>
                                    <td>
                                        <?=$article['date']?>
                                    </td>
                                    <td>
                                        <?=$article['author_id']?>
                                    </td>
                                    <td>
                                        <?=$article['category_id']?>
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
