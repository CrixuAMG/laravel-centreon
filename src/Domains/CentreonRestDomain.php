<?php

namespace CrixuAMG\Centreon\Domains;

use CrixuAMG\Centreon\Centreon;
use CrixuAMG\Centreon\Concerns\ServiceStatus;

class CentreonRestDomain
{
    public function __construct(private Centreon $centreon) { }

    public function serviceStatus()
    {
        return new ServiceStatus($this->centreon);
    }
}
