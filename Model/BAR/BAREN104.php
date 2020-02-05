<?php

namespace AideTravaux\CEE\OS\Model\BAR;

interface BAREN104
{
    /**
     * Retourne la zone climatique du projet
     * @return string
     */
    public function getZoneClimatique(): string;

    /**
     * Retourne le nombre de fenêtres ou portes-fenêtres complètes installées
     * @return int
     */
    public function getNombreFenetres(): int;

    /**
     * Retourne l'énergie de chauffage
     * @return string
     */
    public function getEnergieChauffage(): string;
}
