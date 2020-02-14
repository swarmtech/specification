<?php

namespace SwarmtechTest\Specification\Fixture\Specification;

use Swarmtech\Specification\SpecificationInterface;
use SwarmtechTest\Specification\Fixture\Entity\User;

class UserIsFrenchSpecification implements SpecificationInterface
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
