<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetectManager;

interface CrawlerDetectManager
{
    /**
     * @return bool
     */
    public function isCrawler() : bool;
}
