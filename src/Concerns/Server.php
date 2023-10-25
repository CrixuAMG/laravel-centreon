<?php

namespace CrixuAMG\Centreon\Concerns;

class Server extends CentreonModel
{
    public function create(string $hostname, string $ipAddress, array $templates = [])
    {
        return $this->centreon
            ->getClient()
            ->command('add', 'HOST', sprintf(
                '%s;%s;%s;%s;central;',
                $hostname,
                $hostname,
                $ipAddress,
                implode(',', $templates)
            ))
            ->json('result');
    }
}
