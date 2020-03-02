<?php


namespace Tests\FindMissingValueArray;

use App\FindMissingValueArray\FindMissingValueArray;
use Tests\TestCase;

/**
 * Class FindMissingValueArrayTest
 * @package Tests\FindMissingValueArray
 *
 * @author Gabriel Anhaia <gabriel@stargrid.pro>
 */
class FindMissingValueArrayTest extends TestCase
{
    /**
     * Test success searching for a missed value in an array.
     *
     * @param array $orderedArray Ordered array to be searched
     * @param array $expectedResponse Expected response to be tested.
     *
     * @dataProvider missingValueDataProvider
     */
    public function testSuccessFindingMissingValues(array $orderedArray, $expectedResponse)
    {
        $findMissingValueArray = new FindMissingValueArray;
        $response = $findMissingValueArray->searchForMissingValue($orderedArray);
        $this->assertEquals($expectedResponse, $response);
    }

    /**
     * Data provider for test searching for missing values in an array.
     */
    public function missingValueDataProvider()
    {
        return [
            [
                'orderedArray' => [1000, 1001, 1002, 1003],
                'expectedResponse' => null
            ],
            [
                'orderedArray' => [1, 2, 4, 5, 6],
                'expectedResponse' => 3
            ],
            [
                'orderedArray' => [-1, -3, -4],
                'expectedResponse' => -2
            ],
            [
                'orderedArray' => [-1, 1, 2],
                'expectedResponse' => 0
            ],
        ];
    }
}