<!--
--- Day 1: Trebuchet?! ---

Something is wrong with global snow production, and you've been selected to take a look. The Elves have even given you a map; on it, they've used stars to mark the top fifty locations that are likely to be having problems.

You've been doing this long enough to know that to restore snow operations, you need to check all fifty stars by December 25th.

Collect stars by solving puzzles. Two puzzles will be made available on each day in the Advent calendar; the second puzzle is unlocked when you complete the first. Each puzzle grants one star. Good luck!

You try to ask why they can't just use a weather machine ("not powerful enough") and where they're even sending you ("the sky") and why your map looks mostly blank ("you sure ask a lot of questions") and hang on did you just say the sky ("of course, where do you think snow comes from") when you realize that the Elves are already loading you into a trebuchet ("please hold still, we need to strap you in").

As they're making the final adjustments, they discover that their calibration document (your puzzle input) has been amended by a very young Elf who was apparently just excited to show off her art skills. Consequently, the Elves are having trouble reading the values on the document.

The newly-improved calibration document consists of lines of text; each line originally contained a specific calibration value that the Elves now need to recover. On each line, the calibration value can be found by combining the first digit and the last digit (in that order) to form a single two-digit number.

For example:

1abc2
pqr3stu8vwx
a1b2c3d4e5f
treb7uchet
In this example, the calibration values of these four lines are 12, 38, 15, and 77. Adding these together produces 142.

Consider your entire calibration document. What is the sum of all of the calibration values?
-->
<?php

//get input of file into php

//better code to read file contents
$filename = 'day_1_input.txt';
$lines = [];

$f = fopen($filename, 'r');

// if there is no file, then it quits
if (!$f) {
    return;
}

// while the eof is not reached, put the line into lines
// we don't actually need to store it, so lets just process with a running sum
// grab the first number and the last number

//thank you stack overflow!
// https://stackoverflow.com/questions/11243447/get-numbers-from-string-with-php
// uses regex and returns just the numbers in a string arary

function get_numerics ($str) {
    preg_match_all('/\d+/', $str, $matches);
    return $matches[0];
}
$running_sum = 0;

while (!feof($f)) {
    $line = fgets($f);

    $number_arr = [];
    
    $number_arr = get_numerics($line);

    //join and split into individual numbers
    $number_str = implode ($number_arr);

    if (strlen ($number_str) == 1) {
        // two one digit numbers
        $number = $number_str[0].$number_str[0];
        
    } else {
        // needs a function to get last element of substr
        $number = $number_str[0].substr ($number_str, -1);
    }

    $real_num = intval($number);

    $running_sum = $running_sum + $real_num;
}

print_r ($running_sum); //answer

fclose($f);

?>