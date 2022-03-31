<?php

namespace Mr\Cr;


use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class DemoObserver extends \Spatie\Crawler\CrawlObservers\CrawlObserver
{
    /**
     * Called when the crawler has crawled the given url successfully.
     *
     * @param \Psr\Http\Message\UriInterface $url
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     */
    public function crawled(
        UriInterface $url,
        ResponseInterface $response,
        ?UriInterface $foundOnUrl = null
    ): void {
        // is this a product page?
        // if yes, extract product name, image, price and save in a file
        // $title = parseTitle($response->getBody());
        $title = $response->getBody();
        file_put_contents('data.txt', json_encode(['url' => (string)$url, 'title' => $title]) . "\n", FILE_APPEND);
        echo (string) $url . " => " . $title . "\n";
    }

    /**
     * Called when the crawler had a problem crawling the given url.
     *
     * @param \Psr\Http\Message\UriInterface $url
     * @param \GuzzleHttp\Exception\RequestException $requestException
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     */
    public function crawlFailed(
        UriInterface $url,
        RequestException $requestException,
        ?UriInterface $foundOnUrl = null
    ): void {
        echo "Failed: " . (string) $url . "\n";
    }
}
