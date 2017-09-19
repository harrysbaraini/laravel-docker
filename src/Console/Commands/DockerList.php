<?php

namespace Harrysbaraini\Docker\Console\Commands;

use Illuminate\Console\Command;

class DockerList extends Command
{
    use HasDockerConfig;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List running docker containers';

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
        $output = shell_exec('cd ' . $this->getDockerComposePath() . ' && docker-compose top');
        $this->comment($output);
    }
}
