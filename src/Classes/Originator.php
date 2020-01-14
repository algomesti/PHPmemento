<?php
declare(strict_types=1);

namespace Memento\Classes;

class Originator
{
    private $state = [];

    public function __construct()
    {
        $state['code'] = $this->generateRandomString(3);
    }

    public function f1()
    {
        $newState = $this->generateRandomString();
        $this->changeState($newState);
    }

    private function changeState(string $code)
    {
        $this->state['code'] = $code;
    }

    private function generateRandomString(int $length = 10): string
    {
        return substr(
            str_shuffle(
                str_repeat(
                    $x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                    (int) ceil($length / strlen($x))
                )
            ),
            1,
            $length
        );
    }

    public function save() : InterfaceMemento
    {
        return new ConcreteMemento($this->state);
    }

    public function restore(InterfaceMemento $memento) : void
    {
        $this->state = $memento->getState();
        echo "\n\n [ORIGINATOR] STATE RESTAURADO: ". json_encode($this->state);
    }
}
