<?php

namespace CrixuAMG\Centreon\Client;

use Psr\Http\Message\ResponseInterface;

class CentreonResponse
{
    public function __construct(private ResponseInterface $response)
    {
    }

    public static function from(ResponseInterface $response): static
    {
        return new static($response);
    }

    public function json(string $key = null, $default = [])
    {
        $json = json_decode(
            $this->response
                ->getBody()
                ->getContents(),
            true,
        );

        if ($key) {
            $json = \Arr::get($json, $key, $default);
        }

        return $json;
    }
}
