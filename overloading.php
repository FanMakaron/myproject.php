<?php
// Перегрузка свойств и методов

/**
 * Перегрузка в плюсах - одно и тоже название метода, но разные типы или список аргументов.
 * Перегрузка в пыхе может быть как свойств так и методов.
 * При перегрузке свойств используется магия __get, __set, __isset, __unset.
 * Таким образом мы можем генерировать налету новые свойства.
 * Перегрузка методов идет через магические методы __call, __callStatic, внутри которых по сути можно реализовать классическую перегрузку. Проверяя тип или количество аргументов и вызывая необходимые методы внутри класса.

 */
$startMemory = memory_get_usage();
$start = microtime(true);

class overloading
{
    //////////Перегрузка свойств/////////////
    public function __get(string $name): void
    {

    }

    public function __set(string $name, mixed $value): void
    {

    }

    public function __isset(string $name): bool
    {

    }

    public function __unset(string $name): void
    {

    }

    //////////Перегрузка методов/////////////
    // Магия работает только на закрытые или несуществующие методы класса
    public function __call(string $name, array $arg): void
    {
        if ($name === 'A' && count($arg) === 1) {
            if (is_int($arg[0])) {
                $this->intA($arg[0]);
            } elseif (is_string($arg[0])) {
                $this->stringA($arg[0]);
            }
        }
    }

    public static function __callStatic(string $name, array $arg): void
    {

    }

    ///////////////////////

    // Как только появляется объявление метода, __call перестает работать
//    public function A(mixed $a): void
//    {
//        print_r($a);
//    }

    private function intA(int $a): void
    {
        echo "число: $a";
    }

    private function stringA(string $a): void
    {
        echo "строка: $a";
    }


}

$p = new overloading();

$p->A(1);


echo "\n";
echo (memory_get_usage() - $startMemory).' bytes'.PHP_EOL;
$time = microtime(true) - $start;
echo $time.' сек.';