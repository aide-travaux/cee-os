<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BARTH106
{
    /**
     * Retourne la zone climatique du projet
     * @return string
     */
    public function getZoneClimatique(): string;

    /**
     * Retourne le type de logement
     * @return string
     */
    public function getTypeLogement(): string;

    /**
     * Retourne la surface habitable
     * @return float
     */
    public function getSurfaceHabitable(): float;

}
