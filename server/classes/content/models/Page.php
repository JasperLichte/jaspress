<?php

namespace content\models;



use database\Connection;
use render\components\pages\PagePage;
use request\Url;
use util\exceptions\EmptyMemberException;
use util\exceptions\LogicException;
use util\interfaces\Serializable;

class Page extends Content implements Serializable
{

    public static function load(Connection $db, string $slug): ?Page
    {
        $stmt = $db()->prepare('SELECT * FROM pages WHERE slug = ?');
        $stmt->execute([$slug]);

        $res = $stmt->fetch();

        if (!$res) {
            return null;
        }

        $page = (new Page())->deserialize($res);

        return ($page->isEmpty() ? null : $page);
    }

    public static function exists(Connection $db, string $slug): bool
    {
        $stmt = $db()->prepare('SELECT slug FROM pages WHERE slug = ?');
        $stmt->execute([$slug]);
        $res = $stmt->fetch();

        return (!empty($res) && is_array($res) && count($res));
    }

    /**
     * @param Connection $db
     * @return Page
     * @throws EmptyMemberException
     * @throws LogicException
     */
    public function save(Connection $db): Page
    {
        if (empty($this->slug)) {
            throw new EmptyMemberException('Slug cannot be empty');
        }
        if (empty($this->title)) {
            throw new EmptyMemberException('Title cannot be empty');
        }
        if ($this->markdown === null) {
            throw new EmptyMemberException('Markdown cannot be null');
        }
        if (empty($this->markdown->getContent())) {
            throw new EmptyMemberException('Markdown content cannot be empty');
        }
        if (self::exists($db, $this->slug)) {
            throw new LogicException('Page with same title/slug already exists');
        }

        $db()->prepare('
INSERT INTO pages (slug, title, markdown, creation_date, last_edited_date, deleted) 
VALUES(?, ?, ?, NOW(), NOW(), "0")')->execute([
            $this->slug,
            $this->title,
            $this->markdown->getContent(),
        ]);

        return $this;
    }

    public function endpoint()
    {
        return Url::to('/page.php?' . PagePage::GET_PAGE_KEY . '=' . $this->getSlug());
    }

    public static function delete(Connection $db, string $slug)
    {
        $db()->prepare('DELETE FROM pages WHERE slug = ?')->execute([$slug]);
    }

}
