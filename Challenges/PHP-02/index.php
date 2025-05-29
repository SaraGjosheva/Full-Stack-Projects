<?php

$newLine = '<br>';

// Requirement 1. - decimal number to a binary number

// one way with PHP function - positive and negative numbers
function decimalToBinary($number): string|int
{
    if (!is_integer($number)) {
        return 'Invalid entry.';
    }

    if ($number >= 0) {
        if ($number === 0) {
            return 0;
        } elseif ($number > 0) {
            return decbin($number);
        }
    } else {
        $binary = decbin(($number & 0xFFFFFFFF)); // 32-bit representation
        return $binary;
    }
}

echo decimalToBinary(-12) . $newLine;

// another way - positive and negative numbers
function decimalToBinary2($number): string|int
{
    if (!is_integer($number)) {
        return 'Invalid entry.';
    }

    $binary = '';

    if ($number >= 0) {

        if ($number === 0) {
            return 0;
        }

        while ($number > 0) {
            $binary = ($number % 2) . $binary;
            $number = (int)($number / 2);
        }
        return $binary;
    } elseif ($number < 0) {
        $number = $number & 0xFFFFFFFF;

        for ($i = 0; $i < 32; $i++) {
            $binary = ($number % 2) . $binary;
            $number = (int)($number / 2);
        }
        return $binary;
    }
}

echo decimalToBinary2(-12) . $newLine;

// decimal, positive, and negative numbers (for negative float numbers does not work properly) = ova mi e plus ne e navedeno kakvi broevi ama spomna instruktorot deka se raboti za dekadni broevi
function decimalToBinary3($number): string|int
{
    if (!is_numeric($number)) {
        return 'Invalid entry!';
    }

    $integerBinary = '';
    $fractionalBinary = '';
    $precision = 10; // fractional places 10 odprilika

    if ($number >= 0) {

        $integer = (int) $number;
        $fractional = $number - $integer;

        if ($integer === 0) {
            return '0';
        } else {
            while ($integer > 0) {
                $integerBinary = ($integer % 2) . $integerBinary;
                $integer = (int)($integer / 2);
            }
        }

        while ($fractional > 0 && strlen($fractionalBinary) < $precision) {

            $fractional *= 2;

            if ($fractional >= 1) {
                $fractionalBinary .= '1';
                $fractional -= 1;
            } else {
                $fractionalBinary .= '0';
            }
        }

        if ($fractionalBinary !== '') {
            return $integerBinary . '.' . $fractionalBinary;
        } else {
            return $integerBinary;
        }
    } elseif ($number < 0) {

        $integer = (int)$number;
        $fractional = abs($number) - $integer;
        $integer = $integer & 0xFFFFFFFF;

        if (is_integer($number)) {
            for ($i = 0; $i < 32; $i++) {
                $integerBinary = ($integer % 2) . $integerBinary;
                $integer = (int)($integer / 2);
            }
            return $integerBinary;
        }

        while ($fractional > 0 && strlen($fractionalBinary) < $precision) {

            $fractional *= 2;

            if ($fractional >= 1) {
                $fractionalBinary .= '1';
                $fractional -= 1;
            } else {
                $fractionalBinary .= '0';
            }
        }

        if ($fractionalBinary !== '') {
            return '1' . $integerBinary . '.' . $fractionalBinary;
        } else {
            return '1' . $integerBinary;
        }
    }
}

echo decimalToBinary3(-12) . $newLine;

// recursive function
function decimalToBinary4($number): string|int
{
    if (!is_integer($number)) {
        return 'Invalid entry.';
    }

    function positiveNumbers($x): string|int
    {
        if ($x === 0) {
            return '';
        } else {
            return positiveNumbers((int)($x / 2)) . ($x % 2);
        }
    }

    if ($number >= 0) {
        if ($number === 0) {
            return 0;
        }
        return positiveNumbers($number);
    } else {
        $number = $number & 0xFFFFFFFF;
        return positiveNumbers($number);
    }
}

echo decimalToBinary4(0) . $newLine;

// Requirement 2. - decimal number to Roman number
function decimalToRoman($number): string
{
    if (!is_integer($number) || $number <= 0) {
        return 'Invalid entry!';
    }

    if ($number > 3999) {
        return 'Invalid entry! The maximum number that can be converted is 3999.';
    }

    $romanMap = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];

    $roman = '';

    foreach ($romanMap as $key => $value) {
        while ($number >= $value) {
            $roman .= $key;
            $number -= $value;
        }
    }
    return $roman;
}

echo decimalToRoman(-222) . $newLine;

