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

    abstract public function cost();
    abstract public function chargeType();
}

class FixedPriceLesson extends Lesson
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

class TimedPriceLesson extends Lesson
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

$fixedPriceLesson = new FixedPriceLesson(5);
print "{$fixedPriceLesson->cost()} ({$fixedPriceLesson->chargeType()})\n";

$timedPriceLesson = new TimedPriceLesson(3);
print "{$timedPriceLesson->cost()} ({$timedPriceLesson->chargeType()})\n";
