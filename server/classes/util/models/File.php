<?php

namespace util\models;


use database\Connection;
use request\Url;
use util\interfaces\Serializable;

class File implements Serializable
{
    /** @var int */
    private $id = 0;

    /** @var string */
    private $name = '';

    /** @var string */
    private $tmpName = '';

    /** @var string */
    private $type = '';

    /** @var int */
    private $size = 0;

    /** @var string */
    private $data = null;

    /**
     * @param array $input
     * @return File
     */
    public function deserialize(array $input): Serializable
    {
        if (isset($input['id'])) {
            $this->id = (int)$input['id'];
        }
        if (isset($input['name'])) {
            $this->name = $input['name'];
        }
        if (isset($input['tmp_name'])) {
            $this->tmpName = $input['tmp_name'];
        }
        if (isset($input['type'])) {
            $this->type = $input['type'];
        }
        if (isset($input['size'])) {
            $this->size = (int)$input['size'];
        }
        if (isset($input['data'])) {
            $this->data = $input['data'];
        }

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTmpName(): string
    {
        return $this->tmpName;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function readData()
    {
        if (is_file($this->tmpName)) {
            $data = file_get_contents($this->tmpName);
            if ($data) {
                $this->data = $data;
            }
        }
    }

    public function getData(): string
    {
        if ($this->data === null) {
            $this->readData();
        }

        return (string)$this->data;
    }

    public function save(Connection $db)
    {
        $db()
            ->prepare('INSERT INTO files (name, type, size, data, time) VALUES (?, ?, ?, ?, NOW())')
            ->execute([$this->getName(), $this->getType(), $this->getSize(), $this->getData()]);

        $this->id = $db()->lastInsertId();
    }

    public static function load(Connection $db, int $id): ?File
    {
        $stmt = $db()->prepare('SELECT id, name, type, size, data, time FROM files WHERE id = ?');
        $stmt->execute([$id]);

        $file = (new File())->deserialize($stmt->fetch());

        if (!empty($file->getId())) {
            return $file;
        }

        return null;
    }

    public function endpoint(): Url
    {
        return Url::api('/file?i=' . (int)$this->id);
    }

}
