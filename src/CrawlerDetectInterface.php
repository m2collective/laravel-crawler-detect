<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetect;

interface CrawlerDetectInterface
{
    /**
     * @return bool
     */
    public function isCrawler() : bool;
}
