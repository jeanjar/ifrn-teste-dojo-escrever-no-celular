<?php

namespace App;

class TextParser
{
    const LETTERS_MAP = [
        'A' => ['number' => '2', 'times' => 1],
        'B' => ['number' => '2', 'times' => 2],
        'C' => ['number' => '2', 'times' => 3],

        'D' => ['number' => '3', 'times' => 1],
        'E' => ['number' => '3', 'times' => 2],
        'F' => ['number' => '3', 'times' => 3],

        'G' => ['number' => '4', 'times' => 1],
        'H' => ['number' => '4', 'times' => 2],
        'I' => ['number' => '4', 'times' => 3],

        'K' => ['number' => '5', 'times' => 2],
        'J' => ['number' => '5', 'times' => 1],
        'L' => ['number' => '5', 'times' => 3],

        'M' => ['number' => '6', 'times' => 1],
        'N' => ['number' => '6', 'times' => 2],
        'O' => ['number' => '6', 'times' => 3],

        'P' => ['number' => '7', 'times' => 1],
        'Q' => ['number' => '7', 'times' => 2],
        'R' => ['number' => '7', 'times' => 3],
        'S' => ['number' => '7', 'times' => 4],

        'T' => ['number' => '8', 'times' => 1],
        'U' => ['number' => '8', 'times' => 2],
        'V' => ['number' => '8', 'times' => 3],

        'W' => ['number' => '9', 'times' => 1],
        'X' => ['number' => '9', 'times' => 2],
        'Y' => ['number' => '9', 'times' => 3],
        'Z' => ['number' => '9', 'times' => 4],

        ' ' => ['number' => '0', 'times' => 1],
    ];

    const TEXT_MAX_LENGTH = 255;

    public function inputTextIsValid(string $text) : bool
    {
        return strlen($text) <= self::TEXT_MAX_LENGTH ? true : !true;
    }

    /**
     * @param string $text
     * @return string
     * @throws \Exception
     */
    public function textToNumber(string $text) : string
    {
        /**
         * only for sure
         */
        $text = mb_strtoupper($text);
        $numberSequence = '';
        $letters = str_split($text);

        foreach($letters as $k => $letter)
        {
            if(isset($letters[$k-1]))
            {
                if(self::LETTERS_MAP[$letters[$k-1]]['number'] === self::LETTERS_MAP[$letters[$k]]['number'])
                {
                    $numberSequence .= '_';
                }
            }
            for($i = 0; $i < self::LETTERS_MAP[$letter]['times']; $i++)
            {
                $numberSequence .= self::LETTERS_MAP[$letter]['number'];
            }
        }

        return $numberSequence;

    }
}