// recursive function
function decimalToRoman2($number, $romanMap = null): string
{
    if (!(is_integer($number)) || $number <= 0) {
        return '';
    }

    if ($number > 3999) {
        return 'Invalid entry! The maximum number that can be converted is 3999.';
    }

    if ($romanMap === null) {
        $romanMap = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
    }

    foreach ($romanMap as $key => $value) {
        if ($number >= $value) {
            return $key . decimalToRoman2($number - $value, $romanMap);
        }
    }
}

echo decimalToRoman2(3999) . $newLine;

// Requirement 3. - binary number to a decimal number

// one way with PHP function
function binaryToDecimal($number): int|string
{
    if (!is_integer($number) && !is_string($number)) {
        return 'Invalid entry!';
    }

    $stringBinary = preg_replace("/[,\s]/", '', strval($number));

    if ($stringBinary === '') {
        return 'Invalid entry!';
    }

    if (!preg_match("/^[01]+$/", $stringBinary) || $stringBinary === '') {
        return 'Invalid entry! Only 0s and 1s are allowed.';
    }

    return bindec($number);
}

echo binaryToDecimal(11100011) . $newLine;

// another way
function binaryToDecimal2($number): int|string
{
    if (!is_integer($number) && !is_string($number)) {
        return 'Invalid entry!';
    }

    $stringBinary = preg_replace("/[,\s]/", '', strval($number));

    if ($stringBinary === '') {
        return 'Invalid entry!';
    }

    if (!preg_match("/^[01]+$/", $stringBinary) || $stringBinary === '') {
        return 'Invalid entry! Only 0s and 1s are allowed.';
    }

    $arr = str_split($stringBinary); // array
    $decimal = 0;

    for ($i = 0; $i < count($arr); $i++) {
        $bit = (int)$arr[count($arr) - 1 - $i];
        $decimal += $bit * pow(2, $i);
    }
    return $decimal;
}

echo binaryToDecimal2('101010') . $newLine;

// recursive function
function binaryToDecimal3($number, $index = null): int|string
{
    if ($index === null) {

        if (!is_integer($number) && !is_string($number)) {
            return 'Invalid entry!';
        }

        $stringBinary = preg_replace("/[,\s]/", '', strval($number));

        if ($stringBinary === '') {
            return 'Invalid entry!';
        }

        if (!preg_match("/^[01]+$/", $stringBinary) || $stringBinary === '') {
            return 'Invalid entry! Only 0s and 1s are allowed.';
        }

        return binaryToDecimal3($number, 0);
    }

    if ($index >= strlen($number)) {
        return 0;
    }

    $bit = (int)$number[strlen($number) - 1 - $index];
    return $bit * pow(2, $index) + binaryToDecimal3($number, $index + 1);
}

echo binaryToDecimal3('1010') . $newLine;

// Requirement 4. - Roman number to a decimal number
// one way
function romanToDecimal(string $roman): int|string
{
    if (!is_string($roman) || trim($roman) === '') {
        return 0;
    }

    if (!preg_match("/^[IVXLCDM]+$/", $roman)) {
        return 0;
    }

    $validStructure = preg_match("/^(M{0,3})(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/", $roman);

    if (!$validStructure) {
        return 0;
    }

    $romanMap = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];

    $roman = strtoupper(trim($roman));
    $decimal = 0;
    $i = 0;

    while ($i < strlen($roman)) {
        $twoCharacters = substr($roman, $i, 2);
        if (isset($romanMap[$twoCharacters])) {
            $decimal += $romanMap[$twoCharacters];
            $i += 2;
        } else {
            $decimal += $romanMap[$roman[$i]];
            $i++;
        }
    }
    return $decimal;
}

echo romanToDecimal('MXXII') . $newLine;
echo romanToDecimal('WES') . $newLine;
echo romanToDecimal(123) . $newLine;

// recursive function 
function romanToDecimal2($roman): int|string
{
    if (!is_string($roman) || trim($roman) === '') {
        return 0;
    }

    if (!preg_match("/^[IVXLCDM]+$/", $roman)) {
        return 0;
    }

    $validStructure = preg_match("/^(M{0,3})(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/", $roman);
    if (!$validStructure) {
        return 0;
    }

    $romanMap = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    function convertToDecimal($roman, $romanMap): int
    {
        if (empty($roman)) {
            return 0;
        }

        if (strlen($roman) > 1 && isset($romanMap[substr($roman, 0, 2)])) {
            return $romanMap[substr($roman, 0, 2)] + convertToDecimal(substr($roman, 2), $romanMap);
        } elseif (isset($romanMap[$roman[0]])) {
            return $romanMap[$roman[0]] + convertToDecimal(substr($roman, 1), $romanMap);
        }

        return 0;
    }

    return convertToDecimal(strtoupper(trim($roman)), $romanMap);
}

echo romanToDecimal2('MXXVI') . $newLine;
echo romanToDecimal2('WES') . $newLine;
echo romanToDecimal2(123) . $newLine;
