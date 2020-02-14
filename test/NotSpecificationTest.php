<?php

namespace SwarmtechTest\Specification;

use PHPUnit\Framework\TestCase;
use Swarmtech\Specification\NotSpecification;
use SwarmtechTest\Specification\Fixture\Specification\UserIsMajorSpecification;
use SwarmtechTest\Specification\Fixture\Entity\User;

/**
 * @covers \Swarmtech\Specification\AndSpecification
 */
class NotSpecificationTest extends TestCase
{
    public function testIsSatisfied()
    {
        $user = new User();
        $user->age = 15;

        $userIsMajorSpecification = new UserIsMajorSpecification($user);
        $userIsNotMajorSpecification = new NotSpecification($userIsMajorSpecification);

        self::assertTrue($userIsNotMajorSpecification->isSatisfied());
    }

    public function testIsNotSatisfied()
    {
        $user = new User();
        $user->age = 24;

        $userIsMajorSpecification = new UserIsMajorSpecification($user);
        $userIsNotMajorSpecification = new NotSpecification($userIsMajorSpecification);

        self::assertFalse($userIsNotMajorSpecification->isSatisfied());
    }
}
