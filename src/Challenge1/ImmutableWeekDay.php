<?php

namespace Interview\Challenge1;

/*

Your job is to fill the class to cover all assertions. You can additionally look at test/Challenge1Test.php

$day1 = new ImmutableWeekDay(ImmutableWeekDay::FRIDAY);
$day2 = new ImmutableWeekDay(ImmutableWeekDay::FRIDAY);
$day3 = $day1->addDays(9);

assertFalse($day1->equals($day3));
assertTrue($day1->isOfValue(ImmutableWeekDay::FRIDAY));
assertFalse($day1->isOfValue(123));
assertTrue($day1->equals($day2));
assertTrue($day3->isOfValue(ImmutableWeekDay::SUNDAY));

assertException(\OutOfRangeException::class);
new ImmutableWeekDay(123);

*/

readonly class ImmutableWeekDay
{
     const SUNDAY = 0;
     const MONDAY = 1;
     const TUESDAY = 2;
     const WEDNESDAY = 3;
     const THURSDAY = 4;
     const FRIDAY = 5;
     const SATURDAY = 6;
     const DAYS_PER_WEEK = 7;

    /**
     * @throws \OutOfRangeException
     */
    public function __construct(private int $value)
    {
        if ($value < self::SUNDAY || $value > self::SATURDAY) {
            throw new \OutOfRangeException;
        }
    }

    public function addDays(int $value): ImmutableWeekDay
    {
        return new self($value % self::DAYS_PER_WEEK);
    }

    public function equals(ImmutableWeekDay $day): bool
    {
        return $this->value === $day->value;
    }

    public function isOfValue(int $value): bool
    {
        try {
            return $this->equals(new self($value));
        } catch (\OutOfRangeException) {
        }
        return false;
    }
}