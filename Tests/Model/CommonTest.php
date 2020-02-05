<?php

namespace AideTravaux\CEE\Os\Tests\Model;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\Os\Repository\Repository;

class CommonTest extends TestCase
{
    /**
     * @dataProvider classProvider
     */
    public function testClassExists($class)
    {
        $this->assertTrue(\class_exists($class));
    }

    /**
     * @dataProvider classProvider
     */
    public function testInterfaceExists($class)
    {
        $reflectionClass = new \ReflectionClass($class);
        $interface = '\\' . $reflectionClass->getNamespaceName() . '\\' . $reflectionClass->getShortName();
        $interface = str_replace('Database', 'Model', $interface);

        $this->assertTrue(\interface_exists($interface));
    }

    public function classProvider()
    {
        return [ Repository::DB ];
    }

}
