<?php

namespace AideTravaux\CEE\OS\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\OS\Database\Database;
use AideTravaux\CEE\OS\Model\BARInterface;

class DatabaseBARTest extends TestCase
{
    /**
     * @dataProvider classProvider
     */
    public function testGet($class)
    {
        $stub = $this->createMock(BARInterface::class);
        $this->assertTrue(\is_float($class::get($stub)));
    }

    /**
     * @dataProvider classProvider
     */
    public function testGetMontantForfaitaire($class)
    {
        $stub = $this->createMock(BARInterface::class);
        $this->assertTrue(\is_int($class::getMontantForfaitaire($stub)));
    }

    /**
     * @dataProvider classProvider
     */
    public function testGetFacteur($class)
    {
        $stub = $this->createMock(BARInterface::class);
        $this->assertTrue(\is_float($class::getFacteur($stub)));
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
