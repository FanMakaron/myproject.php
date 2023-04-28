<?php
// Возрастающая последовательность интов. Создать генератор.
// Колбеки(callable) - передача в качестве аргумента: простой, анонимной или стрелочной функции.
// Замыкания(Closure)/лямбда функции/анонимные функции
$startMemory = memory_get_usage();
$start = microtime(true);

/**
 * @param int $start
 * @param int $limit
 * @param int $step
 * @return Generator
 */
function rangeGenerator(int $start, int $limit, int $step = 1): Generator
{
    if ($start <= $limit) {
        if ($step <= 0) {
            throw new LogicException('Шаг должен быть положительным');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException('Шаг должен быть отрицательным');
        }

        for ($i = $start; $i >= $limit; $i += $step) {
            yield $i;
        }
    }
}

/**
 * @param $k
 * @return Generator
 */
function iterGenerator($k): Generator
{
    $last = 0;
    $current = 1;
    yield 1;
    yield null;
    while ($current < $k) {
        $current = $last + $current;
        $last = $current - $last;
        yield $current;
    }

}

/**
 * @param $k
 * @return int[]
 */
function iterArray($k): array
{
    $arr = [0];
    $current = 1;
    while ($current < $k) {
        $current = end($arr) + $current;
        $arr[] = $current - end($arr);
    }

    return $arr;
}

function iterStatic($k): int
{
    static $i = 1;

    $i += $k;

    return $i;
}

// Увеличение по фибоначи
//$generator = iterArray(1000);
//$generator = iterGenerator(1000);
// Нечётные однозначные числа
//$generator = range(1, 1000, 2);
//$generator = rangeGenerator(1, 3, 2);
//foreach ($generator as $value) {
//    echo "$value\n";
//}

//for ($k = 1; $k < 10; $k = iterStatic($k)) {
//    echo "$k\n";
//}

function gen()
{
    $ret = yield 'yield1';
    var_dump($ret);
    $ret = yield 'yield2';
    var_dump($ret);
    $ret = yield 'yield3';
    var_dump($ret);
}

function gen2()
{
    $a = 1 / 0;
    yield $a;
    ++$a;
    yield $a;
}

$gen = gen();
//$gen2 = gen2();
//$gen2->rewind();
//foreach ($gen2 as $value) {
//    var_dump($value);
//}

$generator = static function (){
    $current = 1;
    $k = 2;
    while ($current < $k){
        $k = yield;
        yield $current;
    }
};

$generator()->send(4);


//for($i=0; $i<3; ++$i){
//    var_dump($gen2);
//    var_dump($gen2->current());
//    $gen2->next();
//}

foreach ($generator() as $value) {
    var_dump($value);
}


//var_dump("one: ".$gen->current());    // string(6) "yield1"
//$gen->next();
//var_dump("one/two: ".$gen->current());
//var_dump("two: ".$gen->send('ret1')); // string(4) "ret1"   (the first var_dump in gen)
////// string(6) "yield2" (the var_dump of the ->send() return value)
//var_dump("three: ".$gen->send('ret2')); // string(4) "ret2"   (again from within gen)
// NULL               (the return value of ->send())


echo "\n";
echo (memory_get_usage() - $startMemory).' bytes'.PHP_EOL;
$time = microtime(true) - $start;
echo $time.' сек.';