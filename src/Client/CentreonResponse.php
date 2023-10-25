<?php

namespace CrixuAMG\Centreon\Client;

use Psr\Http\Message\ResponseInterface;

class CentreonResponse
{
    public function __construct(private ResponseInterface $response) { }

    public static function from(ResponseInterface $response): static
    {
        return new static($response);
    }

    public function json()
    {
        return json_decode(
            $this->response
                ->getBody()
                ->getContents(),
            true,
        );
    }
}