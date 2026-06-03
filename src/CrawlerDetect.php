<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetect;

final class CrawlerDetect implements CrawlerDetectInterface
{
    /**
     * @var string
     */
    protected string $userAgent;

    /**
     * @var array
     */
    protected array $crawlers;

    /**
     * @param array $crawlers
     */
    public function __construct(array $crawlers)
    {
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
        $this->crawlers = $crawlers;
    }

    /**
     * @return bool
     */
    public function isCrawler() : bool
    {
        return array_any($this->crawlers, fn($crawler) => preg_match($crawler, $this->userAgent));
    }
}
