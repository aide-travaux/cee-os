<?php

namespace AideTravaux\CEE\OS\Tests\Repository;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\OS\Repository\Repository;

class RepositoryTest extends TestCase
{
    public function testGetOneOrNull()
    {
        $this->assertNotNull(Repository::getOneOrNull('BAR-EN-101'));
        $this->assertNull(Repository::getOneOrNull(''));
    }
}
