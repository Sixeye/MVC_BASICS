<!DOCTYPE html>

    <html lang="fr">
        <head>

                <?php include_once 'app/views/includes/head.php'?>

        </head>
        <body>

            <?php include_once 'app/views/includes/nav.php'?>
            <?php include_once 'app/views/includes/header_4.php'?>

           <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto">
                        <p>Vous souhaitez avoir des nouvelles de mes activités ? <br>Salons littéraires, interviews, rencontres
                            littéraires...<br>Veuillez remplir le formulaire ci dessous et envoyez-moi un message.<br>Mais
                            soyez &nbsp;patients.<br></p>
                        <form id="contactForm" name="sentMessage" action="contact" method="post">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls"><label>Nom</label>
                                    <input class="form-control" type="text" required="" placeholder="Nom" id="Nom" name="nom">
                                    <small class="form-text text-danger help-block"></small>
                                </div>
                            </div>
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls"><label>Adresse Email</label>
                                        <input class="form-control" type="email" required="" placeholder="Adresse Email" id="email" name="email">
                                        <small class="form-text text-danger help-block"></small>
                                    </div>
                                </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls"><label>Telephone</label>
                                    <input class="form-control" type="number" required="" placeholder="Telephone" id="phone" name="phone">
                                    <small class="form-text text-danger help-block"></small>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-3"><label>Message</label>
                                    <textarea class="form-control" rows="5" required="" placeholder="Message" id="message" data-validation-required-message="Entrez un message." name="message"></textarea>
                                    <small class="form-text text-danger help-block"></small>
                                </div>
                            </div>
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary" type="submit" id="sendMessageButton" name="btnContact">Envoi</button></div>
                        </form>
                    </div>
                </div>
            </div>
        <hr>

            <?php include_once 'app/views/includes/footer.php'?>
            <?php include_once 'app/views/includes/scriptsLink.php'?>

        </body>
    </html>