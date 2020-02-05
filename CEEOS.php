<?php

namespace AideTravaux\CEE\OS;

use AideTravaux\CEE\OS\Repository\Repository;

abstract class CEEOS
{
    /**
     * Retourne la classe de la fiche d'opération standardisée correspondante au code transmis
     * @param string
     * @return string|null
     */
    public static function get(string $codeOS): ?string
    {
        return Repository::getOneOrNull($codeOS);
    }

    /**
     * Retourne le montant des certificats d'économies d'énergie
     * @param string
     * @param object
     * @return string|float
     */
    public static function getMontant(string $codeOS, object $model): ?float
    {
        if ($class = self::get($codeOS)) {
            $reflectionClass = new \ReflectionClass($class);
            $interface = '\\' . $reflectionClass->getNamespaceName() . '\\' . $reflectionClass->getShortName();
            $interface = \str_replace('Database', 'Model', $interface);

            if (\interface_exists($interface) && $model instanceof $interface) {
                return (float) $class::get($model);
            }
        }
        return null;
    }

}
