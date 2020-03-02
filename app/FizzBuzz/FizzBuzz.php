<?php


namespace App\FizzBuzz;

/**
 * Class FizzBuzz
 *
 * Exercise number: 1
 * Title: FizzBuzz
 *
 * Resume: Write a PHP script that prints all integer values from 1 to 100.
 * For multiples of three output "Fizz" instead of the value and for the multiples of five output "Buzz".
 * Values which are multiples of both three and five should output as "FizzBuzz".
 *
 * @package App\FizzBuzz
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class FizzBuzz
{
    /** @var string $multipleOfThreeMessage Message for numbers multiple of three. */
    private $multipleOfThreeMessage = 'Fizz';

    /** @var string $multipleOfFiveMessage Message for numbers multiple of five. */
    private $multipleOfFiveMessage = 'Buzz';

    /** @var string $multipleOfThreeAndFiveMessage Message for numbers multiple of three and five. */
    private $multipleOfThreeAndFiveMessage = 'FizzBuzz';

    /**
     * Method responsible for print or return a list of multiples ('three', 'five' or 'three and five')
     * between 2 numbers.
     *
     * With Generator (I am using \Generator because if the interval were too long we could have problems with memory.)
     *
     * @param int $firstNumber First sequence number.
     * @param int $lastNumber Last sequence number.
     *
     * @return \Generator
     * @throws \Exception
     */
    public function findMultiplesWithGenerator(int $firstNumber, int $lastNumber)
    {
        if ($firstNumber > $lastNumber) {
            throw new \Exception('The first number cannot be higher than the last.');
        }

        for ($auxiliaryNumber = $firstNumber; $auxiliaryNumber <= $lastNumber; $auxiliaryNumber++) {
            $isFizz = (0 === $auxiliaryNumber % 3);
            $isBuzz = (0 === $auxiliaryNumber % 5);

            if ($isFizz && $isBuzz) {
                $resultString = "[{$auxiliaryNumber}] $this->multipleOfThreeAndFiveMessage";
            } else if ($isFizz) {
                $resultString = "[{$auxiliaryNumber}] $this->multipleOfThreeMessage";
            } else if ($isBuzz) {
                $resultString = "[{$auxiliaryNumber}] $this->multipleOfFiveMessage";
            } else {
                continue;
            }

            yield $resultString;
        }
    }

    /**
     * Method responsible for print or return a list of multiples ('three', 'five' or 'three and five')
     * between 2 numbers.
     *
     * With Generator (I am using \Generator because if the interval were too long we could have problems with memory.)
     *
     * @param int $firstNumber First sequence number.
     * @param int $lastNumber Last sequence number.
     *
     * @return \Generator
     * @throws \Exception
     */
    public function findMultiples(int $firstNumber, int $lastNumber)
    {
        $result = [];

        if ($firstNumber > $lastNumber) {
            throw new \Exception('The first number cannot be higher than the last.');
        }

        for ($auxiliaryNumber = $firstNumber; $auxiliaryNumber <= $lastNumber; $auxiliaryNumber++) {
            $isFizz = (0 === $auxiliaryNumber % 3);
            $isBuzz = (0 === $auxiliaryNumber % 5);

            if ($isFizz && $isBuzz) {
                $resultString = "[{$auxiliaryNumber}] $this->multipleOfThreeAndFiveMessage";
            } else if ($isFizz) {
                $resultString = "[{$auxiliaryNumber}] $this->multipleOfThreeMessage";
            } else if ($isBuzz) {
                $resultString = "[{$auxiliaryNumber}] $this->multipleOfFiveMessage";
            } else {
                continue;
            }

            $result[] = $resultString;
        }

        return $result;
    }
}