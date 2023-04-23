<?php
$startMemory = memory_get_usage();
$start = microtime(true);


//function doStuff($k): Generator
//{
//    $last = 0;
//    $current = 1;
////    yield 1;
////    yield null;
//    while ($current < $k) {
//        $current = $last + $current;
//        $last = $current - $last;
//        yield $current;
//    }
//
//}
//
//function doStuff2($k): array
//{
//    $arr = [0];
//    $current = 1;
//    while ($current < $k) {
//        $current = end($arr) + $current;
//        $arr[] = $current - end($arr);
//    }
//
//    return $arr;
//}
//
//function doStuff3($k): void
//{
//    $i = 1;
//    while ($i < $k) {
//        echo "$i\n";
//        $i += $i;
//    }
//}

//doStuff3(10);
//echo (memory_get_usage() - $startMemory).' bytes'.PHP_EOL;
//$time = microtime(true) - $start;
//echo $time.' сек.';

//
//$generator = doStuff2(1000);
//
//foreach ($generator as $value) {
//    echo "$value\n";
//}
//echo (memory_get_usage() - $startMemory).' bytes'.PHP_EOL;
//
//$time = microtime(true) - $start;
//echo $time.' сек.';
//
//$generator = doStuff(1000);
//
//foreach ($generator as $value) {
//    echo "$value\n";
//}
//echo (memory_get_usage() - $startMemory).' bytes'.PHP_EOL;
//$time = microtime(true) - ($start + $time);
//echo $time.' сек.';
//function gen_one_to_three() {
//    for ($i = 1; $i <= 3; $i++) {
//        // Обратите внимание, что $i сохраняет своё значение между вызовами.
//        yield $i;
//    }
////    return 4;
//}
//
//$generator = gen_one_to_three();
//
//foreach ($generator as $value) {
//    echo "$value\n";
//}
//
//echo $generator->getReturn();

////////////////////

//$number = cal_days_in_month(CAL_GREGORIAN, 8, 2003); // 31
//echo "Всего {$number} дней в Августе 2003 года";

////////////////////

//#[\AllowDynamicProperties]
//class User
//{
//    public $name;
//}
//
//$user = new User();
//$user->last_name = 'Doe'; // Deprecated notice
//
//$user = new stdClass();
//$user->last_name = 'Doe'; // Still allowed

////////////////////
//echo 1 <=> 1;

////////////////////
//class A {private int $x = 1;}
//$getX = function() {return $this->x;};
//echo $getX->call(new A);


//
echo "\n";
echo (memory_get_usage() - $startMemory).' bytes'.PHP_EOL;
$time = microtime(true) - $start;
echo $time.' сек.';