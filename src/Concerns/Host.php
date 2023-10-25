<?php

namespace CrixuAMG\Centreon\Concerns;

class Host extends CentreonModel
{
    public function list()
    {
        return $this->centreon
            ->getClient()
            ->command('show', 'HOST')
            ->json('result');
    }
}
