<?php

namespace Harrysbaraini\Docker\Console\Commands;

use Illuminate\Console\Command;

class DockerUp extends Command
{
    use HasDockerConfig;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:up {container?* : One or more container names}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start up docker containers';

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

        $output = shell_exec('cd ' . $this->getDockerComposePath() . ' && docker-compose up -d ' . implode(' ', $containers));

        $this->comment($output);
    }
}
