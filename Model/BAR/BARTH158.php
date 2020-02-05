<?php

namespace AideTravaux\CEE\OS\Model\BAR;

interface BARTH158
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
     * Retourne le nombre de radiateurs installés
     * @return int
     */
    public function getNombreRadiateurs(): int;

}
