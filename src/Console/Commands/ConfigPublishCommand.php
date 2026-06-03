<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetectManager\Console\Commands;

use Illuminate\Console\Command;

final class ConfigPublishCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'crawler-detect-manager:publish-config';

    /**
     * @var string
     */
    protected $description = 'Publishing the configuration file';

    /**
     * @return void
     */
    public function handle() : void
    {
        $this->call('vendor:publish', [
            '--tag' => 'crawler-detect-manager-publish-config'
        ]);
    }
}
