<?php

namespace Belt\Workflow\Commands;

use Belt\Core\Commands\PublishCommand as Command;

/**
 * Class PublishCommand
 * @package Belt\Workflow\Commands
 */
class PublishCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'belt-workflow:publish {action=publish} {--force} {--include=} {--exclude=} {--config}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'publish assets for belt workflow';

    /**
     * @var array
     */
    protected $dirs = [
        'vendor/larabelt/workflow/config' => 'config/belt',
        'vendor/larabelt/workflow/database/factories' => 'database/factories',
        'vendor/larabelt/workflow/database/migrations' => 'database/migrations',
        'vendor/larabelt/workflow/database/seeds' => 'database/seeds',
        'vendor/larabelt/workflow/docs' => 'resources/docs/raw',
    ];

}