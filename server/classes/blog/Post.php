<?php

    namespace blog;

    use config\Config;

    class Post
    {
        public const TITLE_POST_KEY = 'TITLE';
        public const MESSAGE_POST_KEY = 'MESSAGE';

        /**
         * @var int
         */
        private $id = 0;

        /**
         * @var string
         */
        private $title = '';

        /**
         * @var string
         */
        private $message = '';

        /**
         * @var string
         */
        private $creationDate = '';

        public function getId(): int
        {
            return $this->id;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function getTitle(): string
        {
            return $this->title;
        }

        public function setTitle(string $title): void
        {
            $this->title = $title;
        }

        public function getMessage(): string
        {
            return $this->message;
        }

        public function setMessage(string $message): void
        {
            $this->message = $message;
        }

        // Delete?
        public function getCreationDate(): string
        {
            return $this->creationDate;
        }

        public function setCreationDate(string $creationDate): void
        {
            $this->creationDate = $creationDate;
        }

        public function render(): string
        {
            $title = htmlspecialchars($this->title);
            $message = htmlspecialchars($this->message);
            $url = Config::getRootUrl() . 'blog/show_post.php?id=' . (int)$this->getId();

            return <<<HTML
<a href="$url" class="post">
    <h1 class="title">$title</h1>
    <br>
    <p class="message">$message</p>
    <span class="creation-date">$this->creationDate</span>
</a>
HTML;
        }
    }
