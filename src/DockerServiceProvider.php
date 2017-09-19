<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 19/09/17
 * Time: 16:03
 */

namespace Harrysbaraini\Docker;

use Illuminate\Support\ServiceProvider;

class DockerServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/docker.php' => config_path('docker.php'),
        ], 'docker');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/docker.php', 'docker');

        $this->app->singleton('docker', function () {
            //
        });

        $this->commands(['docker']);
    }

    public function provides()
    {
        return ['docker'];
    }
}