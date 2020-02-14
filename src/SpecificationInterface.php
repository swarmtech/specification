<?php
namespace Swarmtech\Specification;

interface SpecificationInterface
{
    public function isSatisfied();

    public function andSpec(SpecificationInterface $specification);

    public function orSpec(SpecificationInterface $specification);

    public function notSpec(SpecificationInterface $specification);
}
