<?php

namespace CrixuAMG\Centreon\Concerns;

use CrixuAMG\Centreon\Centreon;

abstract class CentreonModel
{
    public function __construct(protected Centreon $centreon) { }
}