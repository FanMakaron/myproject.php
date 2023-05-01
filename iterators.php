<?php
$startMemory = memory_get_usage();
$start = microtime(true);

class iterators implements Iterator {
    public function current(): mixed
    {
        // TODO: Implement current() method.
    }

    public function next(): void
    {
        // TODO: Implement next() method.
    }

    public function key(): mixed
    {
        // TODO: Implement key() method.
    }

    public function valid(): bool
    {
        // TODO: Implement valid() method.
    }

    public function rewind(): void
    {
        // TODO: Implement rewind() method.
    }
}

$arr = [
    "sitepoint",
    "phpmaster",
    "buildmobile",
    "rubysource",
    "designfestival",
    "cloudspring",
];

// Создаем ArrayIterator и передаем ему массив
$iter = new ArrayIterator($arr);

// Цикл для обработки объекта
foreach ($iter as $key => $value) {
    echo $key.":  ".$value."\n";
}

echo "\n";
echo (memory_get_usage() - $startMemory).' bytes'.PHP_EOL;
$time = microtime(true) - $start;
echo $time.' сек.';