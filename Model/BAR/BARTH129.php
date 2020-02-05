<?php

namespace AideTravaux\CEE\OS\Model\BAR;

interface BARTH129
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
     * Retourne la surface chauffée
     * @return float
     */
    public function getSurfaceChauffee(): float;

    /**
     * Retourne le coefficient de performance saisonnier (SCOP) de l'équipement
     * @return float
     */
    public function getScop(): float;

}
