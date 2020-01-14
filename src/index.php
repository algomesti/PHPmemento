<?php declare(strict_types=1);

require_once '../vendor/autoload.php';

use Memento\Classes\Originator;
use Memento\Classes\Caretaker;

$originator = new Originator();
$caretaker = new Caretaker($originator);

$caretaker->backup();
$originator->f1();

$caretaker->backup();
$originator->f1();

$caretaker->backup();
$originator->f1();

echo "\n";
$caretaker->showHistory();

echo "\nClient: Now, let's rollback!\n\n";
$caretaker->restore();
$caretaker->restore();
