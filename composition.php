<?php

declare(strict_types=1);

interface CostStrategy
{
    public function cost(Lesson $lesson): int;
    public function chargeType(): string;
}

class TimedCostStrategy implements CostStrategy
{
    /**
     * @param Lesson $lesson
     * @return int
     */
    public function cost(Lesson $lesson): int
    {
        return ($lesson->getDuration() * 5);
    }

    /**
     * @return string
     */
    public function chargeType(): string
    {
        return "hourly rate";
    }
}

class FixedCostStrategy implements CostStrategy
{
    /**
     * @param Lesson $lesson
     * @return int
     */
    public function cost(Lesson $lesson): int
    {
        return 30;
    }

    /**
     * @return string
     */
    public function chargeType(): string
    {
        return "fixed rate";
    }
}

class Lesson
{
    /**
     * @var int
     */
    private int $duration;

    /**
     * @var CostStrategy
     */
    private CostStrategy $costStrategy;

    /**
     * @param int $duration
     * @param CostStrategy $strategy
     */
    public function __construct(int $duration, CostStrategy $strategy)
    {
        $this->duration = $duration;
        $this->costStrategy = $strategy;
    }

    /**
     * @return int
     */
    public function cost(): int
    {
        return $this->costStrategy->cost($this);
    }

    /**
     * @return string
     */
    public function chargeType(): string
    {
        return $this->costStrategy->chargeType();
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }
}

class Lecture extends Lesson
{
    // Lecture-specific implementations ...
}

class Seminar extends Lesson
{
    // Seminar-specific implementations ...
}


$lessons[] = new Lecture(4, new TimedCostStrategy());
$lessons[] = new Lecture(4, new FixedCostStrategy());
$lessons[] = new Seminar(4, new FixedCostStrategy());

foreach ($lessons as $lesson) {
    echo "lesson charge {$lesson->cost()}. ";
    echo "Charge type: {$lesson->chargeType()}\n";
}
