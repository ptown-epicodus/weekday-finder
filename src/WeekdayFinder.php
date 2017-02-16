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

    const DAYS_OF_WEEK = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ];

    function weekday($year, $month, $day)
    {
        if ($year < 2017)
            $weekday_index = (7 - ($this->daysBetween($year, $month, $day, 2017, 1, 1) % 7)) % 7;
        else
            $weekday_index = $this->daysBetween(2017, 1, 1, $year, $month, $day) % 7;
        return self::DAYS_OF_WEEK[$weekday_index];
    }

    function daysBetween($year_1, $month_1, $day_1, $year_2, $month_2, $day_2)
    {
        $days = 0;

        for ($i = $year_1; $i < $year_2; $i++)
          $days += ($this->checkLeapYear($i) ? 366 : 365);
        $days += $this->dayOfYear($year_2, $month_2, $day_2);
        $days -= $this->dayOfYear($year_1, $month_1, $day_1);

        return $days;
    }

    function dayOfYear($year, $month, $day)
    {
        $days = 0;

        for ($i = 1; $i < $month; $i++)
            $days += self::NUM_DAYS_IN_MONTHS[$i - 1];
        if ($month > 2 && $this->checkLeapYear($year))
            $days++;
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
