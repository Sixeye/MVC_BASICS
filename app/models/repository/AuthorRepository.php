<?php
     /**
      * Created by PhpStorm.
      * User: srinathchristophersamarasinghe
      * Date: 2019-02-19
      * Time: 12:32
      */

     use entity\Author;

     require_once ('AbstractRepository.php');

     class AuthorRepository extends AbstractRepository
     {
         /**
          * Verifies which author is trying to login if wrong it rejects invalid entries
          * If it is correct => session_start
          */
         public function verify_author($Author)
         {
             $reqAuthor = $this->conn->prepare('SELECT * FROM authors WHERE email = :mail');
             $reqAuthor->bindValue(':mail', $Author->getMail(), PDO::PARAM_STR);
             $reqAuthor->execute();
             $pWordToVerify = $Author->getPWord();

             while ($author = $reqAuthor->fetch())
             {
                 if (password_verify($pWordToVerify, $author['password']))
                 {
                     if ($author['id'] == 1)
                     {
                         $secret = sha1(sha1($author['email']) . rand());
                         $reqAuthor1 = $this->conn->prepare("UPDATE authors SET secret = ? WHERE id = ?");
                         $reqAuthor1->execute([$secret, '1']);
                         $author_id = 1;
                         session_start();
                         $_SESSION['id'] = $author_id;
                         $_SESSION['secret'] = $secret;
                         header('Location: admin_posts');
                     } elseif ($author['id'] == 2) {
                         $secret = sha1(sha1($author['email']) . rand());
                         $reqAuthor1 = $this->conn->prepare("UPDATE authors SET secret = ? WHERE id = ?");
                         $author_id = 2;
                         $reqAuthor1->execute([$secret, '2']);
                         session_start();
                         $_SESSION['id'] = $author_id;
                         $_SESSION['secret'] = $secret;
                         header('Location: admin_news');
                     }
                 } else {
                     header('Location: admin_gate');
                     echo('Une erreur est survenue.');
                 }
             }
         }

         /**
          * Verification, if a session is opened and if it is conform in all pages but not in the gate.
          * retrieves datas from the DB and compares them with actual session id called secret
          */
         public function verify_session($Author)
         {
             $reqAuthor = $this->conn->prepare('SELECT * FROM authors WHERE id = :id AND secret = :secret');
             $reqAuthor->bindValue(':id', $Author->getId(), PDO::PARAM_INT);
             $reqAuthor->bindValue(':secret', $Author->getsecret(), PDO::PARAM_STR);
             $reqAuthor->execute();
             while ($author = $reqAuthor->fetch()) {
                 if ($id = $author['id'] && $secret = $author['secret']) {

                 } else {
                     $_SESSION = [];
                     header('Location: admin_gate');
                 }
             }
         }

         /**
          * Verification if a session is open and if it is conform, specific to the gate.
          * retrieves datas from the DB and compares them with actual session id called secret, avoids to be in admin gate
          */
         public function verify_session_gate($Author)
         {
             $reqAuthor = $this->conn->prepare('SELECT * FROM authors WHERE id = :id AND secret = :secret');
             $reqAuthor->bindValue(':id', $Author->getId(), PDO::PARAM_INT);
             $reqAuthor->bindValue(':secret', $Author->getsecret(), PDO::PARAM_STR);
             $reqAuthor->execute();
             while ($author = $reqAuthor->fetch()) {
                 if ($id = $author['id'] && $secret = $author['secret']) {
                     header('Location: admin_posts');
                 } else {
                     echo('Connectez-vous');
                 }
             }
         }

         /**
          * It checks if a author id and a session id called secret are existing
          * it compares them from the one from the DB, if it is correct the session is valid if not the user will be directed to the gate.
          */
         static function login()
         {
             if (isset($_SESSION['id']) && isset($_SESSION['secret']))
             {
                 $id = $_SESSION['id'];
                 $secret = $_SESSION['secret'];

                 $Author = new Author();
                 $Author->setId($id);
                 $Author->setSecret($secret);
                 $checkAuthor = new AuthorRepository();
                 $authorCheck = $checkAuthor->verify_session($Author);
             } elseif (!isset($_SESSION['id']) && !isset($_SESSION['secret'])) {
                 header('Location: admin_gate');
             }
         }

         /**
          * It is a specific admin gate login function, it verifies if the user is connected with a session id called secret and an author id
          * It retrieves datas from the DB and compares them to the actual values
          */
         static function loginGate()
         {
             if (isset($_SESSION['id']) && isset($_SESSION['secret']))
             {
                 $id = $_SESSION['id'];
                 $secret = $_SESSION['secret'];

                 $Author = new Author();
                 $Author->setId($id);
                 $Author->setSecret($secret);
                 $checkAuthor = new AuthorRepository();
                 $authorCheck = $checkAuthor->verify_session($Author);
                 header('Location: admin_posts');
             } elseif (!isset($_SESSION['id']) && !isset($_SESSION['secret'])) {
                 echo('Connectez-vous');
             }
         }
     }