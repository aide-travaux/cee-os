<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BAREN105
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

    /**
     * Retourne l'énergie de chauffage
     * @return string
     */
    public function getEnergieChauffage(): string;
}
