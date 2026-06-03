<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetect\Support\Facades;

use Illuminate\Support\Facades\Facade;
use M2Collective\CrawlerDetect\CrawlerDetectInterface;

/**
 * @method static bool isCrawler()
 *
 * @see \M2Collective\CrawlerDetect\CrawlerDetect
 */
final class CrawlerDetectManager extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return CrawlerDetectInterface::class;
    }
}
