<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <?php include_once 'app/views/includes/head.php'?>    
  
</head>

<body>

    <?php include_once 'app/views/includes/nav.php'?>
    <?php include_once 'app/views/includes/header_1.php'?>
    
   <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <!-- PHP ADMIN-->
                
                <form class="form-signin" action="admin_gate" method="POST">
                    <div class="text-center mb-4">
                        
                        <h1 class="h3 mb-3 font-weight-normal">Accès administrateur</h1>

                    <div id="error"></div>
                    
                    </div>

                    <div class="form-label-group">
                        <input type="email" id="inputEmail" name="inputEmail"  class="form-control" placeholder="Adresse e-mail" required autofocus>
                        <label for="inputEmail"></label>
                    </div>

                    <div class="form-label-group">
                        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Mot de passe" required>
                        <label for="inputPassword"></label>
                    </div>
                    
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login2019" >Valider</button>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
                </form>

                <hr>
                
            </div>
        </div>
    </div>
    
<?php include_once 'app/views/includes/footer.php'?>
<?php include_once 'app/views/includes/scriptsLink.php'?>

</body>
</html>