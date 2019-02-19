<?php
    use entity\Author;

    require('app/models/entity/Author.php');
    require('app/models/repository/AuthorRepository.php');

    if(isset($_POST['inputEmail']) && isset($_POST['inputPassword']) && isset($_POST['login2019']))
    {
    $mail = SecurityService::str_secur($_POST['inputEmail']);
    $pWord = SecurityService::str_secur($_POST['inputPassword']);
    $pWord = "jf".sha1($pWord."975")."31";
    $Author = new Author();
    $Author->setPWord($pWord);
    $Author->setMail($mail);
    $checkAuthor = new AuthorRepository();
    $authorCheck = $checkAuthor->verify_author($Author);
    }

    //$checkSession = new AuthorRepository();
    //$sessionCheck = $checkSession->verify_session_gate();

    ob_start();
    include_once 'app/views/admin_gate_view.php';
    ob_end_flush();