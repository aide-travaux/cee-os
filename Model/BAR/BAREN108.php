<?php

namespace AideTravaux\CEE\Os\Model\BAR;

interface BAREN108
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
     * Retourne le nombre de fermetures isolantes installées
     * @return int
     */
    public function getNombreFermetures(): int;
}
