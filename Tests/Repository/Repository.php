<?php

namespace AideTravaux\CEE\Os\Tests\Repository;

use PHPUnit\Framework\TestCase;
use AideTravaux\CEE\Os\Repository\Repository;

class RepositoryTest extends TestCase
{
    public function testGetOneOrNull($constant)
    {
        $this->assertTrue(\is_string(Repository::getOneOrNull('BAR-EN-101')));
        $this->assertNull(Repository::getOneOrNull(''));
    }
}
