<?php

    namespace render\components\content\admin\blog;

    use blog\Post;
    use config\Config;
    use render\components\content\ContentComponent;
    use render\components\content\ContentComponentInterface;

    class NewBlogPostContent extends ContentComponent implements ContentComponentInterface
    {

        public function title(): string
        {
            return $this->buildTitle('create new Post');
        }

        public function headerIsExpanded(): bool
        {
            return false;
        }

        public function render(): string
        {
            $url = Config::API_ROOT_DIR() . 'admin/blog/new_post.php';
            $titlePostKey = Post::TITLE_POST_KEY;
            $messagePostKey = Post::MESSAGE_POST_KEY;

            return <<<HTML
<form action="$url" method="POST">
    <div >
        <label for="title">Title: </label>
        <input type="text" id="title" name="$titlePostKey"/>
    </div>
    <div>
        <label for="message">Nachricht: </label>
        <input type="text" id="message" name="$messagePostKey"/>
    </div>
    <input type="submit" value="save"/> 
</form>
HTML;
        }

    }