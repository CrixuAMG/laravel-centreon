<?php

namespace CrixuAMG\Centreon\Domains;

use CrixuAMG\Centreon\Concerns\Host;
use CrixuAMG\Centreon\Concerns\Server;
use CrixuAMG\Centreon\Concerns\Service;

class CentreonCommandLineDomain extends AbstractCentreonDomain
{
    public function hosts()
    {
        return new Host($this->centreon);
    }

    public function services()
    {
        return new Service($this->centreon);
    }

    public function servers()
    {
        return new Server($this->centreon);
    }
}
