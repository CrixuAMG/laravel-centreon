<?php

namespace CrixuAMG\Centreon\Concerns;

use CrixuAMG\Centreon\Centreon;

class Server extends CentreonModel
{
    public function create(string $hostname, string $ipAddress, array $templates = [])
    {
        return $this->centreon
            ->getClient()
            ->command('add', 'HOST', sprintf(
                '%s;%s;%s;%s;%s;',
                $hostname,
                $hostname,
                $ipAddress,
                implode(',', $templates),
                Centreon::POLLER
            ))
            ->json('result');
    }
}
