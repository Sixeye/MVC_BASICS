<?php

    class Authors
    {

    public  $firstname;
    public  $lastname;
    protected $mail;
    protected $pWord;

        /**
         * Authors constructor.
         * @param $id
         */

        function __construct($id)
        {
            $db = Database::getInstance();
            $conn = $db->getConnection();

            $id = Utility::str_secur($id);

            $reqAuthor = $conn->prepare('SELECT * FROM authors WHERE id = ?');
            $reqAuthor->execute([$id]);
            $data = $reqAuthor->fetch();

            $this->id = $id;
            $this->firstname = $data['firstname'];
            $this->lastname = $data['lastname'];

            $conn = null;
        }

        /**
         * Send all authors
         * @return array
         */

        static function getAllAuthors()
        {
            $db = Database::getInstance();
            $conn = $db->getConnection();

            $reqAuthors = $conn->prepare('SELECT * FROM authors');
            $reqAuthors->execute([]);
            return $reqAuthors->fetchAll();

            $conn = null;
        }

        //////////////////////////// SESSION AUTHOR AUTHENTIFICATION

            /**
             * Verify which author is trying to login or reject invalid entries
             * @return session_start
             */

        static function verify_author()
        {
            if(isset($_POST['inputEmail']) && isset($_POST['inputPassword']) && isset($_POST['login2019']))
            {
                $db = Database::getInstance();
                $conn = $db->getConnection();

                $mail  = Utility::str_secur($_POST['inputEmail']);
                $pWord = Utility::str_secur($_POST['inputPassword']);

                //
                $pWord = "jf".sha1($pWord."975")."31";
                $reqAuthor = $conn->prepare('SELECT * FROM authors WHERE email = ? AND password = ?');
                $reqAuthor->execute([$mail, $pWord]);
                while($author = $reqAuthor->fetch())
                {
                    if($pWord = $author['password'] && $mail = $author['email'])
                    {
                        if($author['email'] == 'srinath@srinath.fr' )
                        {
                        $secret = sha1(sha1($mail).rand());
                        $reqAuthor1 = $conn->prepare("UPDATE authors SET secret = ? WHERE id = ?");
                        $reqAuthor1->execute([$secret, '1']);
                        $author_id = 1;
                        session_start();
                        $_SESSION['id'] = $author_id;
                        $_SESSION['secret'] = $secret;
                        header('Location: admin_posts');
                        }
                        elseif($author['email'] == 'veejayseye@gmail.com')
                        {
                        $secret = sha1(sha1($mail) . rand());
                        $reqAuthor1 = $conn->prepare("UPDATE authors SET secret = ? WHERE id = ?");
                        $author_id = 2;
                        $reqAuthor1->execute([$secret, '2']);
                        session_start();
                        $_SESSION['id'] = $author_id;
                        $_SESSION['secret'] = $secret;
                        header('Location: admin_news');
                        }
                    }

                    else{
                        header('Location: admin_gate');
                        echo('Une erreur est survenue.');
                        }
                    $conn = null;
                }
            }
        }

    }

