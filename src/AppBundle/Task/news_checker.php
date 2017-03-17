<?php

require_once __DIR__.'/../Utils/NewsFeed.php';

use AppBundle\Utils\NewsFeed;

date_default_timezone_set('Europe/Kiev');

$unianFeed = new NewsFeed('http://www.pravda.com.ua/rss/');

$unianFeed->setInitFeed()->setWriteToDB();