<?php
namespace Swarmtech\Specification;

use Swarmtech\Specification\AbstractSpecification;

class NotSpecification extends AbstractSpecification implements SpecificationInterface
{
    private $specification;

    public function __construct(SpecificationInterface $specification)
    {
        $this->specification = $specification;
    }

    public function isSatisfied(): bool
    {
        return ! $this->specification->isSatisfied();
    }
}
