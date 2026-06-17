<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetect;

use Illuminate\Support\ServiceProvider;
use M2Collective\BladeDirective\Concerns\RegisterBladeDirectives;
use M2Collective\CrawlerDetect\Commands\ConfigPublishCommand;
use M2Collective\CrawlerDetect\Views\Directives\IsCrawlerDirective;

final class CrawlerDetectServiceProvider extends ServiceProvider
{
    use RegisterBladeDirectives;

    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/crawler-detect.php',
            'crawler-detect'
        );

        $this->app->singleton(CrawlerDetect::class, function () {
            return new CrawlerDetectManager(config('crawler-detect.crawlers', [
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
    public function boot(): void
    {
        $this->registerBladeDirectives([
            new IsCrawlerDirective(),
        ]);

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
