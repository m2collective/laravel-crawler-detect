<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetectManager;

use Illuminate\Support\ServiceProvider;
use M2Collective\CrawlerDetectManager\Console\Commands\ConfigPublishCommand;
use M2Collective\CrawlerDetectManager\View\Directives\IsCrawlersDirective;
use M2Collective\PackageKit\Support\Traits\RegisterDirectivesTrait;

final class CrawlerDetectManagerServiceProvider extends ServiceProvider
{
    use RegisterDirectivesTrait;

    /**
     * @return void
     */
    public function register() : void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/crawler-detect-manager.php',
            'crawler-detect-manager'
        );

        $this->app->singleton(CrawlerDetectManager::class, function () {
            return new CrawlerDetect(config('crawler-detect-manager.defaults', [
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
            new IsCrawlersDirective(),
        ], config('crawler-detect-manager.directives', true));

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
