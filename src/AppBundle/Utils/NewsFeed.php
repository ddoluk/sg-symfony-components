<?php

namespace AppBundle\Utils;

use SimplePie;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use AppBundle\Model\NewsModel;

class NewsFeed
{
    private $uri;
    private $feed;

    public function __construct($uri = array())
    {
        $this->uri = $uri;
        $this->feed = new SimplePie();
    }

    public function setInitFeed()
    {
        $this->feed->set_feed_url($this->uri);
        $this->feed->enable_cache(false);
        $this->feed->init();

        return $this;
    }

    public function setWriteToDB()
    {
        $model = new NewsModel();
        $items = $this->feed->get_items();

        if (!empty($items)) {
            $this->Log('info_log');
        } else {
            $this->Log('error_log');
        }

        foreach ($items as $item) {
            $model->insert(array(
                $item->get_title(),
                $item->get_link(),
                $item->get_description(),
                $item->get_feed()->get_link(),
                $item->get_date("Y-m-d H:i:s"),
            ));
        }

        return $this;
    }

    private function Log($name)
    {
        $logger = new Logger($name);
        switch ($name) {
            case 'info_log':
                $logger->pushHandler(new StreamHandler(__DIR__ . '/../../../log/success_task.log', Logger::INFO));
                $logger->info(date("Y-m-d H:i:s") . " - task was executed");
                break;
            case 'error_log':
                $logger->pushHandler(new StreamHandler(__DIR__ . '/../../../log/error_task.log', Logger::ERROR));
                $logger->error(date("Y-m-d H:i:s") . " - something wrong");
                break;
        }
    }
}