<?php

namespace AppBundle\Model;

use Core\Model;

class Feeds extends Model
{
    public function getFeeds()
    {
        $feeds = $this->db->prepare("SELECT * FROM feeds ORDER BY enabled DESC ");
        $feeds->execute();

        return $feeds->fetchAll();
    }

    public function getEnabledFeeds()
    {
        $enabled = $this->db->prepare("SELECT rss FROM feeds WHERE enabled = :enabled");
        $enabled->bindValue(':enabled', 1, \PDO::PARAM_INT);
        $enabled->execute();

        return $enabled->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function insertFeed($feed)
    {
        $insert = $this->db->prepare("INSERT IGNORE INTO feeds (source, rss, enabled) VALUES (?,?,?)");
        $insert->execute($feed);
    }

    public function editFeed($id)
    {
        $edit = $this->db->prepare("SELECT * FROM feeds WHERE id = :id");
        $edit->bindParam(':id', $id, \PDO::PARAM_INT);
        $edit->execute();

        return $edit->fetch();
    }

    public function updateFeed($feed)
    {
        $update = $this->db->prepare("UPDATE feeds SET source = :source, rss = :rss, enabled = :enabled WHERE id = :id");
        $update->execute($feed);
    }

    public function deleteFeed($id)
    {
        $delete = $this->db->prepare("DELETE FROM feeds WHERE id = :id");
        $delete->bindParam(':id', $id, \PDO::PARAM_INT);
        $delete->execute();
    }
}