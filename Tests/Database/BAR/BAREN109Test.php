<?php

namespace AideTravaux\CEE\Os\Tests\Database;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\Os\Data\Entries;
use AideTravaux\CEE\Os\Database\BAR\BAREN109;
use AideTravaux\CEE\Os\Model\BAR\BAREN109 as Model;

class BAREN109Test extends TestCase
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
