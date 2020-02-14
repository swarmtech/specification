<?php

namespace SwarmtechTest\Specification;

use PHPUnit\Framework\TestCase;
use Swarmtech\Specification\OrSpecification;
use SwarmtechTest\Specification\Fixture\Specification\UserIsFrenchSpecification;
use SwarmtechTest\Specification\Fixture\Specification\UserIsMajorSpecification;
use SwarmtechTest\Specification\Fixture\Entity\User;

/**
 * @covers \Swarmtech\Specification\AndSpecification
 */
class OrSpecificationTest extends TestCase
{
    public function testIsSatisfiedCase1()
    {
        $user = new User();
        $user->age = 24;
        $user->country = 'belgium';

        $userIsMajorOrFrenchSpecification = new OrSpecification([
            new UserIsMajorSpecification($user),
            new UserIsFrenchSpecification($user)
        ]);

        self::assertTrue($userIsMajorOrFrenchSpecification->isSatisfied());
    }

    public function testIsSatisfiedCase2()
    {
        $user = new User();
        $user->age = 12;
        $user->country = 'france';

        $userIsMajorOrFrenchSpecification = new OrSpecification([
            new UserIsMajorSpecification($user),
            new UserIsFrenchSpecification($user)
        ]);

        self::assertTrue($userIsMajorOrFrenchSpecification->isSatisfied());
    }

    public function testIsSatisfiedCase3()
    {
        $user = new User();
        $user->age = 24;
        $user->country = 'france';

        $userIsMajorOrFrenchSpecification = new OrSpecification([
            new UserIsMajorSpecification($user),
            new UserIsFrenchSpecification($user)
        ]);

        self::assertTrue($userIsMajorOrFrenchSpecification->isSatisfied());
    }

    public function testIsNotSatisfied()
    {
        $user = new User();
        $user->age = 14;
        $user->country = 'belgium';

        $userIsMajorOrFrenchSpecification = new OrSpecification([
            new UserIsMajorSpecification($user),
            new UserIsFrenchSpecification($user)
        ]);

        self::assertFalse($userIsMajorOrFrenchSpecification->isSatisfied());
    }
}
