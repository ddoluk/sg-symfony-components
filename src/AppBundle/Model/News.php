<?php

namespace AppBundle\Model;

use Core\Model;

class NewsModel extends Model
{
    const SHOW_BY_DEFAULT = 3;

    public function insert($data)
    {
        $insert = $this->db->prepare('INSERT IGNORE INTO news (title, link, description, source, pub_date) VALUES (?, ?, ?, ?, ?)');
        $insert->execute($data);
    }

    public function getListOfNews()
    {
        $listNews = $this->db->prepare('SELECT * FROM news ORDER BY pub_date DESC LIMIT 20');
        $listNews->execute();

        return $listNews->fetchAll();
    }

    public function getListForPagination($page)
    {
        $limit = self::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $perPage = $this->db->prepare('SELECT title, description, link, pub_date FROM news ORDER BY pub_date DESC LIMIT :limit OFFSET :offset');
        $perPage->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $perPage->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $perPage->execute();

        return $perPage->fetchAll();
    }

    public function getAllNews()
    {
        $allNews = $this->db->prepare('SELECT * FROM news');
        $allNews->execute();

        return $allNews->rowCount();
    }
}