<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BAREN103
{
    /**
     * Retourne la zone climatique du projet
     * @return string
     */
    public function getZoneClimatique(): string;

    /**
     * Retourne la surface d'isolant installé (en m²)
     * @return float
     */
    public function getSurfaceIsolant(): float;
}
