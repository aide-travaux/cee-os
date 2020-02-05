<?php

namespace AideTravaux\CEE\OS\Model\BAR;

interface BAREN106
{
    /**
     * Retourne le type de logement
     * @return string
     */
    public function getTypeLogement(): string;

    /**
     * Retourne l'ancienneté du logement
     * @return string
     */
    public function getAncienneteLogement(): string;

    /**
     * Retourne la surface d'isolant installé (en m²)
     * @return float
     */
    public function getSurfaceIsolant(): float;
}
