<?php
class WeekdayFinder
{
    function checkLeapYear($year)
    {
        if ($year % 100 == 0)
            return false;
        return ($year % 4 == 0);
    }
}
?>
