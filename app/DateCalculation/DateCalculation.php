<?php


namespace App\DateCalculation;

/**
 * Class DateCalculation
 *
 * Exercise number: 4
 * Title: Date Calculation
 *
 * Resume: The Irish National Lottery draw takes place twice weekly on a Wednesday and a Saturday at 8pm.
 * Write a function or class that calculates and returns the next valid draw date based on the current
 * date and time AND also on an optionally supplied date and time.
 *
 * @package App\DateCalculation
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class DateCalculation
{
    /**
     * Method responsible for calculate the next valid draw.
     *
     * @param \DateTime $dateTimeStart Initial datetime used to calculate the next valid draw.
     *                                 If it was null the current date will be considered.
     * @return \DateTime
     * @throws \Exception
     */
    public function calculateNextDay(\DateTime $dateTimeStart = null): \DateTime
    {
        if ($dateTimeStart === null) {
            $dateTimeStart = new \DateTime;
        }

        $hours = (int)$dateTimeStart->format('H');
        $minutes = (int)$dateTimeStart->format('i');
        $seconds = (int)$dateTimeStart->format('s');

        $totalSeconds = 0;
        $totalSeconds += $hours * 3600;
        $totalSeconds += $minutes * 60;
        $totalSeconds += $seconds;

        $currentDayOfTheWeek = ((int)$dateTimeStart->format('w')) + 1;

        if (
            (($currentDayOfTheWeek === 4 || $currentDayOfTheWeek === 7)
                && $totalSeconds >= 72000
            )
            || ($currentDayOfTheWeek != 4 && $currentDayOfTheWeek != 7)
        ) {
            $numberOfDaysToAdd = 4;
            if ($currentDayOfTheWeek < 4) {
                $numberOfDaysToAdd = 4 - $currentDayOfTheWeek;
            } else if ($currentDayOfTheWeek >= 4 && $currentDayOfTheWeek < 7) {
                $numberOfDaysToAdd = 7 - $currentDayOfTheWeek;
            }

            $dateTimeStart->modify("+{$numberOfDaysToAdd} day");
        }

        $dateTimeStart->setTime(20, 0, 0);
        return $dateTimeStart;
    }
}