<?php

namespace CrixuAMG\Centreon\Domains;

use CrixuAMG\Centreon\Concerns\ServiceStatus;

class CentreonRestDomain extends AbstractCentreonDomain
{
    public function serviceStatus()
    {
        return $this->instantiate(ServiceStatus::class);
    }
}
