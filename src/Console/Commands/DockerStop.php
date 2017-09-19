<?php

namespace Harrysbaraini\Docker\Console\Commands;

use Illuminate\Console\Command;

class DockerStop extends Command
{
    use HasDockerConfig;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:stop {containers?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stop docker containers.';

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

        $output = shell_exec('cd ' . base_path('docker') . ' && docker-compose stop ' . implode(',', $containers));

        $this->comment($output);
    }
}
