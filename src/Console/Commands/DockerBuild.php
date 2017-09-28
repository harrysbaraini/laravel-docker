<?php

namespace Harrysbaraini\Docker\Console\Commands;

use Illuminate\Console\Command;

class DockerBuild extends Command
{
    use HasDockerConfig;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:build {container?* : One or more container names}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build docker containers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $containers = $this->getContainers();

        $output = shell_exec('cd ' . $this->getDockerComposePath() . ' && docker-compose build ' . implode(' ', $containers));

        $this->comment($output);
    }
}
