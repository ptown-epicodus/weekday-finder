<?php
class WeekdayFinder
{
    const NUM_DAYS_IN_MONTHS = [
        31, // January
        28, // February
        31, // March
        30, // April
        31, // May
        30, // June
        31, // July
        31, // August
        30, // September
        31, // October
        30, // November
        31, // December
    ];

    function dayOfYear($year, $month, $day)
    {
        $days = 0;

        for ($i = 1; $i < $month; $i++) {
          $days += self::NUM_DAYS_IN_MONTHS[$i - 1];
        }
        $days += $day;

        return $days;
    }

    function checkLeapYear($year)
    {
        if ($year % 400 == 0)
            return true;
        if ($year % 100 == 0)
            return false;
        return ($year % 4 == 0);
    }
}
?>
