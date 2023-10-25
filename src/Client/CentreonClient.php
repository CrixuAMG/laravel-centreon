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

        $response = $this->centreon->getClient()
            ->get(Centreon::ROOT_URI . $uri, $options);

        return CentreonResponse::from($response);
    }

    public function command($action, $object = null, $values = null)
    {
        $json = [
            'action' => $action,
        ];
        if ($object != '') {
            $json['object'] = $object;
        }
        if ($values != '') {
            $json['values'] = $values;
        }

        $response = $this->centreon->getClient()
            ->post(Centreon::ROOT_URI, [
                'query'   => [
                    'action' => 'action',
                    'object' => 'centreon_clapi',
                ],
                'headers' => [
                    'Content-Type'        => 'application/json',
                    'centreon-auth-token' => $this->centreon->getToken(),
                ],
                'json'    => $json,
            ]);

        return CentreonResponse::from($response);
    }
}
