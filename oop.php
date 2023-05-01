<?php
//Навернуть кеш над внешним вызовом метода

$startMemory = memory_get_usage();
$start = microtime(true);

abstract class Cache
{
    protected static $_cache = null;
    protected static $_cacheTTL = 0;
    protected static $_cacheExpired = false;

    protected const CACHE_TIME = 10;

    public function __construct(protected int $hardWorkMax)
    {
    }

    protected function hardWork(){
        sleep(1);
        return range(0, $this->hardWorkMax);
    }

    public function findAll(): array
    {
        if(static::$_cache === null || static::$_cacheExpired || static::$_cacheTTL < time()){
            static::$_cache = $this->hardWork();
            static::$_cacheExpired = false;
            static::$_cacheTTL = time() + static::CACHE_TIME;
        }
        return static::$_cache;
    }

    public function cacheExpired(): void
    {
        static::$_cacheExpired = true;
    }
}

class A extends Cache{
    protected static $_cache = null;
    protected static $_cacheTTL = 0;
    protected static $_cacheExpired = false;


}

class B extends Cache{
    protected static $_cache = null;
    protected static $_cacheTTL = 0;
    protected static $_cacheExpired = false;
}

$a = new A(100);
$b = new B(10);


// первый запуск ждем секундочку
var_dump(count($a->findAll()));

// второй запуск ничего не ждем
var_dump(count($a->findAll()));


var_dump(count($b->findAll()));

var_dump(count($b->findAll()));

$b->cacheExpired();

var_dump(count($b->findAll()));
var_dump(count($b->findAll()));

echo "\n";
echo (memory_get_usage() - $startMemory).' bytes'.PHP_EOL;
$time = microtime(true) - $start;
echo $time.' сек.';