<?php
function numberToWords($number)
{
    $ones = array(
        0 => 'Zero',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen'
    );

    $tens = array(
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety'
    );

    $suffixes = array(
        100 => 'hundred',
        1000 => 'Thousand',
        1000000 => 'Million',
        1000000000 => 'Billion',
        1000000000000 => 'Trillion'
    );

    // Zero case
    if ($number == 0) {
        return $ones[0];
    }

    $words = array();

    // Process each suffix
    foreach ($suffixes as $suffix => $suffixText) {
        if ($number >= $suffix) {
            $remaining = floor($number / $suffix);
            $number %= $suffix;

            if ($remaining > 99) {
                $words[] = numberToWords($remaining) . ' ' . $suffixText;
            } else {
                $words[] = $ones[$remaining] . ' ' . $suffixText;
            }
        }
    }

    // Process the remaining number
    if ($number > 0) {
        if ($number < 20) {
            $words[] = $ones[$number];
        } else {
            $tensDigit = floor($number / 10) * 10;
            $onesDigit = $number % 10;

            if ($onesDigit > 0) {
                $words[] = $tens[$tensDigit] . '-' . $ones[$onesDigit];
            } else {
                $words[] = $tens[$tensDigit];
            }
        }
    }

    // Combine the words and return
    return implode(' ', $words);
}
