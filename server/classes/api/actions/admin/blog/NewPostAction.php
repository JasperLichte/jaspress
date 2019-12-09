<?php

    namespace api\actions\admin\blog;

    use api\actions\Action;
    use api\actions\ActionInterface;
    use blog\Post;
    use database\Connection;
    use database\QueryHelper;

    class NewPostAction extends Action implements ActionInterface
    {

        public function run(): string
        {
            $this->setContentType($this->contentType);

            $postTitle = $this->request->issetPost(Post::TITLE_POST_KEY)
                ? $this->request->getPost(Post::TITLE_POST_KEY) : '';
            $postMessage = $this->request->issetPost(Post::MESSAGE_POST_KEY)
                ? $this->request->getPost(Post::MESSAGE_POST_KEY) : '';

            if (empty($postTitle) || empty($postMessage)) {
                $this->setStatusCode(500);
                return json_encode([]);
            }
            $db = Connection::getInstance();
            QueryHelper::insertTablePairs(
                $db,
                'blog_post',
                [
                    'title' => '"' . $db->real_escape_string($postTitle). '"',
                    'message' => '"' . $db->real_escape_string($postMessage). '"',
                    'creation_date' => 'NOW()',
                ]
            );

            return json_encode(['success' => true]);
        }
    }
