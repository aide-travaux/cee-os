<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BARTH111
{
    /**
     * Retourne la zone climatique du projet
     * @return string
     */
    public function getZoneClimatique(): string;

    /**
     * Retourne l'énergie de chauffage
     * @return string
     */
    public function getEnergieChauffage(): string;

    /**
     * Retourne la surface habitable
     * @return float
     */
    public function getSurfaceHabitable(): float;

}
