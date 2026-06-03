<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetectManager;

use Illuminate\Support\ServiceProvider;
use M2Collective\CrawlerDetectManager\Commands\ConfigPublishCommand;
use M2Collective\CrawlerDetectManager\Concerns\RegisterDirectives;
use M2Collective\CrawlerDetectManager\Contracts\CrawlerDetectManager as CrawlerDetectManagerContract;
use M2Collective\CrawlerDetectManager\Views\Directives\IsCrawlersBladeDirective;

final class CrawlerDetectManagerServiceProvider extends ServiceProvider
{
    use RegisterDirectives;

    /**
     * @return void
     */
    public function register() : void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/crawler-detect-manager.php',
            'crawler-detect-manager'
        );

        $this->app->singleton(CrawlerDetectManagerContract::class, function () {
            return new CrawlerDetectManager(config('crawler-detect-manager.defaults', [
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
            new IsCrawlersBladeDirective(),
        ], config('crawler-detect-manager.registeringDirectives', true));

        $this->publishes([
            __DIR__ . '/../config/crawler-detect-manager.php' => config_path('crawler-detect-manager.php'),
        ], 'crawler-detect-manager-publish-config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                ConfigPublishCommand::class,
            ]);
        }
    }
}
