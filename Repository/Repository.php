<?php

namespace AideTravaux\CEE\Os\Repository;

use AideTravaux\CEE\Os\Database\Database;

abstract class Repository extends Database
{
    /**
     * Retourne la classe correspondante au code en paramètre
     * @param string
     * @return callable|null
     */
    public static function getOneOrNull(string $code): ?string
    {
        $result = array_filter(self::DB, function($class) use ($code) {
            return $code === $class::CODE;
        });

        return ($result) ? current($result) : null;
    }
}
