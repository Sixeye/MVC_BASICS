<?php

    namespace entity;

    /**
     * Created by PhpStorm.
     * User: srinathchristophersamarasinghe
     * Date: 2019-02-16
     * Time: 15:25
     */

    require_once ('app/models/entity/AbstractEntity.php');

    class Article extends AbstractEntity
    {
        protected  $id;
        protected  $title;
        protected  $sentence;
        protected  $content;
        protected  $date;
        protected  $author;
        protected  $category;


        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getSentence()
        {
            return $this->sentence;
        }

        /**
         * @param mixed $sentence
         */
        public function setSentence($sentence)
        {
            $this->sentence = $sentence;
        }

        /**
         * @return mixed
         */
        public function getContent()
        {
            return $this->content;
        }

        /**
         * @param mixed $content
         */
        public function setContent($content)
        {
            $this->content = $content;
        }

        /**
         * @return mixed
         */
        public function getDate()
        {
            return $this->date;
        }

        /**
         * @param mixed $date
         */
        public function setDate($date)
        {
            $this->date = $date;
        }

        /**
         * @return mixed
         */
        public function getAuthor()
        {
            return $this->author;
        }

        /**
         * @param mixed $author
         */
        public function setAuthor($author)
        {
            $this->author = $author;
        }

        /**
         * @return mixed
         */
        public function getCategory()
        {
            return $this->category;
        }

        /**
         * @param mixed $category
         */
        public function setCategory($category)
        {
            $this->category = $category;
        }

    }