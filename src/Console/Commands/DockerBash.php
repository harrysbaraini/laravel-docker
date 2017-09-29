<?php

namespace Harrysbaraini\Docker\Console\Commands;

use Illuminate\Console\Command;

class DockerBash extends Command
{
    use HasDockerConfig;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:bash {container: Container in which bash will run}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute bash inside a container';

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

        $output = shell_exec('cd ' . base_path('docker') . ' && docker-compose exec ' . implode(' ', $containers)) . ' bash';

        $this->comment($output);
    }
}
