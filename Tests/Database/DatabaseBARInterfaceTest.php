<?php

namespace AideTravaux\CEE\OS\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\OS\Database\Database;
use AideTravaux\CEE\OS\Database\DatabaseBARInterface;

class DatabaseInterfaceTest extends TestCase
{
    /**
     * @dataProvider classProvider
     */
    public function testClassInterface($class)
    {
        $this->assertTrue(\in_array(DatabaseBARInterface::class, \class_implements($class)));
    }

    public function classProvider()
    {
        $base = array_filter(Database::DB, function($row) {
            return \substr($row::CODE, 0, 3) === 'BAR';
        });

        return array_map(function($row) {
            return [ $row ];
        }, $base);
    }

}