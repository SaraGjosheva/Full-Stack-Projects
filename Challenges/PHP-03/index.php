<?php

$newLine = '<br>';

// https://www.w3schools.com/php/php_regex.asp (used helper source url for regex)

function checkNumber(int|string $number): string
{
    $number = (string)$number;

    if (!(is_numeric($number)) && preg_match('/^(M{0,3})(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/', $number)) {
        return 'Roman number.';
    }

    if ($number === "0" || $number === "1") {
        return "Binary and Decimal number.";
    }

    if (preg_match('/^[01]+$/', $number)) {
        return 'Binary number.';
    }

    if (preg_match('/^[+-]?(0|[1-9]\d*)(\.\d+)?$/', $number)) {
        if (($number[0] === '+' || $number[0] === '-') && $number[1] === '0' && strlen($number) > 2) {
            return 'Invalid entry!';
        }
        return 'Decimal number.';
    }

    if (preg_match('/^\d+(\.\d+)?$/', $number) && !preg_match('/^[01]+$/', $number) && is_numeric($number)) {
        return 'Decimal number.';
    }

    if (preg_match('/[^0-9a-zA-Z+ \-]/', $number)) {
        return 'Invalid entry!';
    }

    return 'Invalid entry!';
}

echo checkNumber('-01234') . $newLine;
echo checkNumber('+0123') . $newLine;
echo checkNumber('+023') . $newLine;

$arrayOfNumbers = [10001, '+1', '-23', 1011, '+10', 'X', 'MV', 'XXL', '+0123', 10, 53423, 'Sara', 'MMMM', 'MMMCMXCIX', 'MVM', 678, 1212, 1010, 11011, '+012', 'Gjosheva', '0123', 2.33, 3.55, '234a', 'hdhjad', '!@#$'];

foreach ($arrayOfNumbers as $number) {
    echo 'Number: ' . $number . ' is ' . checkNumber($number) . $newLine;
}

// imam prashanje nadvor od requirements za domashnata: kako da izbegnam, primer se vnesuva brojot 0123 kako int vrednost i php go interpretira kako oktalen broj go zamenuva so 83. Nikako ne uspeav da go sredam toa osven ako toj broj e string pri vnes. Blagodaram odnapred.
