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
}
?>
