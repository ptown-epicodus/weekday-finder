<?php
require_once 'src/WeekdayFinder.php';

class WeekdayFinderTest extends PHPUnit_Framework_TestCase
{
    // Simple non-leap years
    function test_checkLeapYear_false()
    {
        //Arrange
        $test_WeekdayFinder = new WeekdayFinder;
        $year = 1993;

        //Act
        $result = $test_WeekdayFinder->checkLeapYear($year);

        //Assert
        $this->assertSame(false, $result);
    }

    // Years divisible by 4
    function test_checkLeapYear_true()
    {
        //Arrange
        $test_WeekdayFinder = new WeekdayFinder;
        $year = 2004;

        //Act
        $result = $test_WeekdayFinder->checkLeapYear($year);

        //Assert
        $this->assertSame(true, $result);
    }

    // Years divisible by 100
    function test_checkLeapYear_divisibleBy100()
    {
        //Arrange
        $test_WeekdayFinder = new WeekdayFinder;
        $year = 2100;

        //Act
        $result = $test_WeekdayFinder->checkLeapYear($year);

        //Assert
        $this->assertSame(false, $result);
    }

    // Years divisible by 400
    function test_checkLeapYear_divisibleBy400()
    {
        //Arrange
        $test_WeekdayFinder = new WeekdayFinder;
        $year = 2000;

        //Act
        $result = $test_WeekdayFinder->checkLeapYear($year);

        //Assert
        $this->assertSame(true, $result);
    }

    // Regular day in non-leap year
    function test_dayOfYear_regular()
    {
        //Arrange
        $test_WeekdayFinder = new WeekdayFinder;
        $year = 2017;
        $month = 12;
        $day = 31;

        //Act
        $result = $test_WeekdayFinder->dayOfYear($year, $month, $day);

        //Assert
        $this->assertEquals(365, $result);
    }

    // Day in leap year (after 2/28)
    function test_dayOfYear_leapYear()
    {
        //Arrange
        $test_WeekdayFinder = new WeekdayFinder;
        $year = 2000;
        $month = 12;
        $day = 31;

        //Act
        $result = $test_WeekdayFinder->dayOfYear($year, $month, $day);

        //Assert
        $this->assertEquals(366, $result);
    }

    // Same date
    function test_daysBetween_sameDate()
    {
        //Arrange
        $test_WeekdayFinder = new WeekdayFinder;
        $year_1 = 2017;
        $month_1 = 12;
        $day_1 = 31;
        $year_2 = 2017;
        $month_2 = 12;
        $day_2 = 31;

        //Act
        $result = $test_WeekdayFinder->daysBetween($year_1, $month_1, $day_1, $year_2, $month_2, $day_2);

        //Assert
        $this->assertSame(0, $result);
    }

    // Dates in same year
    function test_daysBetween_sameYear()
    {
        //Arrange
        $test_WeekdayFinder = new WeekdayFinder;
        $year_1 = 2017;
        $month_1 = 1;
        $day_1 = 5;
        $year_2 = 2017;
        $month_2 = 12;
        $day_2 = 25;

        //Act
        $result = $test_WeekdayFinder->daysBetween($year_1, $month_1, $day_1, $year_2, $month_2, $day_2);

        //Assert
        $this->assertEquals(354, $result);
    }

    // Dates without leap days (February 29) between them
    function test_daysBetween_noLeapDays()
    {
        //Arrange
        $test_WeekdayFinder = new WeekdayFinder;
        $year_1 = 2013;
        $month_1 = 3;
        $day_1 = 17;
        $year_2 = 2016;
        $month_2 = 1;
        $day_2 = 25;

        //Act
        $result = $test_WeekdayFinder->daysBetween($year_1, $month_1, $day_1, $year_2, $month_2, $day_2);

        //Assert
        $this->assertEquals(1044, $result);
    }

    // Dates with leap days (February 29) between them
    function test_daysBetween_leapDays()
    {
        //Arrange
        $test_WeekdayFinder = new WeekdayFinder;
        $year_1 = 2012;
        $month_1 = 2;
        $day_1 = 17;
        $year_2 = 2017;
        $month_2 = 1;
        $day_2 = 25;

        //Act
        $result = $test_WeekdayFinder->daysBetween($year_1, $month_1, $day_1, $year_2, $month_2, $day_2);

        //Assert
        $this->assertEquals(1804, $result);
    }

    // Date after January 1, 2017
    function test_weekday_after2017()
    {
        //Arrange
        $test_WeekdayFinder = new WeekdayFinder;
        $year = 2018;
        $month = 3;
        $day = 17;

        //Act
        $result = $test_WeekdayFinder->weekday($year, $month, $day);

        //Assert
        $this->assertEquals('Saturday', $result);
    }

    // Date before January 1, 2017
    function test_weekday_before2017()
    {
        //Arrange
        $test_WeekdayFinder = new WeekdayFinder;
        $year = 1908;
        $month = 3;
        $day = 17;

        //Act
        $result = $test_WeekdayFinder->weekday($year, $month, $day);

        //Assert
        $this->assertEquals('Tuesday', $result);
    }
}
?>
