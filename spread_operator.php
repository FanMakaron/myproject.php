<?php

//Use the spread operator with an array or an object that implements the Traversable interface.
//Use the PHP spread array to merge two or more arrays into one.

// Упаковывает переданные аргументы в массив, позволяет передавать в функцию произвольное кол-во аргументов
function a(...$arg){
    print_r($arg);
}

a(['q', 'qw'], 'qw', 22);

// И распаковывает значения массива в набор значений
function format_name(string $first, string $middle, string $last): string
{
    return $middle ? "$last $first $middle" : "$last $first";
}

// а тк мы в восьмой версии то еще и по индексу сразу раскидается все
echo format_name(
    first: 'John',
    middle: 'V.',
    last: 'Doe'
);

$names = [
    'last' => 'Пупкин',
    'first' => 'Джон',
    'middle' => 'Петрович',
];

echo format_name(...$names)."\n"; // John V. Doe

$arrayA = ['c' => 1];
$arrayB = ['b' => 2];

$result = ['a' => 0, ...$arrayA, ...$arrayB];

print_r($result);