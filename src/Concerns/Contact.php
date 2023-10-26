<?php

namespace CrixuAMG\Centreon\Concerns;

class Contact extends CentreonModel
{
    public function list()
    {
        return $this->centreon
            ->getClient()
            ->command('show', 'CONTACT')
            ->json('result');
    }

    public function show(string $name)
    {
        return $this->centreon
            ->getClient()
            ->command('show', 'CONTACT', $name)
            ->json('result.0');
    }

    public function create(
        string $name,
        string $loginName,
        string $email,
        string $password,
        bool   $isSuperAdmin = false,
        bool   $guiAccess = false,
        string $languageIsoCode = 'en_US',
        string $authenticationType = 'local',
    ) {
        return $this->centreon
            ->getClient()
            ->command('add',
                'CONTACT',
                sprintf(
                    '%s;%s;%s;%s;%s;%s;%s;%s',
                    $name,
                    $loginName,
                    $email,
                    $password,
                    $isSuperAdmin ? 1 : 0,
                    $guiAccess ? 1 : 0,
                    $languageIsoCode,
                    $authenticationType,
                ))
            ->json('result');
    }
}