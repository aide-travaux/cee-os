<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BARTH116
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
     * Retourne le type de chauffage
     * @return string
     */
    public function getTypeChauffage(): string;

    /**
     * Retourne la surface chauffée
     * @return float
     */
    public function getSurfaceChauffee(): float;

}
