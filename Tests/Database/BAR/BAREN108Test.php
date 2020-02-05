<?php

namespace AideTravaux\CEE\OS\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Database\BAR\BAREN108;
use AideTravaux\CEE\OS\Model\BARInterface;

class BAREN108Test extends TestCase
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

        $this->assertEquals(BAREN108::get($stub), $expect);
    }

    public function simulationProvider()
    {
        return [
            [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_1'],
                    'getNombreFermetures' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']
                ],
                8000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_2'],
                    'getNombreFermetures' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']
                ],
                6600
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_3'],
                    'getNombreFermetures' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']
                ],
                4400
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_1'],
                    'getNombreFermetures' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                13000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_2'],
                    'getNombreFermetures' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                10000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_3'],
                    'getNombreFermetures' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                6900
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_3'],
                    'getNombreFermetures' => (int) 10,
                    'getEnergieChauffage' => ''
                ],
                0
            ], [
                'model' => [
                    'getZoneClimatique' => '',
                    'getNombreFermetures' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                0
            ], [
                'model' => [
                    'getZoneClimatique' => '',
                    'getNombreFermetures' => (int) 10,
                    'getEnergieChauffage' => ''
                ],
                0
            ]
        ];
    }
}
