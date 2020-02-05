<?php

namespace AideTravaux\CEE\OS\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Database\BAR\BAREN104;
use AideTravaux\CEE\OS\Model\BARInterface;

class BAREN104Test extends TestCase
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

        $this->assertEquals(BAREN104::get($stub), $expect);
    }

    public function simulationProvider()
    {
        return [
            [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_1'],
                    'getNombreFenetres' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']
                ],
                52000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_2'],
                    'getNombreFenetres' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']
                ],
                42000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_3'],
                    'getNombreFenetres' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_1']
                ],
                28000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_1'],
                    'getNombreFenetres' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                82000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_2'],
                    'getNombreFenetres' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                67000
            ], [
                'model' => [
                    'getZoneClimatique' => Entries::ZONES_CLIMATIQUES['zone_climatique_3'],
                    'getNombreFenetres' => (int) 10,
                    'getEnergieChauffage' => Entries::ENERGIES_CHAUFFAGE['energie_chauffage_2']
                ],
                45000
            ], [
                'model' => [
                    'getZoneClimatique' => '',
                    'getNombreFenetres' => (int) 10,
                    'getEnergieChauffage' => ''
                ],
                0
            ]
        ];
    }
}
