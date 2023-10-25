<?php

namespace CrixuAMG\Centreon;

use CrixuAMG\Centreon\Client\CentreonClient;
use CrixuAMG\Centreon\Domains\CentreonRestDomain;
use CrixuAMG\Centreon\Exceptions\CentreonException;

class Centreon
{
    private $host;
    private $username;
    private $password;
    private $token;

    const ROOT_URI = '/centreon/api/index.php';
    const URL_AUTHENTICATE = '?action=authenticate';

    public static function create()
    {
        return new static();
    }

    public function setHost(string $host)
    {
        $this->host = $host;

        return $this;
    }

    public function login(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;

        return $this->authenticate();
    }

    private function authenticate(): static
    {
        $authResponse = $this->getClient()
            ->post(sprintf('%s%s', self::ROOT_URI, self::URL_AUTHENTICATE), [
                'form_params' => [
                    'username' => $this->username,
                    'password' => $this->password,
                ],
            ]);

        if ($authResponse->getStatusCode() == 200) {
            $this->token = json_decode($authResponse->getBody()->getContents())->authToken;
        } else {
            throw new \Exception('Authentication failed!');
        }

        return $this;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getClient()
    {
        if (!$this->host) throw new CentreonException('Centreon host must be defined');

        return new CentreonClient($this, [
            'base_uri' => $this->host,
        ]);
    }

    public function restApi()
    {
        return new CentreonRestDomain($this);
    }
}
