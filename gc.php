<?php
$startMemory = memory_get_usage();
$start = microtime(true);

$a = array('one', 'twodfsdf sdfa sdfasd fasdf asdf adfads');
//$a[] = 1;


$b = static fn() => 1 + 2;

print_r($b()."\n");

$a[] = &$a;

unset($a);

echo gc_collect_cycles();

echo "\n";
echo (memory_get_usage() - $startMemory).' bytes'.PHP_EOL;
$time = microtime(true) - $start;
echo $time.' сек.';

