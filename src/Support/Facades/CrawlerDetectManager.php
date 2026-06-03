<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetectManager\Support\Facades;

use Illuminate\Support\Facades\Facade;
use M2Collective\CrawlerDetectManager\CrawlerDetect;

/**
 * @method static bool isCrawler()
 */
final class CrawlerDetectManager extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return CrawlerDetect::class;
    }
}
