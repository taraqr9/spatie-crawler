<?php

require_once 'vendor/autoload.php';

use Spatie\Crawler\Crawler;

Crawler::create()
    // ->setCrawlObserver(new \Mr\Cr\DemoObserver)
    ->setCrawlObserver(new \Mr\Cr\DemoObserver)
    ->startCrawling('https://www.rokomari.com/book/90657/half-girlfriend');
