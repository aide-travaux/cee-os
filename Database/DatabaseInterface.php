<?php

namespace AideTravaux\CEE\OS\Database;

use AideTravaux\CEE\OS\Model\DataInterface;

/**
 * @see http://atee.fr/c2e/operations-standardisees-4eme-periode
 */
interface DBInterface
{
    /**
     * Retourne le volume de certificats d'économies d'énergie
     * @param DataInterface
     * @return float
     */
    public static function get(DataInterface $model): float;

    /**
     * Retourne le volume forfaitaire de certificats d'économies d'énergie
     * @param DataInterface
     * @return int
     */
    public static function getMontantForfaitaire(DataInterface $model): int;

    /**
     * Retourne le coefficient multiplicateur calculé
     * @param DataInterface
     * @return float
     */
    public static function getFacteur(DataInterface $model): float;

    /**
     * @param DataInterface
     * @return array
     */
    public static function toArray(DataInterface $model): array;
}
