<?php

namespace Belt\Workflow;

use Belt, Barryvdh, Collective, Illuminate, Laravel, Rap2hpoutre, Silber;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;

/**
 * Class BeltCoreServiceProvider
 * @package Belt\Core
 */
class BeltWorkflowServiceProvider extends Belt\Core\BeltServiceProvider
{

    /**
     * The Larabelt toolkit version.
     *
     * @var string
     */
    const VERSION = '2.0-BETA';

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__ . '/../routes/admin.php';
        include __DIR__ . '/../routes/api.php';

        // beltable values for global belt command
        $this->app['belt']->addPackage('workflow', ['dir' => __DIR__ . '/..']);
        $this->app['belt']->publish('belt-workflow:publish');
        $this->app['belt']->seeders('BeltWorkflowSeeder');
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(GateContract $gate, Router $router)
    {

        // set backup view paths
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'belt-workflow');

        // set backup translation paths
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'belt-workflow');

        // policies
        $this->registerPolicies($gate);

        // commands
        $this->commands(Belt\Workflow\Commands\PublishCommand::class);

        // observers
        Belt\Workflow\WorkRequest::observe(Belt\Workflow\Observers\WorkRequestObserver::class);

        // morphMap
        Relation::morphMap([
            'work_requests' => Belt\Workflow\WorkRequest::class,
        ]);

        // route model binding
        $router->model('workRequest', Belt\Workflow\WorkRequest::class);
    }

    /**
     * Register the application's policies.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate $gate
     * @return void
     */
    public function registerPolicies(GateContract $gate)
    {
        $gate->before(function ($user) {
            if ($user->super) {
                return true;
            }
        });

        foreach ($this->policies as $key => $value) {
            $gate->policy($key, $value);
        }
    }

}