<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetect\Views\Directives;

use M2Collective\BladeDirective\LogicalBladeDirective;

final class IsCrawlerDirective implements LogicalBladeDirective
{
    public function openingTag(): string
    {
        return 'isCrawler';
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function openingHandler(mixed $expression): string
    {
        return "<?php if(\M2Collective\CrawlerDetect\Facades\CrawlerDetect::isCrawler()) : ?>";
    }

    /**
     * @return string
     */
    public function elseTag(): string
    {
        return 'elseIsCrawler';
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function elseHandler(mixed $expression): string
    {
        return "<?php else: ?>";
    }

    /**
     * @return string
     */
    public function closingTag(): string
    {
        return 'endIsCrawler';
    }

    /**
     * @param mixed $expression
     * @return string
     */
    public function closingHandler(mixed $expression): string
    {
        return "<?php endif; ?>";
    }
}
