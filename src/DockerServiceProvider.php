<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 19/09/17
 * Time: 16:03
 */

namespace Harrysbaraini\Docker;

use Harrysbaraini\Docker\Console\Commands\DockerBuild;
use Harrysbaraini\Docker\Console\Commands\DockerList;
use Harrysbaraini\Docker\Console\Commands\DockerStop;
use Harrysbaraini\Docker\Console\Commands\DockerUp;
use Harrysbaraini\Docker\Console\Commands\DockerRemove;
use Harrysbaraini\Docker\Console\Commands\DockerBash;
use Illuminate\Support\ServiceProvider;

class DockerServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/docker.php' => config_path('docker.php'),
        ], 'docker');

        if ($this->app->runningInConsole()) {
            $this->commands([
		DockerBash::class,
                DockerBuild::class,
                DockerList::class,
                DockerStop::class,
                DockerUp::class,
                DockerRemove::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/docker.php', 'docker');
    }

    public function provides()
    {
        return ['docker'];
    }
}
