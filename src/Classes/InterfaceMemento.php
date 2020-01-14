<?php declare(strict_types=1);

namespace Memento\Classes;

interface InterfaceMemento
{
    public function getState() : array;
}
