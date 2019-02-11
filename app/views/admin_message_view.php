<?php session_start();?>

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
                    <a><i class="fa fa-envelope"></i>MESSAGES</a>
                </li>
                <li>
                    <a href="logout"><i class="fa fa-fw fa-power-off"></i>LOG OUT</a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php include_once 'views/includes/admin_message_sidebar.php' ?>


            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <!-- Page Heading -->

                        <?php include_once 'views/includes/admin_header_message.php' ?>

                        

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($getAllMessages as $index => $message) : ?>

                                <tr>
                                    <td>
                                        <?= $message['id'] ?>
                                    </td>
                                    <td>
                                        <?= $message['nom'] ?>
                                    </td>
                                    <td>
                                        <?= $message['email'] ?>
                                    </td>
                                    <td>
                                        <?= $message['telephone'] ?>
                                    </td>
                                    <td>
                                        <?= $message['content'] ?>
                                    </td>
                                    <td>
                                        <?= $message['date'] ?>
                                    </td>
                                    <td>
                                        <form action="admin_message" method="post">
                                            <input type="hidden" name='delete' value="<?php echo $message['id'] ?>">
                                            <button type='submit' name='messageDelete'>Effacer</button>
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
