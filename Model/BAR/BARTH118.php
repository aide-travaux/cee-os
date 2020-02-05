<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BARTH118
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
     * Retourne l'énergie de chauffage
     * @return string
     */
    public function getEnergieChauffage(): string;

    /**
     * Retourne la surface chauffée
     * @return float
     */
    public function getSurfaceChauffee(): float;

    /**
     * Retourne le nombre d'appartements
     * @return int
     */
    public function getNombreAppartements(): int;

}
