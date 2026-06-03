<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetectManager\Contracts;

interface CrawlerDetectManager
{
    /**
     * @return bool
     */
    public function isCrawler() : bool;
}
