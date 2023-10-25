<?php

namespace CrixuAMG\Centreon\Client;

use CrixuAMG\Centreon\Centreon;

class CentreonClient extends \GuzzleHttp\Client
{
    public function __construct(private Centreon $centreon, array $config = [])
    {
        parent::__construct($config);
    }

    public function fetch($uri = null, array $options = [])
    {
        $options = array_merge(
            [
                'headers' => [
                    'centreon-auth-token' => $this->centreon->getToken(),
                ],
            ],
            $options,
        );

        $response = parent::get(Centreon::ROOT_URI.$uri, $options);

        return CentreonResponse::from($response);
    }
}
