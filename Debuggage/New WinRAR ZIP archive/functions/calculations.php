<?php

function getPercent($percent = null, $of = null, $result = null)
{

    if ($result === null) {
        $result = $percent * $of / 100;

        return [
            'result' => $result,
        ];
    }
    if ($percent === null) {
        $percent = $of / $result * 100;

        return [
            'percent' => $percent,
        ];
    }
    if ($of === null) {
        $of = $result * 100 / $percent;

        return [
            'of' => $of,
        ];
    }
}

function ruleOfThird($a = 1, $b = 1, $c = 1): array
{
    return [
        'd' => ($b * $c) / $a,
    ];
}

function cesar($clear, $key, $reverse = false)
{
    $lowerAlphabet = 'abcdefghijklmnopqrstuvwxyz';
    $lowerAlphabet = str_split($lowerAlphabet);
    $upperAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $upperAlphabet = str_split($upperAlphabet);
    $clear = str_split($clear);
    $result = '';

    foreach ($clear as $letter) {
        if (ctype_lower($letter)) {
            $alphabet = $lowerAlphabet;
        } elseif (ctype_upper($letter)) {
            $alphabet = $upperAlphabet;
        } else {
            // ignore non-alphabetic characters
            $result .= $letter;
            continue;
        }

        $index = array_search($letter, $alphabet);
        if ($index === false) {
            // ignore non-alphabetic characters
            $result .= $letter;
            continue;
        }

        $index = $reverse ? $index - $key : $index + $key;
        $index %= count($alphabet); // handle wrapping
        if ($index < 0) {
            $index += count($alphabet);
        }

        $result .= $alphabet[$index];
    }

    if ($reverse) {
        return [
            'clear' => $result,
        ];
    } else {
        return [
            'result' => $result,
        ];
    }
}
