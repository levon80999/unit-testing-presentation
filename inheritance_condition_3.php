<?php

declare(strict_types=1);

abstract class Lesson
{
    const FIXED = 1;
    const TIMED = 2;

    private int $costType;

    private int $duration;

    /**
     * @param int $duration
     * @param int $costType
     */
    public function __construct(int $duration, int $costType = 1)
    {
        $this->duration = $duration;
        $this->costType = $costType;
    }

    /**
     * @return int
     */
    public function cost(): int
    {
        switch ($this->costType) {
            case self::TIMED:
                return (5 * $this->duration);
            case self::FIXED:
                return 30;
            default:
                $this->costType = self::FIXED;

                return 30;
        }
    }

    /**
     * @return string
     */
    public function chargeType(): string
    {
        switch ($this->costType) {
            case self::TIMED:
                return "hourly rate";
            case self::FIXED:
                return "fixed rate";
            default:
                $this->costType = self::FIXED;

                return "fixed rate";
        }
    }
}

class Lecture extends Lesson
{

}

class Seminar extends Lesson
{

}

$lecture = new Lecture(5, Lesson::FIXED);
print "{$lecture->cost()} ({$lecture->chargeType()})\n";

$seminar = new Seminar(3, Lesson::TIMED);
print "{$seminar->cost()} ({$seminar->chargeType()})\n";
