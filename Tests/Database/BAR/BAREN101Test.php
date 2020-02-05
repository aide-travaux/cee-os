<?php

namespace AideTravaux\CEE\OS\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Database\BAR\BAREN101;
use AideTravaux\CEE\OS\Model\BARInterface;

class BAREN101Test extends TestCase
{
    /**
     * @dataProvider simulationProvider
     */
    public function testGet($model, $expect)
    {
        $stub = $this->createMock(BARInterface::class);

        foreach ($model as $key => $value) {
            $stub->method($key)->willReturn($value);
        }

        $this->assertEquals(BAREN101::get($stub), $expect);
    }

    public function simulationProvider()
    {
        return [
            [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_1'],
                    'getSurfaceIsolant' => (float) 10
                ],
                17000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_2'],
                    'getSurfaceIsolant' => (float) 10
                ],
                14000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_3'],
                    'getSurfaceIsolant' => (float) 10
                ],
                9000
            ], [
                'model' => [
                    'getZoneClimatique' => '',
                    'getSurfaceIsolant' => (float) 10
                ],
                0
            ]
        ];
    }
}
