<?php

namespace AideTravaux\CEE\OS\Tests\Model;

use PHPUnit\Framework\TestCase;
use AideTravaux\Core\CoreInterface;
use AideTravaux\CEE\OS\Database\Database;
use AideTravaux\CEE\OS\Model\BARInterface;

class BARInterfaceTest extends TestCase
{
    /**
     * @dataProvider classProvider
     */
    public function testInterface($class)
    {
        $stub = $this->createMock(BARInterface::class);

        $this->assertTrue(\is_float($class::get($stub)));
    }

    /**
     * @dataProvider methodsProvider
     */
    public function testMethodsExists($reflectionMethod)
    {
        $reflectionCoreInterface = new \ReflectionClass(CoreInterface::class);

        $this->assertTrue(\in_array($reflectionMethod->getName(), array_map(function($row) {
            return $row->getName();
        }, $reflectionCoreInterface->getMethods())));
    }

    /**
     * @dataProvider methodsProvider
     */
    public function testTypeReturn($reflectionMethod)
    {
        $reflectionCoreInterface = new \ReflectionClass(CoreInterface::class);
        
        $this->assertEquals(
            $reflectionCoreInterface->getMethod( $reflectionMethod->getName() )->getReturnType()->getName(),
            $reflectionMethod->getReturnType()->getName()
        );
    }

    public function methodsProvider()
    {
        $reflectionInterface = new \ReflectionClass(BARInterface::class);

        return \array_map(function($method) {
            return [ $method ];
        }, $reflectionInterface->getMethods());
    }

    public function classProvider()
    {
        $base = array_filter(Database::DB, function($row) {
            return \substr($row::CODE, 0, 3) === 'BAR';
        });

        return array_map(function($row) {
            return [ $row ];
        }, $base);
    }

}
