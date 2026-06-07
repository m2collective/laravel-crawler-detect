<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetect\View\Directives;

use M2Collective\PackageKit\View\Directives\Types\BooleanDirective;

final class IsCrawlerDirective extends BooleanDirective
{
    /**
     * @return string
     */
    public function openingName() : string
    {
        return 'isCrawler';
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function openingHandler(mixed $expression): string
    {
        return "<?php if(\M2Collective\CrawlerDetect\Support\Facades\CrawlerDetect::isCrawler()) : ?>";
    }

    /**
     * @return string
     */
    public function closingName() : string
    {
        return 'endIsCrawler';
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
        return 'elseIsCrawler';
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
