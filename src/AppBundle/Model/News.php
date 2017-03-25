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

    public function getListForPagination($page)
    {
        $limit = self::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $sql = "SELECT title, description, link, pub_date 
                FROM news 
                WHERE source IN('{$this->enabledSource()}') 
                ORDER BY pub_date DESC 
                LIMIT :limit OFFSET :offset";

        $perPage = $this->db->prepare($sql);
        $perPage->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $perPage->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $perPage->execute();

        return $perPage->fetchAll();
    }

    public function getAllNews()
    {
        $sql = "SELECT * FROM news WHERE source IN ('{$this->enabledSource()}')";

        $allNews = $this->db->prepare($sql);
        $allNews->execute();

        return $allNews->rowCount();
    }

    public function getFeeds()
    {
        $model = new Feeds();
        return $model->getEnabledFeeds();
    }

    private function enabledSource()
    {
        $source = $this->db->prepare("SELECT source FROM feeds WHERE enabled = :enabled");
        $source->bindValue(':enabled', 1, \PDO::PARAM_INT);
        $source->execute();

        return implode("','", $source->fetchAll(\PDO::FETCH_COLUMN));
    }
}