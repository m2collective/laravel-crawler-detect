<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetectManager\View\Directives;

use M2Collective\PackageKit\View\Directives\AbstractBooleanDirective;

final class IsCrawlersDirective extends AbstractBooleanDirective
{
    /**
     * @return string
     */
    public function openingName() : string
    {
        return 'isCrawlers';
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function openingHandler(mixed $expression): string
    {
        return "<?php if(\M2Collective\CrawlerDetectManager\Support\Facades\CrawlerDetectManager::isCrawler()) : ?>";
    }

    /**
     * @return string
     */
    public function closingName() : string
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
    public function logicalName() : string
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
