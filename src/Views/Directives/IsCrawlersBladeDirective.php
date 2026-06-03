<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetectManager\Views\Directives;

use M2Collective\CrawlerDetectManager\Contracts\Views\BladeDirective;

final class IsCrawlersBladeDirective implements BladeDirective
{
    /**
     * @return string
     */
    public function openingTag() : string
    {
        return 'isCrawlers';
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function openingHandler(mixed $expression): string
    {
        return "<?php if(\M2Collective\CrawlerDetectManager\Facades\CrawlerDetectManager::isCrawler()) : ?>";
    }

    /**
     * @return string
     */
    public function closingTag() : string
    {
        return 'endIsCrawlers';
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function closingHandler(mixed $expression) : string
    {
        return "<?php endif; ?>";
    }

    /**
     * @return string
     */
    public function logicalTag() : string
    {
        return 'elseIsCrawlers';
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function logicalHandler(mixed $expression) : string
    {
        return "<?php else: ?>";
    }
}
