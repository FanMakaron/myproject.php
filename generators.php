<?php
//Возрастающая последовательность интов. Создать генератор. Колбеки и замыкания
$startMemory = memory_get_usage();
$start = microtime(true);






echo "\n";
echo (memory_get_usage() - $startMemory).' bytes'.PHP_EOL;
$time = microtime(true) - $start;
echo $time.' сек.';