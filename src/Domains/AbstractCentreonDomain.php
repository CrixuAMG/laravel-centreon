<?php

namespace CrixuAMG\Centreon\Domains;

use CrixuAMG\Centreon\Centreon;

abstract class AbstractCentreonDomain
{
    public function __construct(protected Centreon $centreon) { }

    protected function instantiate(string $className)
    {
        return new $className($this->centreon);
    }
}