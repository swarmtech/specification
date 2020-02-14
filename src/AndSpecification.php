<?php

namespace Swarmtech\Specification;

class AndSpecification extends AbstractSpecification implements SpecificationInterface
{
    protected $specifications;

    public function __construct(array $specifications)
    {
        $this->specifications = $specifications;
    }

    public function isSatisfied(): bool
    {
        foreach ($this->specifications as $specification) {
            /** @var SpecificationInterface $specification */
            if (! $specification->isSatisfied()) {
                return false;
            }
        }

        return true;
    }
}
