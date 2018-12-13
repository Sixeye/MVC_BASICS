<?php

if (!empty($_POST) && isset($_POST['btnContact'])){
    if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])){
        $nom = str_secur($_POST['nom']);
        $email = str_secur($_POST['email']);
        $phone = str_secur($_POST['phone']);
        $message = str_secur($_POST['message']);

        $messagesent.= '- message envoyé par: ' . $nom . ' dont le mail est ' . $email . ' et le téléphone est ' . $phone . '<br>' . 'Voici son message: ' . $message;
        debug($messagesent); 

        //send an e-mail
        mail('srinath@srinath.fr', 'Message reçu sur le blog de Jean Forteroche', $message);

    } else {
        $error = "Veuillez remplir tous les champs.";
}} else {
    $error = "Une erreur s'est produite. Réessayez.";
}

?>