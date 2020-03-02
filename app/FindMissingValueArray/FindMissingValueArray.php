<?php

namespace App\FindMissingValueArray;

/**
 * Class FindMissingValueArray
 *
 * Exercise number: 2
 * Title: 500 Element Array
 *
 * Resume: Write a PHP script to generate a random array of 500 integers (values of 1 – 500 inclusive).
 * Randomly remove and discard an arbitrary element from this newly generated array.
 * Write the code to efficiently determine the value of the missing element.
 * Explain your reasoning with comments.
 *
 * @package App\FindMissingValueArray
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class FindMissingValueArray
{
    /**
     * Method responsible for return the first missing value founded in a list.
     *
     * @param int[] $randomOrderedList List of values fo search for the missing one (It is already ordered).
     *
     * OBS: (I understood that it wasn't necessary order the array).
     *
     * @return int
     */
    public function searchForMissingValue(array $randomOrderedList): ?int
    {
        $firstKeyArray = 0;
        $lastKeyArray = sizeof($randomOrderedList) - 1;

        $auxiliaryList = range($randomOrderedList[$firstKeyArray], $randomOrderedList[$lastKeyArray]);

        $arrayDiff = array_diff($auxiliaryList, $randomOrderedList);

        if (empty($arrayDiff)) {
            return null;
        }

        return reset($arrayDiff);
    }
}