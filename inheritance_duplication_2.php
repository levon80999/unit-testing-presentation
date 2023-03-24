<?php

declare(strict_types=1);

abstract class Lesson
{
    public int $duration;

    /**
     * @param int $duration
     */
    public function __construct(int $duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    abstract public function cost(): int;

    /**
     * @return string
     */
    abstract public function chargeType(): string;
}

class Lecture extends Lesson
{
}

class Seminar extends Lesson
{
}

class FixedPriceLessonLecture extends Lecture
{
    public function cost(): int
    {
        return 30;
    }

    public function chargeType(): string
    {
        return 'fixed rate';
    }
}

class TimedPriceLessonLecture extends Lecture
{
    public function cost(): int
    {
        return 5 * $this->duration;
    }

    public function chargeType(): string
    {
        return 'hourly rate';
    }
}


class FixedPriceLessonSeminar extends Seminar
{
    public function cost(): int
    {
        return 30;
    }

    public function chargeType(): string
    {
        return 'fixed rate';
    }
}

class TimedPriceLessonSeminar extends Seminar
{
    public function cost(): int
    {
        return 5 * $this->duration;
    }

    public function chargeType(): string
    {
        return 'hourly rate';
    }
}


$lecture = new TimedPriceLessonLecture(5);
print "{$lecture->cost()} ({$lecture->chargeType()})\n";

$seminar = new FixedPriceLessonSeminar(3);
print "{$seminar->cost()} ({$seminar->chargeType()})\n";
