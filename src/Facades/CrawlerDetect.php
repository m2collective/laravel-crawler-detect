<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetect\Facades;

use Illuminate\Support\Facades\Facade;
use M2Collective\CrawlerDetect\CrawlerDetect as CrawlerDetectContract;

/**
 * @method static bool isCrawler()
 *
 * @see \M2Collective\CrawlerDetect\CrawlerDetectManager
 */
final class CrawlerDetect extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return CrawlerDetectContract::class;
    }
}
