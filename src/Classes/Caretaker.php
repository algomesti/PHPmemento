<?php declare(strict_types=1);

namespace Memento\Classes;

use Memento\Classes\Originator;

class Caretaker
{
    private $mementos = [];
    private $originator;

    public function __construct(Originator $originator)
    {
        $this->originator = $originator;
    }

    public function backup() : void
    {
        $this->mementos[] = $this->originator->save();
    }

    public function restore() : void
    {
        $memento = array_pop($this->mementos);
        try {
            $this->originator->restore($memento);
        } catch (\Exception $e) {
            $this->restore();
        }
    }

    public function showHistory(): void
    {
        foreach ($this->mementos as $memento) {
            print_r($memento->getState());
        }
    }
}
