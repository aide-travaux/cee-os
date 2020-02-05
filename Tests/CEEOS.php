<?php

namespace AideTravaux\CEE\OS\Tests;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\OS\CEEOS;
use AideTravaux\CEE\OS\Model\BAR\BAREN101;
use AideTravaux\CEE\OS\Model\BAR\BAREN102;

class CEEOSTest extends TestCase
{
    public function testGet()
    {
        $this->assertTrue(\is_string(CEEOS::get('BAR-EN-101')));
        $this->assertNull(CEEOS::get(''));
    }

    public function testGetMontant()
    {
        $stub = $this->createMock(BAREN101::class);
        $stub->method('getZoneClimatique')->willReturn('H1');
        $stub->method('getSurfaceIsolant')->willReturn((float) 100);

        $this->assertTrue(\is_float(CEEOS::getMontant('BAR-EN-101', $stub)));

        $stub = $this->createMock(BAREN102::class);
        $this->assertNull(CEEOS::getMontant('BAR-EN-101', $stub));
    }
}
