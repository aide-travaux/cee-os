<?php

namespace AideTravaux\CEE\Os\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\Os\Data\Entries;
use AideTravaux\CEE\Os\Database\BAR\BAREN103;
use AideTravaux\CEE\Os\Model\BAR\BAREN103 as Model;

class BAREN103Test extends TestCase
{
    /**
     * @dataProvider simulationProvider
     */
    public function testGet($model, $expect)
    {
        $stub = $this->createMock(Model::class);

        foreach ($model as $key => $value) {
            $stub->method($key)->willReturn($value);
        }

        $this->assertEquals(BAREN103::get($stub), $expect);
    }

    public function simulationProvider()
    {
        return [
            [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_1'],
                    'getSurfaceIsolant' => (float) 10
                ],
                16000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_2'],
                    'getSurfaceIsolant' => (float) 10
                ],
                13000
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
