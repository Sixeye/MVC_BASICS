<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <?php include_once 'app/views/includes/admin_head.php' ?>
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
                    <a><i class="fa fa-file-text-o"></i>&nbsp;COMMENTAIRES</a>
                </li>
                <li>
                    <a href="logout"><i class="fa fa-fw fa-power-off"></i>LOG OUT</a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php include_once 'views/includes/admin_comments_sidebar.php' ?>


            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <!-- Page Heading -->

                        <?php include_once 'views/includes/admin_header_comments.php' ?>

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Commentaire</th>
                                    <th>Date</th>
                                    <th>De</th>
                                    <th>Correspondant à l'article</th>
                                    <th>effacer</th>
                                    <th>garder</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($getReportedComments as $index => $comment) : ?>

                                <tr>
                                    <td>
                                        <?= $comment['id'] ?>
                                    </td>
                                    <td>
                                        <?= $comment['content'] ?>
                                    </td>
                                    <td>
                                        <?= $comment['date'] ?>
                                    </td>
                                    <td>
                                        <?= $comment['nom'] ?>
                                    </td>
                                    <td>
                                        <?= $comment['article_id'] ?>
                                    </td>
                                    <td>
                                        <form action="admin_comments" method="post">
                                            <input type="hidden" name='delete' value="<?php echo $comment['id'] ?>">
                                            <button type='submit' name='commentDelete' value="<?php echo $comment['id'] ?>">Effacer</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="admin_comments" method="post">
                                            <input type="hidden" name='validate' value="<?php echo $comment['id'] ?>">
                                            <button type='submit' name='commentValidate' value="<?php echo $comment['id'] ?>">garder</button>
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

    <?php include_once 'app/views/includes/admin_footer.php' ?>
    <?php include_once 'app/views/includes/admin_scriptsLink.php' ?>

</body>

</html>
