<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use AppBundle\Utils\NewsFeed;
use AppBundle\Model\NewsModel;

$model = new NewsModel();

$feeds = $model->getFeeds();

$listFeeds = new NewsFeed($feeds);

$listFeeds->setInitFeed()->setWriteToDB();