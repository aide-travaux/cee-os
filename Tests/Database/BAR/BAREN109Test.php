<?php

namespace AideTravaux\CEE\OS\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\OS\Data\Entries;
use AideTravaux\CEE\OS\Database\BAR\BAREN109;
use AideTravaux\CEE\OS\Model\BARInterface;

class BAREN109Test extends TestCase
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

        $this->assertEquals(BAREN109::get($stub), $expect);
    }

    public function simulationProvider()
    {
        return [
            [
                'model' => [
                    'getTypeLogement' => Entries::TYPES_LOGEMENT['type_logement_1'],
                    'getSurfaceToitureProtegee' => (float) 10
                ],
                4000
            ], [
                'model' => [
                    'getTypeLogement' => Entries::TYPES_LOGEMENT['type_logement_3'],
                    'getSurfaceToitureProtegee' => (float) 10
                ],
                5200
            ], [
                'model' => [
                    'getTypeLogement' => '',
                    'getSurfaceToitureProtegee' => (float) 10
                ],
                0
            ]
        ];
    }
}
