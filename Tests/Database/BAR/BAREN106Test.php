<?php

namespace AideTravaux\CEE\OS\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Database\BAR\BAREN106;
use AideTravaux\CEE\OS\Model\BARInterface;

class BAREN106Test extends TestCase
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

        $this->assertEquals(BAREN106::get($stub), $expect);
    }

    public function simulationProvider()
    {
        return [
            [
                'model' => [
                    'getTypeLogement' => Entries::TYPES_LOGEMENT['type_logement_1'],
                    'getSurfaceIsolant' => (float) 10,
                    'getAncienneteLogement' => Entries::ANCIENNETES_LOGEMENT['anciennete_logement_1']
                ],
                3200
            ], [
                'model' => [
                    'getTypeLogement' => Entries::TYPES_LOGEMENT['type_logement_1'],
                    'getSurfaceIsolant' => (float) 10,
                    'getAncienneteLogement' => Entries::ANCIENNETES_LOGEMENT['anciennete_logement_2']
                ],
                2100
            ], [
                'model' => [
                    'getTypeLogement' => Entries::TYPES_LOGEMENT['type_logement_3'],
                    'getSurfaceIsolant' => (float) 10,
                    'getAncienneteLogement' => Entries::ANCIENNETES_LOGEMENT['anciennete_logement_1']
                ],
                3800
            ], [
                'model' => [
                    'getTypeLogement' => Entries::TYPES_LOGEMENT['type_logement_3'],
                    'getSurfaceIsolant' => (float) 10,
                    'getAncienneteLogement' => Entries::ANCIENNETES_LOGEMENT['anciennete_logement_2']
                ],
                2500
            ], [
                'model' => [
                    'getTypeLogement' => '',
                    'getSurfaceIsolant' => (float) 10,
                    'getAncienneteLogement' => ''
                ],
                0
            ]
        ];
    }
}
