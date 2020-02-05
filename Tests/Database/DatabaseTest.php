<?php

namespace AideTravaux\CEE\Os\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\Os\Database\Database;

class DatabaseTest extends TestCase
{
    public function testType()
    {
        $this->assertTrue(\is_array(Database::DB));
    }

    public function testClass()
    {
        foreach (Database::DB as $key => $class) {
           $this->assertTrue(\class_exists($class));
        }
    }

}
