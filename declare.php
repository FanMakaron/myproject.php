<?php
declare(strict_types=1);
function sum(int $a, int $b) {
    return $a + $b;
}

var_dump(sum(1, 2));
var_dump(sum("1", "2"));
declare(ticks=1);

// Функция, исполняемая при каждом тике
class tick_handler
{
    public function run(): void
    {
        echo "Вызывается tick_handler()\n";
    }

}

$tick_handler = new tick_handler();
register_tick_function([$tick_handler,'run']); // вызывает событие тика

$a = 1; // вызывает событие тика

if ($a > 0) {
    $a += 2; // вызывает событие тика
    print_r($a."\n"); // вызывает событие тика
}

//declare(encoding='ISO-8859-1');
//
//print_r('авыаыв');

