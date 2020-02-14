<?php

namespace Swarmtech\Specification;

class OrSpecification implements SpecificationInterface
{
    private $specifications;

    public function __construct(array $specifications)
    {
        $this->specifications = $specifications;
    }

    public function isSatisfied(): bool
    {
        foreach ($this->specifications as $specification) {
            /** @var SpecificationInterface $specification */
            if ($specification->isSatisfied()) {
                return true;
            }
        }

        return false;
    }
}
