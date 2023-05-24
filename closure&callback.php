<?php

class A
{
    /**
     * @var int
     */
    public int $a = 10;
    /**
     * @var callable
     */
    public $closure;

    public function findAll(): array
    {
        $this->closure = fn(int $b) => $this->a + $b;
        $this->test();
        return range(1, 10);
    }

    private function test(){
        $this->a = 1;
    }
}









$closure = static fn(int $a, int $b) => $a + $b;
$closure2 = fn(int $a, int $b) => $this->a + $b;
$a = new A();

/**
 * public static bind(Closure $closure, ?object $newThis, object|string|null $newScope = "static"): ?Closure
 */
class A1
{
    private static $sfoo = 1;
    private $ifoo = 2;
}

$cl1 = static function () {
    return A1::$sfoo;
};
$cl2 = function () {
    return $this->ifoo;
};

$bcl1 = Closure::bind($cl1, null, 'A1');
$bcl2 = Closure::bind($cl2, new A1(), 'A1');
echo $bcl1(), "\n";
echo $bcl2(), "\n";


/**
 * public bindTo(?object $newThis, object|string|null $newScope = "static"): ?Closure
 */



/**
 * public call(object $newThis, mixed ...$args): mixed
 */



/**
 * public static fromCallable(callable $callback): Closure
 * or
 * CallableExpr(...)
 */
// в c1 результат выполнения метода findAll()
$c1 = $a->findAll();

// в $c2 уже сидит Closure с содержимым из findAll() при этом с доступом ко всем приватным методам и свойствам
$c2 = $a->findAll(...);