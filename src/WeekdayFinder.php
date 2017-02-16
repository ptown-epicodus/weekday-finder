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

    function daysBetween($year_1, $month_1, $day_1, $year_2, $month_2, $day_2)
    {
      if ($year_1 == $year_2 && $month_1 == $month_2 && $day_1 == $day_2)
          return 0;
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
