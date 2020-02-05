<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BAREN109
{
    /**
     * Retourne le type de logement
     * @return string
     */
    public function getTypeLogement(): string;

    /**
     * Retourne la surface de toiture protégée (en m²)
     * @return float
     */
    public function getSurfaceToitureProtegee(): float;
}
