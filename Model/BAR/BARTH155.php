<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BARTH155
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
     * Retourne le nombre d'appartements
     * @return int
     */
    public function getNombreAppartements(): int;

    /**
     * Retourne le type de ventilation hybride installée
     * @return string
     */
    public function getTypeVentilationHybride(): string;

    /**
     * Retourne le type d'extracteur de ventilation installée
     * @return string
     */
    public function getTypeExtracteurVentilation(): string;
}
