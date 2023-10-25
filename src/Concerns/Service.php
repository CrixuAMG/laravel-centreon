<?php

namespace CrixuAMG\Centreon\Concerns;

class Service extends CentreonModel
{
    public function list()
    {
        return $this->centreon
            ->getClient()
            ->command('show', 'SERVICE')
            ->json('result');
    }
}
