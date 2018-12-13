<!DOCTYPE html>
<html lang="fr">
<head>

    <?php include_once 'views/includes/head.php'?>    

</head>

<body>

    <?php include_once 'views/includes/nav.php'?>
    <?php include_once 'views/includes/header_1.php'?>
    
   <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <!-- PHP ADMIN-->
                
                <form class="form-signin">
                    <div class="text-center mb-4">
                        
                        <h1 class="h3 mb-3 font-weight-normal">Accès administrateur</h1>
                    
                    </div>

                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Addresse e-mail" required autofocus>
                        <label for="inputEmail"></label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
                        <label for="inputPassword"></label>
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                        <input type="checkbox" value="remember-me"> Se rappeler de moi
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
                </form>

                <hr>
                
            </div>
        </div>
    </div>
    
<?php include_once 'views/includes/footer.php'?>
<?php include_once 'views/includes/scriptsLink.php'?>

</body>
</html>