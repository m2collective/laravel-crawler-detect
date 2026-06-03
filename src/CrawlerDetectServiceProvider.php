<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetect;

use M2Collective\CrawlerDetect\Console\Commands\ConfigPublishCommand;
use M2Collective\CrawlerDetect\View\Directives\IsCrawlerDirective;
use M2Collective\PackageKit\Support\AbstractServiceProvider;
use M2Collective\PackageKit\Support\Providers\Traits\RegisterDirectivesTrait;

final class CrawlerDetectServiceProvider extends AbstractServiceProvider
{
    use RegisterDirectivesTrait;

    /**
     * @return void
     */
    public function register() : void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/crawler-detect.php',
            'crawler-detect'
        );

        $this->app->singleton(CrawlerDetectInterface::class, function () {
            return new CrawlerDetect(config('crawler-detect.defaults', [
                '/bot/i',
                '/crawler/i',
                '/spider/i',
                '/curl/i',
                '/google/i',
                '/yandex/i',
                '/bing/i'
            ]));
        });
    }

    /**
     * @return void
     */
    public function boot() : void
    {
        $this->registerDirectives([
            new IsCrawlerDirective(),
        ], config('crawler-detect.directives', true));

        $this->publishes([
            __DIR__ . '/../config/crawler-detect.php' => config_path('crawler-detect.php'),
        ], 'crawler-detect-publish-config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                ConfigPublishCommand::class,
            ]);
        }
    }
}
