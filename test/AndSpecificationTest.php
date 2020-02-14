<?php

namespace SwarmtechTest\Specification;

use PHPUnit\Framework\TestCase;
use SwarmtechTest\Specification\Fixture\Specification\UserIsFrenchSpecification;
use SwarmtechTest\Specification\Fixture\Specification\UserIsMajorSpecification;
use Swarmtech\Specification\AndSpecification;
use SwarmtechTest\Specification\Fixture\Entity\User;

/**
 * @covers \Swarmtech\Specification\AndSpecification
 */
class AndSpecificationTest extends TestCase
{
    public function testIsSatisfied()
    {
        $user = new User();
        $user->age = 24;
        $user->country = 'france';

        $userIsMajorAndFrenchSpecification = new AndSpecification([
            new UserIsMajorSpecification($user),
            new UserIsFrenchSpecification($user)
        ]);

        self::assertTrue($userIsMajorAndFrenchSpecification->isSatisfied());
    }

    public function testIsNotSatisfied()
    {
        $user = new User();
        $user->age = 17;
        $user->country = 'france';

        $userIsMajorAndFrenchSpecification = new AndSpecification([
            new UserIsMajorSpecification($user),
            new UserIsFrenchSpecification($user)
        ]);

        self::assertFalse($userIsMajorAndFrenchSpecification->isSatisfied());
    }

    public function testIsNotSatisfiedCase2()
    {
        $user = new User();
        $user->age = 19;
        $user->country = 'belgium';

        $userIsMajorAndFrenchSpecification = new AndSpecification([
            new UserIsMajorSpecification($user),
            new UserIsFrenchSpecification($user)
        ]);

        self::assertFalse($userIsMajorAndFrenchSpecification->isSatisfied());
    }
}
