<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetectManager\Support\Facades;

use Illuminate\Support\Facades\Facade;
use M2Collective\CrawlerDetectManager\CrawlerDetectManager as CrawlerDetectManagerContract;

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
        return CrawlerDetectManagerContract::class;
    }
}
