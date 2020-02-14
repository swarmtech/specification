<?php

namespace SwarmtechTest\Specification\Fixture\Specification;

use Swarmtech\Specification\AbstractSpecification;
use SwarmtechTest\Specification\Fixture\Entity\User;

class UserIsFrenchSpecification extends AbstractSpecification
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function isSatisfied()
    {
        return $this->user->country == 'france';
    }
}
