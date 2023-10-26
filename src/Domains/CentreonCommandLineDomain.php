<?php

namespace CrixuAMG\Centreon\Domains;

use CrixuAMG\Centreon\Concerns\Host;
use CrixuAMG\Centreon\Concerns\Service;
use CrixuAMG\Centreon\Concerns\Contact;
use CrixuAMG\Centreon\Concerns\ContactGroup;

class CentreonCommandLineDomain extends AbstractCentreonDomain
{
    public function hosts()
    {
        return $this->instantiate(Host::class);
    }

    public function services()
    {
        return $this->instantiate(Service::class);
    }

    public function contactGroups()
    {
        return $this->instantiate(ContactGroup::class);
    }

    public function contacts()
    {
        return $this->instantiate(Contact::class);
    }
}
