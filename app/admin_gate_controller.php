<?php

    use entity\Author;

    require_once ('app/models/entity/Author.php');
    require_once ('app/models/repository/AuthorRepository.php');

    AuthorRepository::loginGate();

    if(isset($_POST['inputEmail']) && isset($_POST['inputPassword']) && isset($_POST['login2019']))
    {
        $mail = SecurityService::str_secur($_POST['inputEmail']);
        $pWord = SecurityService::str_secur($_POST['inputPassword']);
        $Author = new Author();
        $Author->setPWord($pWord);
        $Author->setMail($mail);
        $checkAuthor = new AuthorRepository();
        $authorCheck = $checkAuthor->verify_author($Author);
    }

    ob_start();
    include_once 'app/views/admin_gate_view.php';
    ob_end_flush();