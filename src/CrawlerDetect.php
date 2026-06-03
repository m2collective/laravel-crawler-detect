<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetectManager;

interface CrawlerDetect
{
    /**
     * @return bool
     */
    public function isCrawler() : bool;
}
