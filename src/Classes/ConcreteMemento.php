<?php declare(strict_types=1);

namespace Memento\Classes;

class ConcreteMemento implements InterfaceMemento
{
    private $state = [];

    public function __construct(array $state)
    {
        $this->state = $state;
    }

    public function getState() : array
    {
        return $this->state;
    }
}
