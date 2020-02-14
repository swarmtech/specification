<?php
namespace Swarmtech\Specification;

abstract class  AbstractSpecification implements SpecificationInterface
{
    public function andSpec(SpecificationInterface $specification)
    {
        return new AndSpecification([$this, $specification]);
    }

    public function orSpec(SpecificationInterface $specification)
    {
        return new OrSpecification([$this, $specification]);
    }

    public function notSpec(SpecificationInterface $specification)
    {
        return new NotSpecification($this);
    }
}
