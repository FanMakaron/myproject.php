<?php
//Чтение большого файла. Поиск в нем.
$startMemory = memory_get_usage();
$start = microtime(true);
$filename =  'file.txt';

/********** fopen  **********/
//$handle = fopen($filename, 'rb');

// fread($handle, 10)
// Посимвольное смещение не учитывает мультибайтовую кодировку - нужен какой-нибудь чанкер. Например https://github.com/jstewmc/chunker/tree/master/src
// Для кириллицы достаточно добавить пустой символ вначало ''

// Чтение из файлового указателя
//echo fread($handle, filesize($filename));


// Чтение из строкового указателя
//while (($str = fgets($handle)) !== false){
//    if(mb_strstr($str, 'да')){
//        echo PHP_EOL.mb_strlen($str).PHP_EOL;
//        echo $str;
//    }
//}


// Чтение из символьного указателя
//while (($str = fgetc($handle)) !== false){
//    echo $str;
//}

// Чтение из символьного указателя с кириллицей из примера https://www.php.net/manual/ru/function.fgetc.php#122331
//$mbch = '';    // keeps the first byte of 2-byte cyrillic letters
//while (FALSE !== ($ch = fgetc($handle))) {
//
//    //check for the sign of 2-byte cyrillic letters
//    if (empty($mbch) && (in_array(ord($ch), [208,209,129]))) {
//        $mbch = $ch;    // keep the first byte
//        continue;
//    }
//
//
//    echo $mbch . $ch .PHP_EOL;
//
//
//    if (!empty($mbch)) {
//        $mbch = '';
//    }    // erase the byte after using
//}


//fclose($handle);


/********** fopen with Generator  **********/
//function fileGenerator($filename){
//    $handle = fopen($filename, 'rb');
//
//    while (!feof($handle)){
//        yield fgets($handle);
//    }
//
//    fclose($handle);
//}
//
//foreach (fileGenerator($filename) as $str){
//    if(mb_strstr($str, 'да')){
//        echo $str;
//    }
//}

/********** file  **********/
//$contents = array_filter(file($filename),static fn($str) => mb_strstr($str, 'да'));

/********** file_get_contents  **********/
//$contents = file_get_contents($filename);

/********** readfile  **********/
//readfile($filename);


/********** Пайпинг в потоках  **********/
//$handle1 = fopen($filename, "rb");
//$handle2 = fopen("php://stdout", "wb");
//stream_copy_to_stream($handle1, $handle2);
//fclose($handle1);
//fclose($handle2);


echo "\n";
echo (memory_get_usage() - $startMemory).' bytes'.PHP_EOL;
$time = microtime(true) - $start;
echo $time.' сек.';
