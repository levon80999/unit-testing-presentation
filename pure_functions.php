<?php

declare(strict_types=1);

use function rand;
use function md5;

// This is example of pure functions

function calculator(int $number1, int $number2): int
{
    return $number1 + $number2;
}

echo calculator(2, 2); // 4
echo calculator(2, 2); // 4
echo calculator(2, 9); // 11
echo calculator(2, 9); // 11
echo calculator(2, 2); // 2

// No matter how many times we will call this function it will return same result for same arguments.

// This examples are non-pure functions

function generateToken(string $name): string
{
    return md5($name . rand(1000, 9999));
}

echo generateToken('test 1'); // zowjbN2G7uethBltkIR4WHMLH2at68
echo generateToken('test 2'); // zCTz2QrGwsnOzdlr6jUznKZGVeJluK
echo generateToken('test 3'); // h5oKfTorgDeg37SGgYRSuV14eaJg7m


