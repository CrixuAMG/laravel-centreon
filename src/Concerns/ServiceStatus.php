<?php

namespace CrixuAMG\Centreon\Concerns;

use CrixuAMG\Centreon\Centreon;

class ServiceStatus extends CentreonModel
{
    public function unhandledProblems()
    {
        return $this->centreon
            ->getClient()
            ->fetch(options: [
                'headers' => [
                    'centreon-auth-token' => $this->centreon->getToken(),
                ],
                'query'   => [
                    'object'   => 'centreon_realtime_services',
                    'action'   => 'list',
                    'viewType' => 'unhandled',
                    'limit'    => 1000,
                ],
            ])
            ->json();
    }
}
