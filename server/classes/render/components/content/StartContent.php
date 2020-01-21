<?php

    namespace render\components\content;

    use blog\Blog;
    use config\Config;
    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;

    class StartContent extends ContentComponent implements ContentComponentInterface
    {
        public function render(): string
        {
            return (new Blog())->render();
        }

        public function title(): string
        {
            return $this->buildTitle('START');
        }

        public function cssFiles(): array
        {
            return ['pages/start.css'];
        }

        public function content()
        {
            $post = (new Blog())->loadPosts();

            return
                ['posts' => $post];
        }

        public function twig(): void
        {
            $loader = new FilesystemLoader(__DIR__ . '/server/templates');
            $post = (new Blog())->loadPosts();
            $twig = new Environment($loader);

            echo $twig->render(
                '/pages/blog.twig',
                ['posts' => $post]
            );
        }

        public function getTwigData()
        {
            $post = (new Blog())->loadPosts();

            $url = Config::getRootUrl();

            $link = [
                ['name' => 'About', 'url' => $url . 'blog/about.php'],
                ['name' => 'Portfolio', 'url' => $url . 'blog/portfolio.php'],
                ['name' => 'Testimonials', 'url' => $url . 'blog/testimonials'],
                ['name' => 'Articles', 'url' => $url . 'blog/articles'],
            ];

            $twigData =
                [
                    'APP' => Config::APP_NAME,
                    'links' => $link,
                    'posts' => $post,
                    'URL' => $url,
                ];;
            return $twigData;
        }
    }
