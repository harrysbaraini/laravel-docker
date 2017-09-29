<?php

namespace Harrysbaraini\Docker\Console\Commands;

use Illuminate\Console\Command;

class DockerRemove extends Command
{
    use HasDockerConfig;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:remove {container?* : One or more container names}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove docker containers';

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

        $output = shell_exec('cd ' . base_path('docker') . ' && docker-compose rm ' . implode(' ', $containers));

        $this->comment($output);
    }
}
