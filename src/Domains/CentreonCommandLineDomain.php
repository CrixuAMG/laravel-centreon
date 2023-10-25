<?php

namespace CrixuAMG\Centreon\Domains;

use CrixuAMG\Centreon\Concerns\Host;

class CentreonCommandLineDomain extends AbstractCentreonDomain
{
    public function hosts()
    {
        return new Host($this->centreon);
    }
}
