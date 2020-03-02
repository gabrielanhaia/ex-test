<?php


namespace Tests\FizzBuzz;

use App\FizzBuzz\FizzBuzz;
use Tests\TestCase;

/**
 * Class FizzBuzzTest
 * @package Tests\FizzBuzz
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class FizzBuzzTest extends TestCase
{
    /**
     * Test teh FizzBuzz method.
     *
     * @dataProvider fizzBuzzDataProvider
     *
     * @param int $firstNuber First number test.
     * @param int $lastNumber Last number test.
     * @param array $expectedResponse Expected response after algorithm process.
     * @throws \Exception
     */
    public function testSuccessFizzBuzzMethod(int $firstNuber, int $lastNumber, array $expectedResponse)
    {
        $fizzBuzz = new FizzBuzz;
        $response = $fizzBuzz->findMultiples($firstNuber, $lastNumber);
        $this->assertEquals($expectedResponse, $response);
    }

    /**
     * Test error passing invalid interval.
     *
     * @throws \Exception
     */
    public function testErrorFizzBuzzMethodInvalidNumbers()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('The first number cannot be higher than the last.');

        $firstNuber = 10;
        $lastNumber = 9;

        $fizzBuzz = new FizzBuzz;
        $fizzBuzz->findMultiples($firstNuber, $lastNumber);

    }

    /**
     * Data provider for success fizzBuzz tests.
     *
     * @return array
     */
    public function fizzBuzzDataProvider()
    {
        return [
            [
                'firstNumber' => 1,
                'lastNumber' => 15,
                'response' => [
                    '[3] Fizz',
                    '[5] Buzz',
                    '[6] Fizz',
                    '[9] Fizz',
                    '[10] Buzz',
                    '[12] Fizz',
                    '[15] FizzBuzz'
                ]
            ],
            [
                'firstNumber' => 16,
                'lastNumber' => 19,
                'response' => [
                    '[18] Fizz',
                ]
            ],
            [
                'firstNumber' => 1,
                'lastNumber' => 2,
                'response' => []
            ],
            [
                'firstNumber' => -15,
                'lastNumber' => 3,
                'response' => [
                    '[-15] FizzBuzz',
                    '[-12] Fizz',
                    '[-10] Buzz',
                    '[-9] Fizz',
                    '[-6] Fizz',
                    '[-5] Buzz',
                    '[-3] Fizz',
                    '[0] FizzBuzz',
                    '[3] Fizz',
                ]
            ]
        ];
    }
}