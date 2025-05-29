<?php

$newLine = '<br>';

// Requirements 1.

$name = 'Sara';

if ($name == 'Kathrin') {
    echo 'Hello ' . $name . '!' . $newLine;
} else {
    echo 'Nice name.' . $newLine;
}

$rating = 2;

if ($rating >= 1 && $rating <= 10 && is_int($rating)) {
    echo 'Thank you for rating.' . $newLine;
} else {
    echo 'Invalid rating, only numbers between 1 and 10.' . $newLine;
}

// Requirement 2. - did not extand the previous code with $rating and $rated, made a new one with small changes

$time = date('g'); // 12-hour format of an hour (1 to 12)
$timeAmPm = date('A'); // AM/PM


if ($time >= 1 && $time < 12 && $timeAmPm == 'AM') {
    echo 'Good morning ' . $name . '.' . $newLine;
} elseif ($time <= 12 && $time < 7 && $timeAmPm == 'PM') {
    echo 'Good afternoon ' . $name . '.' . $newLine;
} elseif ($time >= 7 && $timeAmPm == 'PM') {
    echo 'Good evening ' . $name . '.' . $newLine;
}

$rated = true;

if ($rating >= 1 && $rating <= 10 && is_integer($rating)) {
    if ($rated) {
        echo 'You already voted.' . $newLine;
    } else {
        echo 'Thanks for voting.' . $newLine;
    }
} else {
    echo 'Invalid rating, only numbers between 1 and 10.' . $newLine;
}

// checking the value of the $rating variable (extra added)

if (is_integer($rating)) {
    echo 'Rating variable is integer.' . $newLine;
} else {
    echo 'Rating variable is ' . gettype($rating) . '.' . $newLine;
}

// Requirement 3. - one way to solve

$voter = ['Maria' => false . ', ' . 5, 'Nikola' => true . ', ' . 8, 'Angela' => false . ', ' . 90, 'Alex' => true . ', ' . 10, 'Leo' => false . ', ' . 11, 'Nina' => true . ', ' . 9, 'Igor' => false . ', ' . 52, 'Marry' => false . ', ' . 2, 'Alvaro' => true . ', ' . 1, 'Teo' => true . ', ' . 6];

// echo '<pre>';
// print_r($voter);

foreach ($voter as $key => $value) {

    list($rated, $rating) = explode(',', $value);
    $rated = filter_var($rated, FILTER_VALIDATE_BOOLEAN);
    $rating = (int)$rating;

    if ($time >= 1 && $time < 12 && $timeAmPm == 'AM') {
        echo 'Good morning ' . $key . '.' . $newLine;
    } elseif ($time <= 12 && $time < 7 && $timeAmPm == 'PM') {
        echo 'Good afternoon ' . $key . '.' . $newLine;
    } elseif ($time >= 7 && $timeAmPm == 'PM') {
        echo 'Good evening ' . $key . '.' . $newLine;
    }

    if ($rating >= 1 && $rating <= 10) {
        if ($rated) {
            echo 'You already voted with a rating of ' . $rating . '.' . $newLine;
        } else {
            echo 'Thanks for voting with a rating of ' . $rating . '.' . $newLine;
        }
    } else {
        echo 'Invalid rating, only numbers between 1 and 10.' . $newLine;
    }
}


// Requirement 3. - another way to solve

$voter = ['Maria' => [false, 5], 'Nikola' => [true, 8], 'Angela' => [false, 90], 'Alex' => [true, 10], 'Leo' => [false, 11], 'Nina' => [true, 9], 'Igor' => [false, 52], 'Marry' => [false, 2], 'Alvaro' => [true, 1], 'Teo' => [true, 6]];

// echo '<pre>';
// print_r($voter);

foreach ($voter as $key => $value) {

    $rated = $value[0];
    $rating = $value[1];

    if ($time >= 1 && $time < 12 && $timeAmPm == 'AM') {
        echo 'Good morning ' . $key . '.' . $newLine;
    } elseif ($time <= 12 && $time < 7 && $timeAmPm == 'PM') {
        echo 'Good afternoon ' . $key . '.' . $newLine;
    } elseif ($time >= 7 && $timeAmPm == 'PM') {
        echo 'Good evening ' . $key . '.' . $newLine;
    }

    if ($rating >= 1 && $rating <= 10) {
        if ($rated) {
            echo 'You already voted with a rating of ' . $rating . '.' . $newLine;
        } else {
            echo 'Thanks for voting with a rating of ' . $rating . '.' . $newLine;
        }
    } else {
        echo 'Invalid rating, only numbers between 1 and 10.' . $newLine;
    }
}
