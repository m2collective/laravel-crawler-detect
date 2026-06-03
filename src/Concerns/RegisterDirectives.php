<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetectManager\Concerns;

use Illuminate\Support\Facades\Blade;
use M2Collective\CrawlerDetectManager\Contracts\Views\BladeDirective;

trait RegisterDirectives
{
    /**
     * @param array $directives
     * @param bool $registering
     * @return void
     */
    private function registerDirectives(array $directives, bool $registering = true) : void
    {
        if($directives !== [] && $registering) {
            foreach ($directives as $directive) {
                $this->registerDirective($directive);
            }
        }
    }

    /**
     * @param BladeDirective $directive
     * @return void
     */
    private function registerDirective(BladeDirective $directive) : void
    {
        Blade::directive($directive->openingTag(), [$directive, 'openingHandler']);
        Blade::directive($directive->logicalTag(), [$directive, 'logicalHandler']);
        Blade::directive($directive->closingTag(), [$directive, 'closingHandler']);
    }
}
