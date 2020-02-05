<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BARTH123
{
    /**
     * Retourne la zone climatique du projet
     * @return string
     */
    public function getZoneClimatique(): string;

    /**
     * Retourne le nombre d'appartements
     * @return int
     */
    public function getNombreAppartements(): int;

}
