<?php
/**
 * Created by PhpStorm.
 * User: harry
 * Date: 19/09/17
 * Time: 16:19
 */

namespace Harrysbaraini\Docker\Console\Commands;

trait HasDockerConfig
{
    /**
     * @return array
     */
    protected function getContainers(): array
    {
        $containers = $this->argument('container');

        if (empty($containers)) {
            return config('docker.default_containers');
        }

        return $containers;
    }

    /**
     * @return string
     */
    protected function getDockerComposePath(): string
    {
        return config('docker.docker_compose_path');
    }
}
