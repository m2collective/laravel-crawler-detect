<?php
declare(strict_types=1);

namespace M2Collective\CrawlerDetect\Commands;

use Illuminate\Console\Command;

final class ConfigPublishCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'crawler-detect:publish-config';

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
            '--tag' => 'crawler-detect-publish-config'
        ]);
    }
}
