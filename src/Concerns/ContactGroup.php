<?php

namespace CrixuAMG\Centreon\Concerns;

use CrixuAMG\Centreon\Centreon;

class ContactGroup extends CentreonModel
{
    public function list()
    {
        return $this->centreon
            ->getClient()
            ->command('show', 'CG')
            ->json('result');
    }

    public function show(string $name)
    {
        return $this->centreon
            ->getClient()
            ->command('show', 'CG', $name)
            ->json('result.0');
    }

    public function create(string $name)
    {
        return $this->centreon
            ->getClient()
            ->command('add', 'CG', sprintf('%s;%s', $name, $name))
            ->json('result');
    }

    public function addContact(string $contactGroupName, string $name)
    {
        return $this->centreon
            ->getClient()
            ->command('addcontact', 'CG', sprintf('%s;%s', $contactGroupName, $name))
            ->json('result');
    }

    public function removeContact(string $contactGroupName, string $name)
    {
        return $this->centreon
            ->getClient()
            ->command('delcontact', 'CG', sprintf('%s;%s', $contactGroupName, $name))
            ->json('result');
    }
}