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

}
