<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetectManager\Support\Facades;

use Illuminate\Support\Facades\Facade;
use M2Collective\CrawlerDetectManager\CrawlerDetectManagerInterface;

/**
 * @method static bool isCrawler()
 *
 * @see \M2Collective\CrawlerDetectManager\CrawlerDetectManager
 */
final class CrawlerDetectManager extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return CrawlerDetectManagerInterface::class;
    }
}
