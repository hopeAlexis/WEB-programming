<?php

//1 part: finding words
$str = 'ahb aqcb aeasfafb aafb amab akkb ab';

//Establishing a pattern with any two symbols between a & b
$pattern = '/a..b/';

//Returns the number of times the pattern was found in the string in array (matches)
preg_match_all($pattern, $str, $matches);

//Output
echo "<br> <b>", "Нужные строки вида a..b :\n", "</b> </br>";
foreach ($matches[0] as $match)
{
    echo $match , "\n";
}

//2 part: cubing numbers in the string
$str = 'a1b2c3';

//Pattern for finding arabic numerals in a string
$pattern = '/([0-9]+)/';

//Replaces found numerals in str
$str1 = preg_replace_callback($pattern, function($matches)
{
    $numeral = $matches[0];
    return pow($numeral, 3);
}, $str);

//Output
echo "<br> <b>", "Преобразованная строка :\n", "</b> </br>";
echo $str1;