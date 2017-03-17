<?php

require_once __DIR__.'/../Utils/NewsFeed.php';

use AppBundle\Utils\NewsFeed;

$unianFeed = new NewsFeed('http://www.pravda.com.ua/rss/');

$unianFeed->setInitFeed()->setWriteToDB();