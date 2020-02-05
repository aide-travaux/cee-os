<?php

namespace AideTravaux\CEE\Os\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\Os\Data\Entries;
use AideTravaux\CEE\Os\Database\BAR\BAREN102;
use AideTravaux\CEE\Os\Model\BAR\BAREN102 as Model;

class BAREN102Test extends TestCase
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

        $this->assertEquals(BAREN102::get($stub), $expect);
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
                24000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_2'],
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']
                ],
                20000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_3'],
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']
                ],
                13000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_1'],
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                38000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_2'],
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                31000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_3'],
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                21000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_3'],
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => ''
                ],
                0
            ], [
                'model' => [
                    'getZoneClimatique' => '',
                    'getSurfaceIsolant' => (float) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                0
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
