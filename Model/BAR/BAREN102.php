<?php

namespace AideTravaux\CEE\OS\Model\BAR;

interface BAREN102
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