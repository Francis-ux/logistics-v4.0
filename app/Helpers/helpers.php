<?php

function getRandomNumber($length = 10)
{
    // Define the characters to be used in the random number
    $characters = '0123456789';
    // Initialize an empty string to store the random number
    $randomNumber = '';
    // Loop to generate each digit of the random number
    for ($i = 0; $i < $length; $i++) {
        // Append a random digit to the random number
        $randomNumber .= $characters[rand(0, strlen($characters) - 1)];
    }
    // Return the generated random number
    return $randomNumber;
}
function getAppNameAcronym($appName)
{
    // Explode the site name into an array of words
    $words = explode(" ", $appName);
    // Initialize an empty string to store the acronym
    $acronym = '';
    // Loop through each word to extract the first letter and concatenate it to the acronym
    foreach ($words as $word) {
        // Convert the first letter to uppercase and append it to the acronym
        $acronym .= strtoupper(substr($word, 0, 1));
    }

    // Concatenate the acronym and the random number with a hyphen
    $result = $acronym;

    // Return the final result
    return $result;
}
function getTrackingNumber($appName)
{
    return getAppNameAcronym($appName) . '-' . getRandomNumber();
}

function currency($currency, $type = 'symbol')
{

    @$explodeCurrency = explode('-', $currency);

    switch ($type) {
        case 'name':
            return @$explodeCurrency[0];
            break;
        case 'code':
            return @$explodeCurrency[1];
        case 'symbol':
            return @$explodeCurrency[2];
        default:
            return @$explodeCurrency[2];
            break;
    }
}

function formatAmount($amount)
{
    return number_format($amount, 2);
}

function formatDate($date)
{
    return date('d M Y', strtotime($date));
}

function formatTime($time)
{
    return date('h:i A', strtotime($time));
}

function formatDateTime($datetime)
{
    return date('d M Y h:i A', strtotime($datetime));
}
