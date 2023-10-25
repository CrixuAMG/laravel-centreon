<?php

namespace CrixuAMG\Centreon\Domains;

use CrixuAMG\Centreon\Centreon;

abstract class AbstractCentreonDomain
{
    public function __construct(private Centreon $centreon) { }
}