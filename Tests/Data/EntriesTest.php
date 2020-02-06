<?php

namespace AideTravaux\CEE\OS\Tests\Data;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\OS\Data\Entries;

class EntriesTest extends TestCase
{
    public function testConstants()
    {
        $reflectionClass = new \ReflectionClass(Entries::class);
        $constants = $reflectionClass->getConstants();

        foreach ($constants as $key => $value) {
            $this->assertTrue(\is_array($value));
        }
    }
}
