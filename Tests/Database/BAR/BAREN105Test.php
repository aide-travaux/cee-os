<?php

namespace AideTravaux\CEE\OS\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Database\BAR\BAREN105;
use AideTravaux\CEE\OS\Model\BAR\BAREN105 as Model;

class BAREN105Test extends TestCase
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

        $this->assertEquals(BAREN105::get($stub), $expect);
    }

    public function simulationProvider()
    {
        return [
            [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_1'],
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']
                ],
                14000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_2'],
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']
                ],
                12000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_3'],
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']
                ],
                8000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_1'],
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                22000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_2'],
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                18000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_3'],
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                12000
            ], [
                'model' => [
                    'getZoneClimatique' => '',
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => ''
                ],
                0
            ]
        ];
    }
}
