<?php

namespace AideTravaux\CEE\OS\Model\BAR;

interface BARTH159
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
     * Retourne l'efficacité énergétique saisonnière (%)
     * @return int
     */
    public function getEfficaciteSaisonniere(): int;

}
