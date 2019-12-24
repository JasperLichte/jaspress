<?php

namespace database;
use mysqli;

class QueryHelper
{
    /**
     * @param mysqli $link
     * @param string $query
     * @return array|boolean|null
     */
    public static function query(mysqli $link, $query)
    {
        $res = mysqli_query($link, $query);
        if (is_bool($res)) {
            return $res;
        }
        $results = [];
        while ($row = $res->fetch_assoc()) {
            $results[] = $row;
        }
        return $results;
    }

    /**
     * @param mysqli $link
     * @param string $table
     * @param array $fields
     * @param string $condition
     * @param string $order
     * @param int $limit
     * @return array|null
     */
    public static function getTableFields(
        mysqli $link,
        $table,
        $fields = [],
        $condition = '',
        $order = '',
        $limit = null
    ) {
        $query = 'SELECT ' .
            (is_array($fields) && count($fields) ? implode(", ", $fields) : '*')
            . ' FROM ' . $table;
        if ($condition) {
            $query .= ' WHERE ' . $condition;
        }
        if ($order) {
            $query .= ' ORDER BY ' . $order;
        }
        if ((int)$limit) {
            $query .= ' LIMIT ' . (int)$limit;
        }
        return self::query($link, $query);
    }

    /**
     * @param mysqli $link
     * @param $table
     * @param array $fields
     * @param string $condition
     * @param string $order
     * @return array
     */
    public static  function getTableFieldsElement(
        mysqli $link,
        $table,
        $fields = [],
        $condition = '',
        $order = ''
    ) {
        $res = self::getTableFields(
            $link,
            $table,
            $fields,
            $condition,
            $order,
            1
        );
        if (is_array($res)) {
            return reset($res) ?: [];
        }
        return $res;
    }
    /**
     * @param mysqli $link
     * @param $table
     * @param string $field
     * @param string $condition
     * @param string $order
     * @return string
     */
    public static  function getTableFieldElement(
        mysqli $link,
        $table,
        $field,
        $condition = '',
        $order = ''
    ) {
        $res = self::getTableFieldsElement($link, $table, [$field], $condition, $order);
        if (isset($res[$field]) && !empty($res[$field])) {
            return $res[$field];
        }
        return '';
    }
    /**
     * @param mysqli $link
     * @param $table
     * @param $pairs
     * @return array|null
     */
    public static function insertTablePairs(
        mysqli $link,
        $table,
        $pairs
    ) {
        return self::query(
            $link,
            'INSERT INTO ' . $table . ' (' . implode(',', array_keys($pairs)) . ') VALUES (' . implode(',', $pairs) . ')'
        );
    }
}
