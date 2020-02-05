<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BARTH127
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
     * Retourne le type de logement
     * @return string
     */
    public function getTypeLogement(): string;

    /**
     * Retourne la surface habitable
     * @return float
     */
    public function getSurfaceHabitable(): float;

    /**
     * Retourne le nombre d'appartements
     * @return int
     */
    public function getNombreAppartements(): int;

    /**
     * Retourne le type de VMC simple flux
     * @return string
     */
    public function getTypeVmcSimpleFlux(): string;

    /**
     * Retourne le type de caisson de ventilation
     * @return string
     */
    public function getTypeCaissonVentilation(): string;

}
