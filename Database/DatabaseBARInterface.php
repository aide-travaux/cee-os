<?php

namespace AideTravaux\CEE\OS\Database;

use AideTravaux\CEE\OS\Model\BARInterface;

/**
 * @see http://atee.fr/c2e/operations-standardisees-4eme-periode
 */
interface DatabaseBARInterface
{
    /**
     * Retourne le volume de certificats d'économies d'énergie
     * @param BARInterface
     * @return float
     */
    public static function get(BARInterface $model): float;

    /**
     * Retourne le volume forfaitaire de certificats d'économies d'énergie
     * @param BARInterface
     * @return int
     */
    public static function getMontantForfaitaire(BARInterface $model): int;

    /**
     * Retourne le coefficient multiplicateur calculé
     * @param BARInterface
     * @return float
     */
    public static function getFacteur(BARInterface $model): float;

    /**
     * @param BARInterface
     * @return array
     */
    public static function toArray(BARInterface $model): array;
}
