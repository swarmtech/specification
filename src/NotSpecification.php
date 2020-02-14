<?php

namespace Swarmtech\Specification;

class NotSpecification implements SpecificationInterface
{
    private $specification;

    public function __construct(SpecificationInterface $specification)
    {
        $this->specification = $specification;
    }

    public function isSatisfied(): bool
    {
        return !$this->specification->isSatisfied();
    }
}
