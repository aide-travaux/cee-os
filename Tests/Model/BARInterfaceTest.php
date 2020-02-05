<?php

namespace AideTravaux\CEE\OS\Tests\Model;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\OS\Database\Database;
use AideTravaux\CEE\OS\Model\BARInterface;

class BARInterfaceTest extends TestCase
{
    /**
     * @dataProvider classProvider
     */
    public function testInterface($class)
    {
        $stub = $this->createMock(BARInterface::class);

        $this->assertTrue(\is_float($class::get($stub)));
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
