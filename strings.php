<?php
//Каждую последнюю букву сделать заглавной
$startMemory = memory_get_usage();
$start = microtime(true);

$example = 'Группа рваные nginx\'ы с синглом мой тон: "Я обернулся посмотреть не obserWish ли ты меня"';
print_r($example."\n");

$specialDictionary = [' ',',','.','!','?', ':', '"', '\''];


/************ С переводом в массив ************/
foreach ($specialDictionary as $character){
    $example = explode($character, $example);
    $example = array_map(static function ($word){
        $lastWord = mb_strtoupper(mb_substr($word, -1, 1));
        return mb_substr($word, 0, -1).$lastWord;
    }, $example);
    $example = implode($character, $example);
}

print_r($example."\n");


/************ словарем ************/
$dictionary = ['а', 'б', 'о', 'у', 'м', 'й', 'с', 'я', 'h', 'е', 'ы', 'н'];
$dictionaryUppers = [];

foreach ($dictionary as $letter){
    $dictionaryUppers[] = mb_strtoupper($letter);
}

foreach ($specialDictionary as $character){
    $example = str_replace(
        array_map(static fn($letter) => $letter.$character, $dictionary),
        array_map(static fn($letter) => $letter.$character, $dictionaryUppers),
        $example);
}

$exampleLast = str_replace(
    $dictionary,
    $dictionaryUppers,
    mb_substr($example,-1, 1)
);

print_r(mb_substr($example,0, -1).$exampleLast);

/************ Регуляркой ************/
//print_r(preg_replace('//', '',$example));


echo "\n";
echo (memory_get_usage() - $startMemory).' bytes'.PHP_EOL;
$time = microtime(true) - $start;
echo $time.' сек.';