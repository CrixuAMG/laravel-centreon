<?php

namespace CrixuAMG\Centreon\Client;

use CrixuAMG\Centreon\Centreon;

class CentreonClient extends \GuzzleHttp\Client
{
    public function fetch($uri = null, array $options = [])
    {
        $response = parent::get(Centreon::ROOT_URI . $uri, $options);

        return CentreonResponse::from($response);
    }
}
