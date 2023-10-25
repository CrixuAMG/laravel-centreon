<?php

namespace CrixuAMG\Centreon\Concerns;

use CrixuAMG\Centreon\Centreon;

class Host extends CentreonModel
{
    public function list()
    {
        return $this->centreon
            ->getClient()
            ->command('show', 'HOST')
            ->json('result');
    }

    public function show(string $hostname)
    {
        return $this->centreon
            ->getClient()
            ->command('show', 'HOST', $hostname)
            ->json('result.0');
    }

    public function create(string $hostname, string $alias, string $ipAddress, array $templates = [])
    {
        return $this->centreon
            ->getClient()
            ->command('add', 'HOST', sprintf(
                '%s;%s;%s;%s;%s;',
                $hostname,
                $alias,
                $ipAddress,
                implode(',', $templates),
                Centreon::POLLER
            ))
            ->json('result');
    }
}
